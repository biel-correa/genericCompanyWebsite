@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">Roles</h1>
    <ol class="breadcrumb">
        <li class="active">Roles</li>
    </ol>
    <div class="right">
        <a class="btn btn-success" href="{{ route('roles.create') }}"><i class="fa fa-plus"></i> ADD</a>
    </div>
</div>
<div class="panel">
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table" id="table-users">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Creation Date</th>
                    <th>Action</th>
                </thead>
                <tfoot>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Creation Date</th>
                    <th>Action</th>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#table-users').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('ajax.roles')}}",
            "columns": [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        } );
    } );
</script>
@endsection