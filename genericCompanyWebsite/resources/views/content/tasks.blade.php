@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">Tasks</h1>

    <!-- Start Page Header Right Div -->
    <div class="right">
        <a class="btn btn-success" onclick="openAddUser()" href="{{ route('task.add') }}"><i class="fa fa-user-plus"></i> ADD</a>
    </div>
    <!-- End Page Header Right Div -->

</div>

<div class="container">
    <div class="panel">
        <div class="panel-body">
            <table class="table">
                <thead>
                    <td>Id</td>
                    <td>Task</td>
                    <td>Assigned to</td>
                    <td>Creation Date</td>
                    <td>Actions</td>
                </thead>
                <tbody>
                    @forelse ($tasks as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->assignedTo->name}}</td>
                        <td>{{date('d/m/Y H:i', strtotime($item->created_at))}}</td>
                        <td>
                            <a class="btn btn-success" href="{{route('task.view', ['id'=>$item->id])}}">View</a>
                            <a class="btn btn-primary" href="{{route('task.edit', ['id'=>$item->id])}}">Edit</a>
                            <a class="btn btn-danger" href="{{route('task.delete', ['id'=>$item->id])}}">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <h1>No Tasks were found</h1>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection