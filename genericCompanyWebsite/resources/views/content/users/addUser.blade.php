@extends('layout')
@section('content')
<div class="panel">
    <div class="panel-body">
        <h3>Add User</h3>
        <div class="row my-3">
            {{
                Form::open([
                    'route'=>['users.store'],
                    'method'=>'POST',
                    'class'=>'col-md-12'
                ])
            }}
            <div class="row margin-b-15">
                <div class="col-md-6">
                    {{ Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'E-mail']) }}
                    @if($errors->has('email'))
                        <p class="text-danger">
                            {{ $errors->first('email')}}
                        </p>
                    @endif
                </div>
                <div class="col-md-6">
                    {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name'])}}
                    @if($errors->has('name'))
                        <p class="text-danger">
                            {{ $errors->first('name')}}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row margin-b-15">
                <div class="col-md-6">
                    {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password'])}}
                    @if($errors->has('password'))
                        <p class="text-danger">
                            {{ $errors->first('password')}}
                        </p>
                    @endif
                </div>
                <div class="col-md-6">
                    @if (count($roles) < 1)
                    <h1>No roles where found</h1>
                    @else
                        {{ Form::select('role_id', $roles, old('role_id'), ['placeholder' => 'Select a role', 'id' => 'task-requester', 'class' => 'form-control select2'])}}
                    @endif
                    @if($errors->has('role_id'))
                        <p class="text-danger">
                            {{ $errors->first('role_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="col-md-12 text-center margin-t-10">
                <button class="btn btn-primary">Salvar</button>
            </div>
            {{
                Form::close()
            }}
        </div>
    </div>
</div>
@endsection