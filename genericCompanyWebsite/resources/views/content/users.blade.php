@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">Users</h1>
    <ol class="breadcrumb">
        <li class="active">Users</li>
    </ol>
    <div class="right">
        <a class="btn btn-success" href="{{ route('user.create') }}"><i class="fa fa-user-plus"></i> ADD</a>
    </div>
</div>
<div class="panel">
    <div class="panel-body table-responsive">
        <div class="row">
            {{
                Form::open([
                    'route'=>['users.search'],
                    'method'=>'POST',
                    'class'=>'col-md-12'
                ])
            }}
            <div class="flex">
                <input type="text" name="search" placeholder="Search by name">
                <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
            </div>
            {{
                Form::close()
            }}
        </div>
        <table class="table">
            <thead>
                <td>ID</td>
                <td>Name</td>
                <td>E-mail</td>
                <td>Creation Date</td>
                <td>Actions</td>
            </thead>
            <tbody>
                @forelse  ($users as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{date('d/m/Y H:i', strtotime($item->created_at))}}</td>
                        <td>
                            <a class="btn btn-xs btn-success" href="{{route('user.show', ['id'=>$item->id])}}">
                                View
                            </a>
                            <a class="btn btn-xs btn-primary" href="{{route('user.edit', ['id'=>$item->id])}}">
                                Edit
                            </a>
                            @if (count($item->tasksAssined) == 0 && count($item->tasksCreated) == 0)
                                <button class="btn btn-xs btn-danger" id="btn-delete-{{$item->id}}">
                                    Delete
                                </button>
                                <form action="{{route('user.destroy', $item->id)}}" method="post" id="delete-{{$item->id}}">
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
                            @else
                                <button class="btn btn-xs btn-danger" disabled>
                                    Delete
                                </button>
                            @endif
                        </td>
                    </tr>
                @empty
                <h1>Couldn't find any user</h1>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection