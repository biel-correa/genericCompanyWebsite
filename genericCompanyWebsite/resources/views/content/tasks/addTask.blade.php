@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">Create new task</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('tasks.index')}}">Tasks</a></li>
        <li class="active">Create task</li>
    </ol>
</div>
<div class="panel">
    <div class="panel-body">
        {{
            Form::open([
                'route'=>['tasks.store'],
                'method'=>'POST',
                'class'=>'col-md-12'
            ])
        }}  
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="task-name">Name: </label>
                    {{ Form::text('name', null,['class'=>'form-control', 'id'=>'user-email', 'placeholder'=>'Set a name'])}}
                    @if($errors->has('name'))
                        <p class="text-danger">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="task-requester">Select a requester</label>
                    @if (count($users) < 1)
                        <h1>No users where found</h1>
                    @else
                        <select name="requester_id" id="task-requester" class="form-control">
                            <option value="">Select a requester</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    @endif
                    @if($errors->has('requester_id'))
                        <p class="text-danger">
                            {{ $errors->first('requester_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="task-assined">Assign the task to someone</label>
                    @if (count($users) < 1)
                        <h1>No users where found</h1>
                    @else
                        <select name="user_assigned_id" id="task-assined" class="form-control">
                            <option value="">Assign to someone</option>
                            @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    @endif
                    @if($errors->has('user_assigned_id'))
                        <p class="text-danger">
                            {{ $errors->first('user_assigned_id') }}
                        </p>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="task-expiration">Expiration date:</label>
                    {{ Form::date('expiration_date', null, ['class'=>'form-control']) }} 
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="task-description">Description: </label>
                    {{{ Form::textarea('description', null, ['class'=>'form-control', 'rows'=>5]) }}}
                    @if($errors->has('description'))
                        <p class="text-danger">
                            {{ $errors->first('description') }}
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