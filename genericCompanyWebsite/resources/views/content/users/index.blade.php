@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">Users</h1>
    <ol class="breadcrumb">
        <li class="active">Users</li>
    </ol>
    <div class="right">
        <a class="btn btn-success" href="{{ route('users.create') }}"><i class="fa fa-user-plus"></i> ADD</a>
    </div>
</div>
<div class="panel">
    <div class="panel-body table-responsive">
        <table class="table" id="table-users">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Creation Date</th>
                <th>Action</th>
            </thead>
            <tfoot>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Creation Date</th>
                <th>Action</th>
            </tfoot>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#table-users').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "{{route('ajax.users')}}",
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            } );
        } );
    </script>
</div>
@endsection