@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">Edit {{$data->name}}</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('tasks.index')}}">Tasks</a></li>
        <li class="active">Edit task</li>
    </ol>
</div>
<div class="panel">
    <div class="panel-body">
        {{
            Form::model($data, [
                'route'=>['tasks.update', $data->id],
                'method'=>'PUT',
                'class'=>'col-md-12'
            ])
        }}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="task-name">Name: </label>
                    {{ Form::text('name', $data->name, ['class'=>'form-control mb-3', 'id'=>'task-name'])}}
                    @if($errors->has('name'))
                        <p class="text-danger">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="task-expiration">Expiration date:</label>
                    {{ Form::date('expiration_date', date('Y-m-d', strtotime($data->expiration_date)), ['class'=>'form-control']) }} 
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="task-requester">Select a requester</label>
                    @if (count($users) < 1)
                    <h1>No users where found</h1>
                    @else
                        {{ Form::select('requester_id', $users, old('task-requester'), ['placeholder' => 'Select a requester', 'id' => 'task-requester', 'class' => 'form-control  select2'])}}
                    @endif
                    @if($errors->has('requester_id'))
                        <p class="text-danger">
                            {{ $errors->first('requester_id') }}
                        </p>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="task-assined">Assign the task to someone</label>
                    @if (count($users) < 1)
                        <h1>No users where found</h1>
                    @else
                        {{ Form::select('user_assigned_id', $users, old('task-assined'), ['placeholder' => 'Assign to someone', 'id' => 'task-assined', 'class' => 'form-control select2'])}}
                    @endif
                    @if($errors->has('user_assigned_id'))
                        <p class="text-danger">
                            {{ $errors->first('user_assigned_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="task-description">Description: </label>
                    {{ Form::textarea('description', $data->description, ['class'=>'form-control mb-3', 'id'=>'task-description'])}}
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