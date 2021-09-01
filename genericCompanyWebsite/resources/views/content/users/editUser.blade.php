@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">Users</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('users.index')}}">Users</a></li>
        <li class="active">Edit users</li>
    </ol>
</div>
<div class="panel">
    <div class="panel-body">
        <h1>Details from: {{$data->name}}</h1>
        {{
            Form::model($data, [
                'route'=>['users.update', $data->id],
                'method'=>'PUT',
                'class'=>'col-md-12'
            ])
        }}
        <div class="form-group">
            <label for="user-name">Name:</label>
            {{ Form::text('name', $data->name, ['class'=>'form-control', 'id'=>'user-name'])}}
            @if($errors->has('name'))
                <p class="text-danger">
                    {{ $errors->first('name') }}
                </p>
            @endif
        </div>
        <div class="form-group">
            <label for="user-email">E-mail:</label>
            {{ Form::text('email', $data->email, ['class'=>'form-control', 'id'=>'user-email'])}}
            @if($errors->has('email'))
                <p class="text-danger">
                    {{ $errors->first('email') }}
                </p>
            @endif
        </div>
        <div class="form-group">
            <label for="user-password">Password:</label>
            {{ Form::password('password', ['class'=>'form-control', 'id'=>'user-password'])}}
            @if($errors->has('password'))
                <div class="errors col-md-12 text-center mt-3">
                    <p class="text-danger">
                        {{ $errors->first('password') }}
                    </p>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="user-role">Role</label>
            @if (count($roles) < 1)
            <h1>No roles where found</h1>
            @else
                <select name="role_id" id="task-requester" class="form-control select2">
                    <option value="">Select a requester</option>
                    @foreach ($roles as $role)
                        <option
                        value="{{$role->id}}"
                        @if ($role->id == $data->role_id)
                            selected
                        @endif
                        >{{$role->name}}</option>
                    @endforeach
                </select>
            @endif
            @if($errors->has('role_id'))
                <p class="text-danger">
                    {{ $errors->first('role_id') }}
                </p>
            @endif
        </div>
        <p>Created: {{date('d/m/Y H:i', strtotime($data->created_at))}}</p>
        <p>Last Update: {{date('d/m/Y H:i', strtotime($data->updated_at))}}</p>
        <p>ID: {{$data->id}}</p>
        <div class="col-md-12 text-center margin-t-10">
            <button class="btn btn-primary w-25">
                Save
            </button>
        </div>
        {{
            Form::close()
        }}
    </div>
</div>

@endsection