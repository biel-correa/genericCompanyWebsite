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
            <p>Created: {{date('d/m/Y H:i', strtotime($user->created_at))}}</p>
            <p>Last Update: {{date('d/m/Y H:i', strtotime($user->updated_at))}}</p>
            <p>ID: {{$user->id}}</p>
            <div class="errors col-md-12 text-center mt-3">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="text-danger">
                            {{$error}}
                        </p>
                    @endforeach
                @endif
            </div>
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
            {{Form::open([
                'route'=>['users.updateUserPassword', $user->id],
                'method'=>'POST',
                'class'=>'col-md-12'
            ])}}
            <div class="form-group">
                <label for="user-password">Password:</label>
                {{ Form::password('password', ['class'=>'form-control', 'id'=>'user-password'])}}
            </div>
            <div class="errors col-md-12 text-center mt-3">
                @if($errors->has('password'))
                    <p class="text-danger">
                        {{ $errors->first('password') }}
                    </p>
                @endif
            </div>
            <div class="col-md-12 text-center">
                <button class="btn btn-danger w-25">
                    Save
                </button>
            </div>
            {{
                Form::close()
            }}
        </div>
    </div>
</div>

@endsection