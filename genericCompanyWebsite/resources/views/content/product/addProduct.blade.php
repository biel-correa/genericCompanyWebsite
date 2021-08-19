@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">Create new product</h1>
</div>
<div class="container">
    <div class="panel">
        <div class="panel-body">
            {{
                Form::open([
                    'route'=>['product.saveNewProduct'],
                    'method'=>'POST',
                    'class'=>'col-md-12'
                ])
            }}  
                <div class="row mb-3">
                    <label for="product-name">Name: </label>
                    <input type="text" name="name" class="form-control" id="product-name">
                    @if($errors->has('name'))
                        <p class="text-danger">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
                <div class="row mb-3">
                    <label for="product-name">Description: </label>
                    <textarea type="text" name="description" class="form-control" id="product-name" rows="5"></textarea>
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