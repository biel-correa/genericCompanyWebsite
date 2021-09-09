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
                <label for="">Role</label>
                {{ Form::select('role_id', $roles, old('role_id'), ['placeholder' => 'Select a role', 'id' => 'role_id', 'onchange' => 'refreshTableUsers();']) }}
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
        var urlUsersDefault = '{{ route('ajax.users') }}'
        var tableUsers;

        function refreshTableUsers() {
            tableUsers.ajax.url(urlUsersDefault)
            tableUsers.draw();
        }

        $(document).ready(function() {
            $('#filter-toggle').click(function() {
                if($('#filters').hasClass('hide')) {
                    $('#filter-toggle').html('Hide Filters')
                    $('#filters').removeClass('hide')
                } else {
                    $('#filter-toggle').html('Show Filters')
                    $('#filters').addClass('hide')
                }
            })

            tableUsers = $('#table-users').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json'
                },
                searchDelay: 2500,
                processing: true,
                serverSide: true,
                autoWidth: false,
                paging: true,
                order: [0, 'desc'],
                ajax: {
                    url: urlUsersDefault,
                    type: 'GET',
                    data: function(d) {
                        return $.extend({}, d, {
                            'filter': {
                                'role_id': {
                                    'operator': $('#role_id').val() == "" ? '!=' : '=',
                                    'value': $('#role_id').val()
                                }
                            }
                        })
                    }
                },
                fixedColumns: true,
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'role_name', name: 'role.name'},
                    {data: 'created_at'},
                    {data: 'action', searchable: false},
                ]
            })
        } );
    </script>
</div>
@endsection