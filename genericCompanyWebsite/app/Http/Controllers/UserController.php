<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Role;

class UserController extends Controller
{
    public function store(Request $request){
        
        $validate = $this->makeRules($request);
        $this->validate($request, $validate['rulesUpdate'], $validate['messages']);
        
        $request['password'] = Hash::make($request->input('password'));
        
        $data = User::create($request->all());

        if ($data) {
            return redirect()
                ->route('users.show', $data->id)
                ->with('message', ['type' => 'success', 'msg' => 'Cadastro criado com sucesso']);
        }

        return redirect()
                ->route('users.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Não foi possível criar o cadastro.']);
    }

    public function create(){
        $roles = Role::pluck('name', 'id');
        return view('content.users.addUser', compact('roles'));
    }

    public function index(){
        $roles = Role::pluck('name', 'id');
        return view('content.users.index', compact('roles'));
    }

    public function show(int $id){
        $data = User::findOrFail($id);
        return view('content.users.viewUser', compact('data'));
    }

    public function destroy(int $id){
        $data = User::findOrFail($id);
        if ($data->tasksCreated->count() && $data->tasksAssined->count()) {
            return redirect()
            ->route('users.index')
            ->with('message', ['type' => 'danger', 'msg' => 'Esse usuário esta registrado em uma ou mais tarefas.']);
        }
        
        $data->delete();
        return redirect()->route('users.index');
    }

    public function edit(int $id){
        if ($data = User::findOrFail($id)) {
            $roles = Role::pluck('name', 'id');
            return view('content.users.editUser', compact('data', 'roles'));
        }
        return redirect()->route('users.index');
    }

    public function update(Request $request, int $id){
        
        if (!$data = User::findOrFail($id)) {
            return redirect()
            ->route('users.index')
            ->with('message', ['type' => 'danger', 'msg' => 'Não foi possível localizar o cadastro.']);
        }
        
        $validate = $this->makeRules($request, $data);
        $this->validate($request, $validate['rulesUpdate'], $validate['messages']);
        
        if ($request->input('password') != null) {
            $request['password'] = Hash::make($request->input('password'));
        } else {
            $request['password'] = $data->password;
        }

        if ($data->update($request->all())) {
            return redirect()
                ->route('users.show', $data->id)
                ->with('message', ['type' => 'success', 'msg' => 'Cadastro atualizado com sucesso']);
        }

        return redirect()
                ->route('users.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Não foi possível editar o cadastro.']);
    }

    public function makeRules(Request $request, $data = null){
        $messages = [
            'name.required' => 'Por favor informe o nome.',
            'name.min' => 'Nome inválido, mínimo de 3 caracteres',
            'name.max' => 'Nome inválido, máximo de 100 caracteres',
            'name.unique' => 'Nome inválido, este nome já existe',

            'email.required' => 'Por favor informe o e-mail.',
            'email.min' => 'E-mail inválido, mínimo de 3 caracteres',
            'email.max' => 'E-mail inválido, máximo de 255 caracteres',
            'email.unique' => 'E-mail inválido, este e-mail já existe',

            'password.required' => 'Por favor informe a senha.',
            'password.min' => 'Senha inválida, mínimo de 3 caracteres',
            'password.max' => 'Senha inválidoa, máximo de 256 caracteres',

            'role_id.required' => 'Por favor informe o cargo.',
        ];

        $rules = [
            'name' => 'required|min:3|max:100|unique:users,name,NULL,id',
            'email' => 'required|min:3|max:255|unique:users,email,NULL,id',
            'password' => 'nullable|min:3|max:256',
            'role_id' => 'required'
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
}
