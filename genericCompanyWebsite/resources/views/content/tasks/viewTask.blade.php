@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">About {{$data->name}}</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('tasks.index')}}">Tasks</a></li>
        <li class="active">View task</li>
    </ol>
    <div class="right">
        <a class="btn btn-primary" href="{{ route('tasks.edit', $data->id) }}"><i class="fa fa-pencil"></i> Edit</a>
    </div>
</div>
@if ($data->description)
    <div class="panel">
        <div class="panel-body">
            <h1>Description</h1>
            <p>{{$data->description}}</p>
            @if ($data->expiration_date && strtotime($data->expiration_date) >= strtotime(date('d-m-Y')))
                <h3>Needs to be delivered until {{date('d/m/Y', strtotime($data->expiration_date))}}</h3>
            @elseif ($data->expiration_date && strtotime($data->expiration_date) < strtotime(date('d-m-Y')))
                <h3>Should have been delivered {{date('d/m/Y', strtotime($data->expiration_date))}}</h3>
            @endif
        </div>
    </div>
@endif
@if (!$data->description)
    <div class="panel">
        <div class="panel-body">
            <div class="col-md-12 text-center">
                <h1>There is no description for this task</h1>
                <a class="btn btn-success" href="{{route('tasks.edit', ['id'=>$data->id])}}">Add one</a>
            </div>
            @if ($data->expiration_date)
                <h3>Needs to be delivered until {{date('d/m/Y', strtotime($data->expiration_date))}}</h3>
            @endif
        </div>
    </div>
@endif
<div class="panel">
    <div class="panel-body">
        <h1>Related</h1>
        <ul>
            <li>
                Requested by:
                <a href="{{route('users.show', ['id'=>$data->requester->id])}}">
                {{$data->requester->name}}
                </a>
            </li>
            <li>
                Assigned to:
                <a href="{{route('users.show', ['id'=>$data->assignedTo->id])}}">
                {{$data->assignedTo->name}}
                </a>
            </li>
        </ul>
    </div>
</div>
@endsection