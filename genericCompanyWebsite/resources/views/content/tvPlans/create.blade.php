@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">Create new role</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('tv_plans.index')}}">Planos de Tv</a></li>
        <li class="active">Create plano</li>
    </ol>
</div>
<div class="panel">
    <div class="panel-body">
        {{
            Form::open([
                'route'=>['tv_plans.store'],
                'method'=>'POST',
                'class'=>'col-md-12'
            ])
        }}  
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="plan-name">Name: </label>
                    {{ Form::text('name', null,['class'=>'form-control', 'id'=>'plan-name', 'placeholder'=>'Set a name'])}}
                    @if($errors->has('name'))
                        <p class="text-danger">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="plan-price">Price:</label>
                    {{ Form::number('price', null, ['class'=>'form-control', 'id'=>'plan-price', 'placeholder'=>'Set a price']) }}
                </div>
                <div class="col-md-6">
                    <label for="plan-channels">Number of channels:</label>
                    {{ Form::number('channelQuantity', null, ['class'=>'form-control', 'id'=>'plan-channels', 'placeholder'=>'Set a number of channels']) }}
                </div>
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