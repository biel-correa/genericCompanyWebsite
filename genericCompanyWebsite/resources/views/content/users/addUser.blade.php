@extends('layout')
@section('content')
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
                <div class="col-md-12 text-center margin-t-10">
                    <button class="btn btn-primary">Salvar</button>
                </div>
                {{
                    Form::close()
                }}
            </div>
        </div>
    </div>
</div>
@endsection