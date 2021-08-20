<?php

namespace App\Http\Controllers;

use App\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function getTasks(){
        $Tasks = Tasks::all();
        return view('content.tasks', ['Tasks'=>$Tasks]);
    }

    public function addProduct(){
        return view('content.task.addTask');
    }
    
    public function view(int $id){
        $product = Tasks::find($id);
        return view('content.task.viewTask', ['task'=>$product]);
    }

    public function delete(int $id){
        Tasks::find($id)->delete($id);
        return redirect()->route('tasks');
    }

    public function saveNewProduct(Request $request){
        $validated = $request->validate([
            'name'=>['required', 'max:100'],
            'description'=>['max:1000']
        ]);
        if ($validated) {
            Tasks::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description')
            ]);
            return redirect()->route('tasks');
        }else{
            return redirect()->route('content.task.addTask')->withErrors($validated);
        }
    }
}
