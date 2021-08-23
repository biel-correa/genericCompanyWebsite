@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">Users</h1>
    <ol class="breadcrumb">
        <li class="active">Users</li>
    </ol>
    <div class="right">
        <a class="btn btn-success" href="{{ route('users.addUser') }}"><i class="fa fa-user-plus"></i> ADD</a>
    </div>
</div>
<div class="container mb-3">
    <div class="panel">
        <div class="panel-body table-responsive">
            <table class="table">
                <thead>
                    <td>ID</td>
                    <td>Name</td>
                    <td>E-mail</td>
                    <td>Creation Date</td>
                    <td>Actions</td>
                </thead>
                <tbody>
                    @forelse  ($users as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{date('d/m/Y H:i', strtotime($item->created_at))}}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('users.view', ['id'=>$item->id])}}">
                                    View
                                </a>
                                <a class="btn btn-primary" href="{{route('users.editUserById', ['id'=>$item->id])}}">
                                    Edit
                                </a>
                                @if (count($item->tasksAssined) == 0 && count($item->tasksCreated) == 0)
                                    <a class="btn btn-danger" href="{{route('users.deleteUserById', ['id'=>$item->id])}}">
                                        Delete
                                    </a>
                                @else
                                    <button class="btn btn-danger" disabled>
                                        Delete
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @empty
                    <h1>Couldn't find any user</h1>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection