<?php

namespace App\Http\Controllers;

use App\Tasks;
use App\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function getTasks(){
        $tasks = Tasks::all();
        return view('content.tasks', ['tasks'=>$tasks]);
    }

    public function addTask(){
        $users = User::all();
        return view('content.task.addTask', ['users'=>$users]);
    }
    
    public function view(int $id){
        $task = Tasks::find($id);
        return view('content.task.viewTask', ['task'=>$task]);
    }

    public function edit(int $id){
        $task=Tasks::find($id);
        $users=User::all();
        return view('content.task.editTask', ['task'=>$task, 'users'=>$users]);
    }

    public function delete(int $id){
        Tasks::find($id)->delete($id);
        return redirect()->route('tasks');
    }

    public function search(Request $request) {
        if ($request->search == "") {
            return redirect()->route('tasks');
        }
        $tasks = Tasks::where('name', 'LIKE', '%' . $request->search . '%')->get();
        return view('content.tasks', ['tasks'=>$tasks]);
    }

    public function saveNewTask(Request $request){
        $validated = $request->validate([
            'name'=>['required', 'max:100'],
            'description'=>['max:1000'],
            'requester_id'=>['required'],
            'user_assigned_id'=>['required']
        ]);
        if ($validated) {
            Tasks::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'requester_id'=>$request->input('requester_id'),
                'user_assigned_id'=>$request->input('user_assigned_id'),
                'expiration_date'=>$request->input('expiration_date')
            ]);
            return redirect()->route('tasks');
        }else{
            return redirect()->route('content.task.addTask')->withErrors($validated);
        }
    }

    public function saveEdit(Request $request, $id){
        $validated = $request->validate([
            'name'=>['required', 'max:100'],
            'description'=>['max:1000'],
            'requester_id'=>['required'],
            'user_assigned_id'=>['required']
        ]);
        if ($validated) {
            $task = Tasks::find($id);
            if ($task) {
                $task->name=$request->input('name');
                $task->description=$request->input('description');
                $task->requester_id=$request->input('requester_id');
                $task->user_assigned_id=$request->input('user_assigned_id');
                $task->expiration_date=$request->input('expiration_date');
                $task->save();
                return redirect()->route('tasks');
            } else {
                return redirect()->route('task.add');
            }
        } else {
            return redirect()->route('task.edit', ['id'=>$id])->withErrors($validated);
        }
    }
}
