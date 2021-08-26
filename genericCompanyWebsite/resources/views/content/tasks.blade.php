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
    <div class="panel-body">
        <div class="row">
            {{
                Form::open([
                    'route'=>['tasks.search'],
                    'method'=>'POST',
                    'class'=>'col-md-12'
                ])
            }}
            <div class="d-flex">
                <input type="text" name="search" placeholder="Search for a task">
                <button class="btn btn-primary margin-l-10" type="submit"><i class="fa fa-search"></i></button>
            </div>
            {{
                Form::close()
            }}
        </div>
        <table class="table">
            <thead>
                <td>Id</td>
                <td>Task</td>
                <td>Assigned to</td>
                <td>Creation Date</td>
                <td>Actions</td>
            </thead>
            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{strlen($item->name) > 50 ? substr($item->name,0,50)."..." : $item->name}}</td>
                    <td>{{$item->assignedTo->name}}</td>
                    <td>{{date('d/m/Y H:i', strtotime($item->created_at))}}</td>
                    <td>
                        <a class="btn btn-xs btn-success" href="{{route('tasks.show', ['id'=>$item->id])}}">View</a>
                        <a class="btn btn-xs btn-primary" href="{{route('tasks.edit', ['id'=>$item->id])}}">Edit</a>
                        <button id="btn-delete-{{$item->id}}" class="btn btn-xs btn-danger" href="{{route('tasks.destroy', ['id'=>$item->id])}}">Delete</button>
                        <form action="{{route('tasks.destroy', $item->id)}}" method="post" id="delete-{{$item->id}}">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                        </form>
                        <script>
                            document.querySelector('#btn-delete-{{$item->id}}').onclick = function () {
                                swal({
                                    title: "Tem certeza?",
                                    text: "O cadastro será permanentemente excluído!",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#DD6B55",
                                    confirmButtonText: "Sim",
                                    cancelButtonText: "Não",
                                    closeOnConfirm: true
                                }, function () {
                                    event.preventDefault();
                                    document.getElementById('delete-{{$item->id}}').submit();
                                });
                            };
                        </script>
                    </td>
                </tr>
                @empty
                <h1>No Tasks were found</h1>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection