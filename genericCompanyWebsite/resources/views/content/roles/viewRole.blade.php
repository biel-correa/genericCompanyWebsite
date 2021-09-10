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
    <div class="panel-body">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#data" aria-controls="data" role="tab" data-toggle="tab">Data</a></li>
            <li role="presentation"><a href="#all_users" aria-controls="all_users" role="tab" data-toggle="tab">All users</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="data">
                <h1>Data:</h1>
                <ul>
                    <li>Name: {{$data->name}}</li>
                    <li>Created: {{date('d/m/Y', strtotime($data->created_at))}}</li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane" id="all_users">
                <h1>All users with this role</h1>
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
                <script>
                    var urlUsersDefault = '{{ route('ajax.users') }}'
                    var tableUsers;
            
                    function refreshTableUsers() {
                        tableUsers.ajax.url(urlUsersDefault)
                        tableUsers.draw();
                    }
            
                    $(document).ready(function() {
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
                                                'operator': '=',
                                                'value': {{ $data->id }}
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
                                {data: 'formarted_created_at', name: 'created_at'},
                                {data: 'action', searchable: false},
                            ]
                        })
                    } );
                </script>
            </div>
        </div>
    </div>
</div>
@endsection