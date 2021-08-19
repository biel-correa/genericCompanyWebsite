@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">Products</h1>

    <!-- Start Page Header Right Div -->
    <div class="right">
        <a class="btn btn-success" onclick="openAddUser()" href="{{ route('product.add') }}"><i class="fa fa-user-plus"></i> ADD</a>
    </div>
    <!-- End Page Header Right Div -->

</div>

<div class="container">
    <div class="panel">
        <div class="panel-body">
            <table class="table">
                <thead>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Creation Date</td>
                    <td>Actions</td>
                </thead>
                <tbody>
                    @forelse ($products as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{date('d/m/Y H:i', strtotime($item->created_at))}}</td>
                        <td>
                            <a class="btn btn-danger" href="{{route('product.delete', ['id'=>$item->id])}}">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <h1>No products were found</h1>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection