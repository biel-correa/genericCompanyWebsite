<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class RoleController extends Controller
{
    public function index(){
        $data = Role::all();
        return view('content.roles.index', compact('data'));
    }

    public function create(){
        $users = User::all();
        return view('content.roles.addRole', compact('users'));
    }
    
    public function show(int $id){
        $data = Role::findOrFail($id);
        return view('content.roles.viewRole', compact('data'));
    }

    public function edit(int $id){
        if (!$data = Role::findOrFail($id)) {
            return redirect()
                ->route('roles.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Não foi possível efetuar o cadastro.']);
        }

        $users=Role::all();
        return view('content.roles.editRole', compact('data', 'users'));
    }

    public function destroy(int $id){
        Role::findOrFail($id)->delete($id);
        return redirect()->route('roles.index');
    }

    public function store(Request $request){
        $validate = $this->makeRules($request);
        $this->validate($request, $validate['rulesUpdate'], $validate['messages']);

        if ($data = Role::create($request->all())) {
            return redirect()
                ->route('roles.show', $data->id)
                ->with('message', ['type' => 'success', 'msg' => 'Cadastro criado com sucesso']);
        }

        return redirect()
                ->route('roles.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Não foi possível criar o cadastro.']);
    }

    public function update(Request $request, $id){
        if (!$data = Role::findOrFail($id)) {
            return redirect()
                ->route('roles.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Não foi possível localizar o cadastro.']);
        }

        $validate = $this->makeRules($request, $data);
        $this->validate($request, $validate['rulesUpdate'], $validate['messages']);

        if ($data->update($request->all())) {
            return redirect()
                ->route('roles.show', $data->id)
                ->with('message', ['type' => 'success', 'msg' => 'Cadastro atualizado com sucesso']);
        }

        return redirect()
                ->route('roles.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Não foi possível editar o cadastro.']);
    }

    public function makeRules($data = null){
        $messages = [
            'name.required' => 'Por favor informe o nome.',
            'name.min' => 'Nome inválido, mínimo de 3 caracteres',
            'name.max' => 'Nome inválido, máximo de 100 caracteres',
            'name.unique' => 'Nome inválido, este nome já existe',
        ];

        $rules = [
            'name' => 'required|min:3|max:100|unique:users,name,NULL,id',
        ];

        $rulesUpdate = $rules;

        if ($data) {
            $rulesUpdate['name'] = 'required|min:3|max:100|unique:users,name,' . $data->id . ',id';
        }

        return [
            'messages' => $messages,
            'rules' => $rules,
            'rulesUpdate' => $rulesUpdate 
        ];
    }
}
