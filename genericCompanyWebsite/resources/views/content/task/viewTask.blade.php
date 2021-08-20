@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">About {{$task->name}}</h1>
</div>
<div class="container">
    @if ($task->description)
        <div class="panel">
            <div class="panel-body">
                <h1>Description</h1>
                <p>{{$task->description}}</p>
                @if ($task->expiration_date)
                    <h3>Needs to be delivered until {{date('d/m/Y', strtotime($task->expiration_date))}}</h3>
                @endif
            </div>
        </div>
    @endif
    @if (!$task->description)
        <div class="panel">
            <div class="panel-body">
                <div class="col-md-12 text-center">
                    <h1>There is no description for this task</h1>
                    <a class="btn btn-success" href="{{route('task.edit', ['id'=>$task->id])}}">Add one</a>
                </div>
                @if ($task->expiration_date)
                    <h3>Needs to be delivered until {{date('d/m/Y', strtotime($task->expiration_date))}}</h3>
                @endif
            </div>
        </div>
    @endif
    <div class="panel">
        <div class="panel-body">
            <h1>Related</h1>
            <ul>
                <li>
                    Requester:
                    <a href="{{route('users.view', ['id'=>$task->requester->id])}}">
                    {{$task->requester->name}}
                    </a>
                </li>
                <li>
                    Assined to:
                    <a href="{{route('users.view', ['id'=>$task->assignedTo->id])}}">
                    {{$task->assignedTo->name}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection