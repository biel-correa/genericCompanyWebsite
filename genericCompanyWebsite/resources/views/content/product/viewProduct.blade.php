@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">About {{$product->name}}</h1>
</div>
<div class="container">
    <div class="panel">
        <div class="panel-body">
            <h1>Description</h1>
            <p>{{$product->description}}</p>
        </div>
    </div>
</div>
@endsection