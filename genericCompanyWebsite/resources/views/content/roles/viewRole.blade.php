@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">About {{$data->name}}</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('roles.index')}}">roles</a></li>
        <li class="active">View role</li>
    </ol>
    <div class="right">
        <a class="btn btn-primary" href="{{ route('roles.edit', $data->id) }}"><i class="fa fa-pencil"></i> Edit</a>
    </div>
</div>
<div class="panel">
    <div class="pane-body">
        <h1>Data:</h1>
        <ul>
            <li>Name: {{$data->name}}</li>
            <li>Created: {{date('d/m/Y', strtotime($data->created_at))}}</li>
        </ul>
    </div>
</div>
@endsection