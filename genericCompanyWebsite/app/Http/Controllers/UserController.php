<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createNewUser(Request $request){
        User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
        ]);
        return redirect()->route('users');
    }

    public function getUser(){
        $users = DB::table('users')
        ->select(array('id', 'name', 'email', 'created_at'))
        ->get();
        return view('content.users', ['users'=>$users]);
    }

    public function deleteUserById(int $id){
        DB::table('users')
        ->where('id', $id)
        ->delete();
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
                'id'=>$fullUser->id
            ];
            return view('content.editUser', ['user'=>$user]);
        }else{
            return redirect()->route('users');
        }
    }

    public function saveUserData(Request $request, int $id){
        $user = User::find($id);
        if ($user) {
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->save();
            return $this->editUserById($id);
        }
        else{
            return redirect()->route('users');
        }
    }
}
