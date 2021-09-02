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
    <div class="panel-body">
        <div class="margin-b-20">
            <button class="btn btn-primary" id="filter-toggle">Show Filters</button>
            <div class="hide" id="filters">
                <label for="">Cargo</label>
                @if (count($roles) < 1)
                <h1>No roles where found</h1>
                @else
                    <select name="role_id" id="role_id" class="form-control select2">
                        <option value="">Select a role</option>
                        @foreach ($roles as $role)
                            <option
                            value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                @endif
                <div class="row text-center margin-t-20">
                    <button class="btn btn-success" id="filter-submit">Apply</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table" id="table-users">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Role</th>
                    <th>Creation Date</th>
                    <th>Action</th>
                </thead>
                <tfoot>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Role</th>
                    <th>Creation Date</th>
                    <th>Action</th>
                </tfoot>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            fillTable()

            $('#filter-toggle').click(function() {
                if($('#filters').hasClass('hide')) {
                    $('#filter-toggle').html('Hide Filters')
                    $('#filters').removeClass('hide')
                } else {
                    $('#filter-toggle').html('Show Filters')
                    $('#filters').addClass('hide')
                }
            })

            $('#filter-submit').click(function() {
                $('#table-users').DataTable().destroy()
                fillTable($('#role_id').val())
            })
        } );

        function fillTable(filter_role = null) {
            let data = {
                "filters" : {
                    "users.role_id" : filter_role
                }
            }
            $('#table-users').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: "{{route('ajax.users')}}",
                    type: "GET",
                    data: data
                },
                "columns": [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'role_name', name: 'role_name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            } );
        }
    </script>
</div>
@endsection