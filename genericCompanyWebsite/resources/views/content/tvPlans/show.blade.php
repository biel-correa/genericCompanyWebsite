@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">About {{$data->name}}</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('tv_plans.index')}}">Planos de Tv</a></li>
        <li class="active">View plano</li>
    </ol>
    <div class="right">
        <a class="btn btn-primary" href="{{ route('tv_plans.edit', $data->id) }}"><i class="fa fa-pencil"></i> Edit</a>
    </div>
</div>
<div class="panel">
    <div class="panel-body">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#data" aria-controls="data" role="tab" data-toggle="tab">Data</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="data">
                <h1>Data:</h1>
                <ul>
                    <li>Name: {{$data->name}}</li>
                    <li>Number of channels: {{$data->channelQuantity}}</li>
                    <li>Price: {{$data->price}}</li>
                    <li>Created: {{date('d/m/Y', strtotime($data->created_at))}}</li>
                    <li>Description: {{$data->description}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection