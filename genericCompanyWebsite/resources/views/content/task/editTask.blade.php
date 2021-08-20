@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">Edit {{$task->name}}</h1>
</div>
<div class="container">
    <div class="panel">
        <div class="panel-body">
            {{
                Form::open([
                    'route'=>['task.saveEdit', $task->id],
                    'method'=>'POST',
                    'class'=>'col-md-12'
                ])
            }}
                <div class="row mb-3">
                    <label for="task-name">Name: </label>
                    {{ Form::text('name', $task->name, ['class'=>'form-control mb-3', 'id'=>'task-name'])}}
                    @if($errors->has('name'))
                        <p class="text-danger">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                <div class="row mb-3">
                    <label for="task-requester">Select a requester</label>
                    @if (count($users) < 1)
                        <h1>No users where found</h1>
                    @else
                        <select name="requester_id" id="task-requester" class="form-control">
                            <option value="">Select a requester</option>
                            @foreach ($users as $user)
                                @if ($user->id == $task->requester_id)
                                    <option value="{{$user->id}}" selected>{{$user->name}}</option>    
                                @else
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    @endif
                    @if($errors->has('requester_id'))
                        <p class="text-danger">
                            {{ $errors->first('requester_id') }}
                        </p>
                    @endif
                </div>
                <div class="row mb-3">
                    <label for="task-assined">Assign the task to someone</label>
                    @if (count($users) < 1)
                        <h1>No users where found</h1>
                    @else
                        <select name="user_assigned_id" id="task-assined" class="form-control">
                            <option value="">Assign to someone</option>
                            @foreach ($users as $user)
                            @if ($user->id == $task->user_assigned_id)
                                <option value="{{$user->id}}" selected>{{$user->name}}</option>    
                            @else
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    @endif
                    @if($errors->has('user_assigned_id'))
                        <p class="text-danger">
                            {{ $errors->first('user_assigned_id') }}
                        </p>
                    @endif
                </div>
                <div class="row mb-3">
                    <label for="task-description">Description: </label>
                    {{ Form::textarea('description', $task->description, ['class'=>'form-control mb-3', 'id'=>'task-description'])}}
                    @if($errors->has('description'))
                        <p class="text-danger">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
                <div class="col-md-12 text-center">
                    <button class="btn btn-primary w-25">Save</button>
                </div>
            {{
                Form::close()
            }}
        </div>
    </div>
</div>
@endsection