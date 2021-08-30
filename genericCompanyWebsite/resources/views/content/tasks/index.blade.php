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
        $(document).ready(function() {
            $('#table-tasks').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "{{route('ajax.tasks')}}"
            } );
        } );
    </script>
</div>
@endsection