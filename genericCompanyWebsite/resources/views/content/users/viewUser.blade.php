@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">About {{$data->name}}</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('users.index')}}">Users</a></li>
        <li class="active">Create user</li>
    </ol>
    <div class="right">
        <a class="btn btn-primary" href="{{ route('users.edit', $data->id) }}"><i class="fa fa-pencil"></i> Edit</a>
    </div>
</div>
<div class="panel">
    <div class="panel-body">
        <h1>User info</h1>
        <ul>
            <li>Name: {{$data->name}}</li>
            <li>E-mail: {{$data->email}}</li>
            @if ($data->role)
                <li>Role: {{$data->role->name}}</li>
            @else
                <li>Role: Not defined. <a href="{{route('users.edit', $data->id)}}">Add one</a></li>
            @endif
            <li>Created at: {{date('d/m/Y H:i', strtotime($data->created_at))}}</li>
        </ul>
    </div>
</div>
<div class="panel">
    <div class="panel-body table-responsive">
        <h1>Tasks assigned</h1>
        <table class="table" id="table-assigned">
            <thead>
                <td>Id</td>
                <td>Task</td>
                <td>Creator</td>
                <td>Created at</td>
                <td>Actions</td>
            </thead>
            <tfoot>
                <td>Id</td>
                <td>Task</td>
                <td>Creator</td>
                <td>Created at</td>
                <td>Actions</td>
            </tfoot>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#table-assigned').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "{{route('ajax.users.taskassined', $data->id)}}"
            } );
        } );
    </script>
</div>
<div class="panel">
    <div class="panel-body table-responsive">
        <h1>Tasks created</h1>
        <table class="table" id="table-requested">
            <thead>
                <td>Id</td>
                <td>Name</td>
                <td>Assigned</td>
                <td>Created at</td>
                <td>Actions</td>
            </thead>
            <tfoot>
                <td>Id</td>
                <td>Name</td>
                <td>Assigned</td>
                <td>Created at</td>
                <td>Actions</td>
            </tfoot>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#table-requested').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "{{route('ajax.users.taskrequested', $data->id)}}"
            } );
        } );
    </script>
</div>
@endsection