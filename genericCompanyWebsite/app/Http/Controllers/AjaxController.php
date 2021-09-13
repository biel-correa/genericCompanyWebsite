<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tasks;
use App\Role;
use DataTables;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Contracts\DataTable;

class AjaxController extends Controller
{
    public function listUsers(Request $request){
        $filter_request = $request['filter'] ?? [];
        $whereFilter = [];

        foreach ($filter_request as $key => $filter) {
            $operator = (array_key_exists('operator', $filter) ? $filter['operator'] : null);
            $value = (array_key_exists('value', $filter) ? $filter['value'] : null);
            
            if ((strlen(trim($operator)) > 0)) {
                switch ($key) {
                    case 'role_id':
                        if ($value == null) {
                            $operator = '!=';
                        }
                    case 'created_at':
                        if ($value == null) {
                            $operator = '!=';
                        }
                    default:
                        $key = 'users.' . $key;
                }
            }

            $whereFilter[] = [$key, $operator, $value];
        }

        $data = User::select(['users.*', DB::raw('DATE_FORMAT(users.created_at, "%d/%m/%Y %H:%i") as formarted_created_at'), 'roles.name as role_name'])
            ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->where($whereFilter)
            ->limit(100);
        
        $dataTable = DataTables::of($data)
            ->addColumn('action', 'content.users.actions')
            ->make(true);

        return $dataTable;
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
        $filter_request = $request['filter'] ?? [];
        $whereFilter = [];

        foreach ($filter_request as $key => $filter) {
            $operator = (array_key_exists('operator', $filter) ? $filter['operator'] : null);
            $value = (array_key_exists('value', $filter) ? $filter['value'] : null);
            
            if ((strlen(trim($operator)) > 0)) {
                switch ($key) {
                    default:
                        $key = 'users.' . $key;
                }
            }

            $whereFilter[] = [$key, $operator, $value];
        }
        
        $data = Tasks::join('users', 'tasks.user_assigned_id', '=', 'users.id')
        ->select('tasks.id', 'tasks.name', 'users.name as assign_to', DB::raw('DATE_FORMAT(tasks.created_at, "%d/%m/%Y %H:%i") as formarted_created_at'))
        ->where($whereFilter)
        ->limit(100);
        
        return DataTables::of($data)
        ->addColumn('action', 'content.tasks.actions')
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
