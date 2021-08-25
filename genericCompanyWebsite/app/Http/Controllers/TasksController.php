<?php

namespace App\Http\Controllers;

use App\Tasks;
use App\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(){
        $data = Tasks::all();
        return view('content.tasks', compact('data'));
    }

    public function create(){
        $users = User::all();
        return view('content.tasks.addTask', compact('users'));
    }
    
    public function show(int $id){
        $data = Tasks::find($id);
        return view('content.tasks.viewTask', compact('data'));
    }

    public function edit(int $id){
        if (!$data = Tasks::find($id)) {
            return redirect()
                ->route('tasks.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Não foi possível efetuar o cadastro.']);
        }

        $users=User::all();
        return view('content.tasks.editTask', compact('data', 'users'));
    }

    public function destroy(int $id){
        Tasks::find($id)->delete($id);
        return redirect()->route('tasks');
    }

    public function search(Request $request) {
        if ($request->search == "") {
            return redirect()->route('tasks.index');
        }
        $data = Tasks::where('name', 'LIKE', '%' . $request->search . '%')->get();
        return view('content.tasks', compact('data'));
    }

    public function store(Request $request){

        $validate = $this->makeRules($request);
        $this->validate($request, $validate['rulesUpdate'], $validate['messages']);

        if ($data = Tasks::create($request->all())) {
            return redirect()
                ->route('tasks.show', $data->id)
                ->with('message', ['type' => 'success', 'msg' => 'Cadastro criado com sucesso']);
        }

        return redirect()
                ->route('tasks.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Não foi possível criar o cadastro.']);
    }

    public function update(Request $request, $id){
        if (!$data = Tasks::find($id)) {
            return redirect()
                ->route('tasks.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Não foi possível localizar o cadastro.']);
        }

        $validate = $this->makeRules($request, $data);
        $this->validate($request, $validate['rulesUpdate'], $validate['messages']);

        if ($data->update($request->all())) {
            return redirect()
                ->route('tasks.show', $data->id)
                ->with('message', ['type' => 'success', 'msg' => 'Cadastro atualizado com sucesso']);
        }

        return redirect()
                ->route('tasks.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Não foi possível editar o cadastro.']);
    }

    public function makeRules(Request $request, $data = null){
        $messages = [
            'name.required' => 'Por favor informe o nome.',
            'name.min' => 'Nome inválido, mínimo de 3 caracteres',
            'name.max' => 'Nome inválido, máximo de 100 caracteres',
            'name.unique' => 'Nome inválido, este nome já existe',

            'description.min' => 'Descrição inválida, mínimo de 3 caracteres',
            'description.max' => 'Descrição inválida, máximo de 1000 caracteres',
            
            'requester_id.required' => 'Por favor informe o solicitante.',
            
            'user_assigned_id.required' => 'Por favor informe o encarregado.'
        ];

        $rules = [
            'name' => 'required|min:3|max:100|unique:users,name,NULL,id',
            'description' => 'nullable|min:3|max:1000',
            'requester_id' => 'required',
            'user_assigned_id' => 'required'
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
