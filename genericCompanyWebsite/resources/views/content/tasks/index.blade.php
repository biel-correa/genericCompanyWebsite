@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">Tasks</h1>

    <ol class="breadcrumb">
        <li class="active">Tasks</li>
    </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
        <a class="btn btn-success" onclick="openAddUser()" href="{{ route('tasks.create') }}"><i class="fa fa-user-plus"></i> ADD</a>
    </div>
    <!-- End Page Header Right Div -->

</div>

<div class="panel">
    <div class="panel-body table-responsive">
        <table class="table" id="table-tasks">
            <thead>
                <td>Id</td>
                <td>Task</td>
                <td>Assigned to</td>
                <td>Creation Date</td>
                <td>Actions</td>
            </thead>
            <tfoot>
                <td>Id</td>
                <td>Task</td>
                <td>Assigned to</td>
                <td>Creation Date</td>
                <td>Actions</td>
            </tfoot>
        </table>
    </div>
    <script>
        var urlTasksDefault = '{{ route('ajax.tasks') }}'
        var tableTasks;

        $(document).ready(function() {
            $('#table-tasks').DataTable( {
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
                    url: urlTasksDefault,
                    type: 'GET',
                    data: function(d) {
                        return $.extend({}, d, {
                            'filter': {
                            }
                        })
                    }
                },
                fixedColumns: true,
                "columns": [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'assign_to'},
                    {data: 'formarted_created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            } );
        } );
    </script>
</div>
@endsection