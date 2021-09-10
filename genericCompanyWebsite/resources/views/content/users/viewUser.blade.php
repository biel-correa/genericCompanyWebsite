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

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#information" aria-controls="information" role="tab" data-toggle="tab">Information</a></li>
            <li role="presentation"><a href="#tasks_assigned" aria-controls="tasks_assigned" role="tab" data-toggle="tab">Tasks Assigned</a></li>
            <li role="presentation"><a href="#tasks_created" aria-controls="tasks_created" role="tab" data-toggle="tab">Tasks created</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="information">
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
            <div role="tabpanel" class="tab-pane" id="tasks_assigned">
                <h1>Tasks assigned</h1>
                <table class="table" id="table-assigned">
                    <thead>
                        <td>Id</td>
                        <td>Task</td>
                        <td>Created at</td>
                        <td>Actions</td>
                    </thead>
                    <tfoot>
                        <td>Id</td>
                        <td>Task</td>
                        <td>Created at</td>
                        <td>Actions</td>
                    </tfoot>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#table-assigned').DataTable( {
                            "processing": true,
                            "serverSide": true,
                            "ajax": "{{route('ajax.users.taskassined', $data->id)}}",
                            "columns": [
                                {data: 'id', name: 'id'},
                                {data: 'name', name: 'name'},
                                {data: 'created_at', name: 'created_at'},
                                {data: 'action', name: 'action', orderable: false, searchable: false}
                            ]
                        } );
                    } );
                </script>
            </div>
            <div role="tabpanel" class="tab-pane" id="tasks_created">
                <h1>Tasks created</h1>
                <table class="table" id="table-requested">
                    <thead>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Created at</td>
                        <td>Actions</td>
                    </thead>
                    <tfoot>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Created at</td>
                        <td>Actions</td>
                    </tfoot>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#table-requested').DataTable( {
                            "processing": true,
                            "serverSide": true,
                            "ajax": "{{route('ajax.users.taskrequested', $data->id)}}",
                            "columns": [
                                {data: 'id', name: 'id'},
                                {data: 'name', name: 'name'},
                                {data: 'created_at', name: 'created_at'},
                                {data: 'action', name: 'action', orderable: false, searchable: false}
                            ]
                        } );
                    } );
                </script>
            </div>
        </div>
    </div>
</div>
@endsection