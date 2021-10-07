@extends('layout')
@section('content')
    <div class="page-header">
        <h1 class="title">Edit a banner</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('banners.index') }}">Banners</a></li>
            <li class="active">Eidt banner</li>
        </ol>
    </div>
    <div class="panel">
        <div class="panel-body">
            {{ Form::open([
                'route' => ['banners.update', $data],
                'method' => 'PUT',
                'class' => 'col-md-12',
                'files' => 'true'
            ]) }}
                {{ Form::label('banner', 'Choose any image') }}
                {{ Form::file('banner', ['accept' => "image/png, image/jpeg", 'class' => 'form-control margin-b-10']) }}
                {{ Form::submit('Post', ['class' => 'btn btn-success']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection