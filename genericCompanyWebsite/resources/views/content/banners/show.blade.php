@extends('layout')
@section('content')
    <div class="page-header">
        <h1 class="title">Viewing {{$data->file_name}}</h1>
        <ol class="breadcrumb">
            <li><a href="{{route('banners.index')}}">Banners</a></li>
            <li class="active">View banner</li>
        </ol>
        <div class="right">
            <a class="btn btn-primary" href="{{ route('banners.edit', $data->file_name) }}"><i class="fa fa-pencil"></i> Edit</a>
        </div>
    </div>
    <div class="panel">
        <div class="panel-body">
            <img src="{{ asset($data->file_path) }}" class="img">
        </div>
    </div>
@endsection