<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request){
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

    public function create(){
        return view('content.users.addUser');
    }

    public function getUser(){
        $data = User::all();
        return view('content.users', ['users'=>$data]);
    }

    public function show(int $id){
        $data = User::find($id);
        return view('content.users.viewUser', compact('data'));
    }

    public function destroy(int $id){
        User::find($id)->delete($id);
        return redirect()->route('users');
    }

    public function search(Request $request) {
        if ($request->search == "") {
            return redirect()->route('users');
        }
        $data = User::where('name', 'LIKE', '%' . $request->search . '%')->get();
        return view('content.users', ['users'=>$data]);
    }

    public function edit(int $id){
        $fullUser = User::find($id);
        if ($fullUser) {
            $data = (object) [
                'name'=>$fullUser->name,
                'email'=>$fullUser->email,
                'password'=>$fullUser->password,
                'created_at'=>$fullUser->created_at,
                'updated_at'=>$fullUser->updated_at,
                'id'=>$fullUser->id
            ];
            return view('content.users.editUser', ['user'=>$data]);
        }else{
            return redirect()->route('users');
        }
    }

    public function update(Request $request, int $id){
        if (!$data = User::find($id)) {
            return redirect()
                ->route('user.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Não foi possível localizar o cadastro.']);
        }

        $validate = $this->makeRulesUpdateUser($request, $data);
        $this->validate($request, $validate['rulesUpdate'], $validate['messages']);

        if ($data->update($request->all())) {
            return redirect()
                ->route('user.show', $data->id)
                ->with('message', ['type' => 'success', 'msg' => 'Cadastro atualizado com sucesso']);
        }

        return redirect()
                ->route('user.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Não foi possível editar o cadastro.']);
    }

    public function updateUserPassword(Request $request, int $id){
        if (!$data = User::find($id)) {
            return redirect()
                ->route('user.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Não foi possível localizar o cadastro.']);
        }

        $validate = $this->makeRulesUpdatePassword($request, $data);
        $this->validate($request, $validate['rulesUpdate'], $validate['messages']);

        if ($data->update($request->all())) {
            return redirect()
                ->route('user.show', $data->id)
                ->with('message', ['type' => 'success', 'msg' => 'Cadastro atualizado com sucesso']);
        }

        return redirect()
                ->route('user.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Não foi possível editar o cadastro.']);
    }

    public function makeRulesUpdateUser(Request $request, $data = null){
        $messages = [
            'name.required' => 'Por favor informe o nome.',
            'name.min' => 'Nome inválido, mínimo de 3 caracteres',
            'name.max' => 'Nome inválido, máximo de 100 caracteres',
            'name.unique' => 'Nome inválido, este nome já existe',

            'email.required' => 'Por favor informe o e-mail.',
            'email.min' => 'E-mail inválido, mínimo de 3 caracteres',
            'email.max' => 'E-mail inválido, máximo de 255 caracteres',
            'email.unique' => 'E-mail inválido, este e-mail já existe'
        ];

        $rules = [
            'name' => 'required|min:3|max:100|unique:users,name,NULL,id',
            'email' => 'required|min:3|max:255|unique:users,email,NULL,id'
        ];

        $rulesUpdate = $rules;

        if ($data) {
            $rulesUpdate['name'] = 'required|min:3|max:100|unique:users,name,' . $data->id . ',id';
            $rulesUpdate['email'] = 'required|min:3|max:255|unique:users,email,' . $data->id . ',id';
        }

        return [
            'messages' => $messages,
            'rules' => $rules,
            'rulesUpdate' => $rulesUpdate 
        ];
    }

    public function makeRulesUpdatePassword(Request $request, $data = null){
        $messages = [
            'password.required' => 'Por favor informe a senha.',
            'password.min' => 'Senha inválida, mínimo de 3 caracteres',
            'password.max' => 'Senha inválidoa, máximo de 256 caracteres'
        ];

        $rules = [
            'password' => 'required|min:3|max:256',
        ];

        $rulesUpdate = $rules;

        if ($data) {
            $rulesUpdate['password'] = 'required|min:3|max:256';
        }

        return [
            'messages' => $messages,
            'rules' => $rules,
            'rulesUpdate' => $rulesUpdate 
        ];
    }
}
