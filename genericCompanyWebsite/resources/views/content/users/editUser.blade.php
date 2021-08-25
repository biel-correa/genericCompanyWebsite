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
            Form::open([
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

<div class="panel">
    <div class="panel-body">
        <h1>Edit password</h1>
        {{Form::open([
            'route'=>['users.updateUserPassword', $data->id],
            'method'=>'POST',
            'class'=>'col-md-12'
        ])}}
        <div class="form-group">
            <label for="user-password">Password:</label>
            {{ Form::password('password', ['class'=>'form-control', 'id'=>'user-password'])}}
        </div>
        @if($errors->has('password'))
            <div class="errors col-md-12 text-center mt-3">
                <p class="text-danger">
                    {{ $errors->first('password') }}
                </p>
            </div>
        @endif
        <div class="col-md-12 text-center margin-t-10">
            <button class="btn btn-danger w-25">
                Save
            </button>
        </div>
        {{
            Form::close()
        }}
    </div>
</div>

@endsection