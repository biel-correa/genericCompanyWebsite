@extends('layout')
@section('content')
<div class="editUser container">
    <div class="panel">
        <div class="panel-body">
            <h1>Details from: {{$user->name}}</h1>
            {{
                Form::open([
                    'route'=>['users.saveUserData', $user->id],
                    'method'=>'POST',
                    'class'=>'col-md-12'
                ])
            }}
            <div class="form-group">
                <label for="user-name">Name:</label>
                {{ Form::text('name', $user->name, ['class'=>'form-control', 'id'=>'user-name'])}}
            </div>
            <div class="form-group">
                <label for="user-email">E-mail:</label>
                {{ Form::text('email', $user->email, ['class'=>'form-control', 'id'=>'user-email'])}}
            </div>
            <p>Created: {{$user->created_at}}</p>
            <p>ID: {{$user->id}}</p>
            <div class="col-md-12 text-center">
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
        </div>
    </div>
</div>

@endsection