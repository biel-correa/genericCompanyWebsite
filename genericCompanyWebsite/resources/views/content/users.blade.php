@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">Users</h1>
</div>

<div class="container d-none" id="add-user-container">
    <div class="panel">
        <div class="panel-body">
            <h3>Add User</h3>
            <div class="row my-3">
                {{
                    Form::open([
                        'route'=>['users.createNewUser'],
                        'method'=>'POST',
                        'class'=>'col-md-12'
                    ])
                }}
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="E-mail" name="email">
                    @if($errors->has('email'))
                        <p class="text-danger">
                            {{ $errors->first('email')}}
                        </p>
                    @endif
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Name" name="name">
                    @if($errors->has('name'))
                        <p class="text-danger">
                            {{ $errors->first('name')}}
                        </p>
                    @endif
                </div>
                <div class="col-md-4">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    @if($errors->has('password'))
                        <p class="text-danger">
                            {{ $errors->first('password')}}
                        </p>
                    @endif
                </div>
                <div class="col-md-12 text-center mt-3">
                    <button class="btn btn-primary">Salvar</button>
                </div>
                {{
                    Form::close()
                }}
            </div>
        </div>
    </div>
</div>

<div class="container mb-3">
    <div class="panel">
        <div class="panel-body table-responsive">
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
                                <a class="btn btn-success" href="{{route('users.view', ['id'=>$item->id])}}">
                                    View
                                </a>
                                <a class="btn btn-primary" href="{{route('users.editUserById', ['id'=>$item->id])}}">
                                    Edit
                                </a>
                                @if (count($item->tasksAssined) == 0 && count($item->tasksCreated) == 0)
                                    <a class="btn btn-danger" href="{{route('users.deleteUserById', ['id'=>$item->id])}}">
                                        Delete
                                    </a>
                                @else
                                    <button class="btn btn-danger" disabled>
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
</div>

<script>
    function openAddUser(){
        let container = document.getElementById('add-user-container')
        if(container.classList.contains('d-block')){
            container.classList.add('d-none')
            container.classList.remove('d-block')
        }else{
            container.classList.add('d-block')
            container.classList.remove('d-none')
        }
    }

</script>
@endsection