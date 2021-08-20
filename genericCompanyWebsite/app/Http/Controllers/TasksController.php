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
        return view('content.task.editTask', ['task'=>$task]);
    }

    public function delete(int $id){
        Tasks::find($id)->delete($id);
        return redirect()->route('tasks');
    }

    public function saveNewTask(Request $request){
        $validated = $request->validate([
            'name'=>['required', 'max:100'],
            'description'=>['max:1000'],
            'requester_id'=>['required']
        ]);
        if ($validated) {
            Tasks::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'requester_id'=>$request->input('requester_id')
            ]);
            return redirect()->route('tasks');
        }else{
            return redirect()->route('content.task.addTask')->withErrors($validated);
        }
    }

    public function saveEdit(Request $request, $id){
        $validated = $request->validate([
            'name'=>['required', 'max:100'],
            'description'=>['max:1000']
        ]);
        if ($validated) {
            $task = Tasks::find($id);
            if ($task) {
                $task->name=$request->input('name');
                $task->description=$request->input('description');
                $task->save();
                return redirect()->route('task.edit', ['id'=>$id]);
            } else {
                return redirect()->route('task.add');
            }
        } else {
            return redirect()->route('task.edit', ['id'=>$id])->withErrors($validated);
        }
    }
}
