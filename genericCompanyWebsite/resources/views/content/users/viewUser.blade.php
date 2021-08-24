@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">About {{$user->name}}</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('users')}}">Users</a></li>
        <li class="active">Create user</li>
    </ol>
</div>
<div class="panel">
    <div class="panel-body">
        <h1>User info</h1>
        <ul>
            <li>Name: {{$user->name}}</li>
            <li>E-mail: {{$user->email}}</li>
            <li>Created at: {{date('d/m/Y H:i', strtotime($user->created_at))}}</li>
        </ul>
    </div>
</div>
<div class="panel">
    <div class="panel-body">
        <h1>Tasks assined</h1>
        <table class="table">
            <thead>
                <td>Id</td>
                <td>Task</td>
                <td>Creator</td>
                <td>Created at</td>
                <td>Actions</td>
            </thead>
            <tbody>
                @forelse ($user->tasksAssined as $task)
                    <tr>
                        <td>{{$task->id}}</td>
                        <td>{{strlen($task->name) > 50 ? substr($task->name,0,50)."..." : $task->name}}</td>
                        <td>{{$task->requester->name}}</td>
                        <td>{{date('d/m/Y H:i', strtotime($task->created_at))}}</td>
                        <td>
                            <a href="{{route('task.show', ['id'=>$task->id])}}" class="btn btn-xs btn-success">
                                View
                            </a>
                        </td>
                    </tr>
                @empty
                    <h1>No tasks were assigned</h1>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="panel">
    <div class="panel-body">
        <h1>Tasks created</h1>
        <table class="table">
            <thead>
                <td>Id</td>
                <td>Name</td>
                <td>Assigned</td>
                <td>Created at</td>
                <td>Actions</td>
            </thead>
            <tbody>
                @forelse ($user->tasksCreated as $task)
                    <tr>
                        <td>{{$task->id}}</td>
                        <td>{{strlen($task->name) > 50 ? substr($task->name,0,50)."..." : $task->name}}</td>
                        <td>{{$task->assignedTo->name}}</td>
                        <td>{{date('d/m/Y H:i', strtotime($task->created_at))}}</td>
                        <td>
                            <a href="{{route('task.show', ['id'=>$task->id])}}" class="btn btn-xs btn-success">
                                View
                            </a>
                        </td>
                    </tr>
                @empty
                    <h1>No tasks were created</h1>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection