@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">About {{$user->name}}</h1>
</div>
<div class="container">
    <div class="panel">
        <div class="panel-body">
            <h1>User info</h1>
            <ul>
                <li>Name: {{$user->name}}</li>
                <li>E-mail: {{$user->email}}</li>
                <li>Created at: {{$user->created_at}}</li>
            </ul>
        </div>
    </div>
    <div class="panel">
        <div class="panel-body">
            <h1>Tasks created</h1>
            <table class="table">
                <thead>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Created at</td>
                </thead>
                <tbody>
                    @forelse ($user->tasks as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td>{{$task->name}}</td>
                            <td>{{date('d/m/Y H:i', strtotime($task->created_at))}}</td>
                        </tr>
                    @empty
                        <h1>No tasks were assigned</h1>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection