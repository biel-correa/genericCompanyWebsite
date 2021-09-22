@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">Planos de Tv</h1>
    <ol class="breadcrumb">
        <li class="active">Planos de Tv</li>
    </ol>
    <div class="right">
        <a class="btn btn-success" href="{{ route('tv_plans.create') }}"><i class="fa fa-plus"></i> ADD</a>
    </div>
</div>
<div class="panel">
    <div class="panel-body">
        {{-- <div class="margin-b-20">
            <button class="btn btn-primary" id="filter-toggle">Show Filters</button>
            <div class="hide" id="filters">
                <div class="row">
                    <div class="col-md-4">
                        <label for="role_id">Role</label>
                        {{ Form::select('role_id', $roles, old('role_id'), ['placeholder' => 'Select a role', 'id' => 'role_id', 'onchange' => 'refreshTableUsers();', 'class' => 'form-control select2']) }}
                    </div>
                    <div class="col-md-4">
                        <label for="">Data de criação inicial</label>
                        {{ Form::date('min_created_at', null, ['placeholder' => 'Select a date', 'id' => 'min_created_at', 'onchange' => 'refreshTableUsers();', 'class' => 'form-control']) }}
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div> --}}
        <div class="table-responsive">
            <table class="table" id="table-users">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantidade de canais</th>
                    <th>Valor</th>
                    <th>Creation Date</th>
                    <th>Action</th>
                </thead>
                <tfoot>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantidade de canais</th>
                    <th>Valor</th>
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
    var urlUsersDefault = '{{ route('ajax.tv_plans') }}'
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
                type: 'GET'
            },
            fixedColumns: true,
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'channelQuantity'},
                {data: 'price'},
                {data: 'created_at'},
                {data: 'action', searchable: false},
            ]
        })
    } );
</script>
@endsection