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