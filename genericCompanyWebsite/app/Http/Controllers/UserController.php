<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createNewUser(Request $request){
        $validated = $request->validate([
            'name'=>['required', 'max:100'],
            'email'=>['required', 'max:255'],
            'password'=>['required', 'max:256']
        ]);
        if ($validated) {
            User::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=>Hash::make($request->input('password')),
            ]);
            return redirect()->route('users');
        } else {
            return redirect()->route('users')->withErrors($validated);
        }
    }

    public function getUser(){
        $users = User::all();
        return view('content.users', ['users'=>$users]);
    }

    public function viewUser(int $id){
        $user = User::find($id);
        return view('content.viewUser', ['user'=>$user]);
    }

    public function deleteUserById(int $id){
        User::find($id)->delete($id);
        return redirect()->route('users');
    }

    public function editUserById(int $id){
        $fullUser = User::find($id);
        if ($fullUser) {
            $user = (object) [
                'name'=>$fullUser->name,
                'email'=>$fullUser->email,
                'password'=>$fullUser->password,
                'created_at'=>$fullUser->created_at,
                'updated_at'=>$fullUser->updated_at,
                'id'=>$fullUser->id
            ];
            return view('content.editUser', ['user'=>$user]);
        }else{
            return redirect()->route('users');
        }
    }

    public function saveUserData(Request $request, int $id){
        $validated = $request->validate([
            'name'=>['required', 'max:100'],
            'email'=>['required', 'max:255']
        ]);
        if ($validated) {
            $user = User::find($id);
            if ($user) {
                $user->name=$request->input('name');
                $user->email=$request->input('email');
                $user->save();
                return redirect()->route('users.editUserById', ['id'=>$id]);
            }
            else{
                return redirect()->route('users.editUserById', ['id'=>$id]);
            }
        } else {
            return redirect()->route('users.editUserById', ['id'=>$id])->withErrors($validated);
        }
    }

    public function updateUserPassword(Request $request, int $id){
        $validated = $request->validate([
            'password'=>['required', 'max:256']
        ]);
        if ($validated) {
            $user = User::find($id);
            if ($user) {
                $user->password=Hash::make($request->input('password'));
                $user->save();
                return redirect()->route('users.editUserById', ['id'=>$id]);
            }
            else{
                return redirect()->route('users.editUserById', ['id'=>$id]);
            }
        } else {
            return redirect()->route('users.editUserById', ['id'=>$id])->withErrors($validated);
        }
    }
}
