@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">Create new role</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('roles.index')}}">roles</a></li>
        <li class="active">Create role</li>
    </ol>
</div>
<div class="panel">
    <div class="panel-body">
        {{
            Form::open([
                'route'=>['roles.store'],
                'method'=>'POST',
                'class'=>'col-md-12'
            ])
        }}  
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="role-name">Name: </label>
                    {{ Form::text('name', null,['class'=>'form-control', 'id'=>'user-email', 'placeholder'=>'Set a name'])}}
                    @if($errors->has('name'))
                        <p class="text-danger">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="col-md-12 text-center margin-t-10">
                <button class="btn btn-primary w-25">Save</button>
            </div>
        {{
            Form::close()
        }}
    </div>
</div>
@endsection