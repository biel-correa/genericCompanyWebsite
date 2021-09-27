<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tasks;
use App\Role;
use Carbon\Carbon;
use DataTables;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

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

        $data = User::select(['users.*', 'roles.name as role_name'])
            ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->where($whereFilter)
            ->limit(100);
        
        $dataTable = DataTables::of($data)
            ->addColumn('action', 'content.users.actions')
            ->editColumn('created_at', function($data) {
                return with(new Carbon($data->created_at))->format('d/m/Y');
            })
            ->editColumn('updated_at', function($data) {
                return with(new Carbon($data->updated_at))->format('d/m/Y');
            })
            ->make(true);

        return $dataTable;
    }

    public function taskassined(Request $request, int $id) {
        $data = Tasks::join('users', 'tasks.user_assigned_id', '=', 'users.id')
        ->select('tasks.id', 'tasks.name', 'tasks.created_at')
        ->where('users.id', '=', $id)->limit(100)->get();
        
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
        ->select('tasks.id', 'tasks.name', 'tasks.created_at')
        ->where('users.id', '=', $id)->limit(100)->get();
        
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
        ->select('tasks.id', 'tasks.name', 'users.name as assign_to')
        ->where($whereFilter)
        ->limit(100);
        
        return DataTables::of($data)
        ->addColumn('action', 'content.tasks.actions')
        ->rawColumns(['action'])
        ->editColumn('created_at', function($data) {
            return with(new Carbon($data->created_at))->format('d/m/Y');
        })
        ->editColumn('updated_at', function($data) {
            return with(new Carbon($data->updated_at))->format('d/m/Y');
        })
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

    public function listTvPlans(Request $request) {
        $client = new Client;
        $request = $client->get('http://api1.company.test/api/planos');
        $response = json_decode($request->getBody());

        return DataTables::of($response->data)
        ->addColumn('action', function($row){
            $id = $row->id;
            $is_active = $row->is_active;
            $actionBtn = view('content.tvPlans.actions', compact('id', 'is_active'))->render();
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
