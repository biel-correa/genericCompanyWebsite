<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tasks;
use App\Role;
use DataTables;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function listUsers(Request $request){
        $data = User::join('roles', 'users.role_id', '=', 'roles.id')
        ->select('users.id', 'users.name', 'users.email', DB::raw("DATE_FORMAT(users.created_at, '%d/%m/%Y') as createdAt"), 'roles.name as role_name');
        
        if ($request->has('filters')) {
            foreach ($request['filters'] as $key => $value) {
                if ($value) {
                    $data = $data->where($key, '=', $value);
                }
            }
        }

        $data = $data->limit(100)->get();
        return DataTables::of($data)
        ->addColumn('action', function($row){
            $d = $row['id'];
            $canDelete = true;
            $user = User::find($d);
            if (count($user->tasksAssined)) {
                $canDelete = false;
            } elseif (count($user->tasksCreated)) {
                $canDelete = false;
            }
            $actionBtn = view('content.users.actions', compact('d', 'canDelete'))->render();
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function taskassined(Request $request, int $id) {
        $data = Tasks::join('users', 'tasks.user_assigned_id', '=', 'users.id')
        ->select('tasks.id', 'tasks.name', 'tasks.created_at')->limit(100)->get();
        
        return DataTables::of($data)
        ->addColumn('action', function($row){
            $d = $row['id'];
            $actionBtn = view('content.users.assignedActions', compact('d'))->render();
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function taskrequested(Request $request, int $id) {
        $data = Tasks::join('users', 'tasks.requester_id', '=', 'users.id')
        ->select('tasks.id', 'tasks.name', 'tasks.created_at')->limit(100)->get();
        
        return DataTables::of($data)
        ->addColumn('action', function($row){
            $d = $row['id'];
            $actionBtn = view('content.users.assignedActions', compact('d'))->render();
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function listTasks(Request $request) {
        $data = Tasks::join('users', 'tasks.user_assigned_id', '=', 'users.id')
        ->select('tasks.id', 'tasks.name', 'users.name as assign_to', 'tasks.created_at')->limit(100)->get();

        return DataTables::of($data)
        ->addColumn('action', function($row){
            $d = $row['id'];
            $actionBtn = view('content.tasks.actions', compact('d'))->render();;
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function listRoles(Request $request) {
        $data = Role::latest()->limit(100)->get()->map(function($item) {
            $newData = $item->only(['id', 'name', 'created_at']);
            $newData['created_at'] = $newData['created_at']->format('d/m/Y');
            return $newData;
        });
        return DataTables::of($data)
        ->addColumn('action', function($row){
            $d = $row['id'];
            $actionBtn = view('content.roles.actions', compact('d'))->render();;
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
