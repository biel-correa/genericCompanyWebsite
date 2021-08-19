<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createNewUser(Request $request){
        $newUser = [
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
            'email'=>$request->email
        ];
        DB::table('users')
        ->insert($newUser);

        return redirect()->route('users');
    }

    public function getUser(){
        $users = DB::table('users')
        ->select(array('id', 'name', 'email', 'creation_date'))
        ->get();
        return view('content.users', ['users'=>$users]);
    }

    public function deleteUserById(int $id){
        DB::table('users')
        ->where('id', $id)
        ->delete();
        return redirect()->route('users');
    }
}
