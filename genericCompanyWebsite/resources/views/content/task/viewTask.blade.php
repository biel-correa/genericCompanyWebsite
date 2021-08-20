@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">About {{$task->name}}</h1>
</div>
<div class="container">
    <div class="panel">
        <div class="panel-body">
            <h1>Description</h1>
            <p>{{$task->description}}</p>
        </div>
    </div>
    <div class="panel">
        <div class="panel-body">
            <h1>Related</h1>
            <ul>
                <li>
                    Requester Name:
                    <a href="{{route('users.editUserById', ['id'=>$task->requester->id])}}">
                    {{$task->requester->name}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection