<?php

namespace App\Http\Controllers;

use App\User;
use App\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Libraries\SSP;

class UserController extends Controller
{
    public function ajax(Request $request) {
        // DB table to use
        $table = User::getModel()->getTable();
        
        // Table's primary key
        $primaryKey = User::getModel()->getKeyName();
        
        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array( 'db' => 'name', 'dt' => 1 ),
            array( 'db' => 'email',  'dt' => 2 ),
            array(
                'db'        => 'created_at',
                'dt'        => 3,
                'formatter' => function( $d, $row ) {
                    return date( 'j/m/Y', strtotime($d));
                }
            ),
            array(
                'db'        => 'id',
                'dt'        => 4,
                'formatter' => function( $d, $row ) {
                    $canDelete = true;
                    $user = User::find($d);
                    if (count($user->tasksAssined)) {
                        $canDelete = false;
                    } elseif (count($user->tasksCreated)) {
                        $canDelete = false;
                    }
                    return view('content.users.actions', compact('d', 'canDelete'))->render();
                }
            ),

        );
        
        // SQL server connection information
        $sql_details = array(
            'user' => 'homestead',
            'pass' => 'secret',
            'db'   => 'company-db',
            'host' => '127.0.0.1'
        );
        
        
        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
        * If you just want to use the basic configuration for DataTables with PHP
        * server-side, there is no need to edit below this line.
        */
        
        echo json_encode(
            SSP::simple( $request, $sql_details, $table, $primaryKey, $columns )
        );
    }

    public function taskassined(Request $request, int $id) {
        // DB table to use
        $table = Tasks::getModel()->getTable();
        
        // Table's primary key
        $primaryKey = Tasks::getModel()->getKeyName();
        
        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array(
                'db' => 'name',
                'dt' => 1,
                'formatter' => function ($d, $row) {
                    return strlen($d) > 50 ? substr($d,0,50)."..." : $d;
            }),
            array(
                'db' => 'requester_id',
                'dt' => 2,
                'formatter' => function($d, $row) {
                    return User::find($d)->name;
                }
            ),
            array(
                'db'        => 'created_at',
                'dt'        => 3,
                'formatter' => function( $d, $row ) {
                    return date( 'j/m/Y', strtotime($d));
                }
            ),
            array(
                'db'        => 'id',
                'dt'        => 4,
                'formatter' => function( $d, $row ) {
                    return view('content.users.assignedActions', compact('d'))->render();;
                }
            ),

        );
        
        // SQL server connection information
        $sql_details = array(
            'user' => 'homestead',
            'pass' => 'secret',
            'db'   => 'company-db',
            'host' => '127.0.0.1'
        );
        
        
        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
        * If you just want to use the basic configuration for DataTables with PHP
        * server-side, there is no need to edit below this line.
        */

        $where = 'user_assigned_id = ' . $id;
        
        echo json_encode(
            SSP::complex( $request, $sql_details, $table, $primaryKey, $columns, null, $where)
        );
    }

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
        return view('content.users.addUser');
    }

    public function index(){
        $data = User::all();
        if (!count($data)) {
            return redirect()
                ->route('users.index')
                ->with('message', ['type' => 'danger', 'msg' => 'Não foi possível localizar nenhum cadastro.']);
        }

        return view('content.users', compact('data'));
    }

    public function show(int $id){
        $data = User::find($id);
        return view('content.users.viewUser', compact('data'));
    }

    public function destroy(int $id){
        $data = User::find($id);
        if ($data->tasksCreated->count() && $data->tasksAssined->count()) {
            return redirect()
            ->route('users.index')
            ->with('message', ['type' => 'danger', 'msg' => 'Esse usuário esta registrado em uma ou mais tarefas.']);
        }
        
        $data->delete();
        return redirect()->route('users.index');
    }

    public function search(Request $request) {
        if ($request->search == "") {
            return redirect()->route('users.index');
        }
        $data = User::where('name', 'LIKE', '%' . $request->search . '%')->get();
        return view('content.users', compact('data'));
    }

    public function edit(int $id){
        if ($data = User::find($id)) {
            return view('content.users.editUser', compact('data'));
        }
        
        return redirect()->route('users.index');
    }

    public function update(Request $request, int $id){
        
        if (!$data = User::find($id)) {
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
            'password.max' => 'Senha inválidoa, máximo de 256 caracteres'
        ];

        $rules = [
            'name' => 'required|min:3|max:100|unique:users,name,NULL,id',
            'email' => 'required|min:3|max:255|unique:users,email,NULL,id',
            'password' => 'nullable|min:3|max:256',
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
