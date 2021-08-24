@extends('layout')
@section('content')
<div class="page-header">
    <h1 class="title">Tasks</h1>

    <ol class="breadcrumb">
        <li class="active">Tasks</li>
    </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
        <a class="btn btn-success" onclick="openAddUser()" href="{{ route('task.add') }}"><i class="fa fa-user-plus"></i> ADD</a>
    </div>
    <!-- End Page Header Right Div -->

</div>

<div class="panel">
    <div class="panel-body">
        <div class="row">
            {{
                Form::open([
                    'route'=>['task.search'],
                    'method'=>'POST',
                    'class'=>'col-md-12'
                ])
            }}
            <div class="flex">
                <input type="text" name="search" placeholder="Search for a task">
                <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
            </div>
            {{
                Form::close()
            }}
        </div>
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
                    <td>{{strlen($item->name) > 50 ? substr($item->name,0,50)."..." : $item->name}}</td>
                    <td>{{$item->assignedTo->name}}</td>
                    <td>{{date('d/m/Y H:i', strtotime($item->created_at))}}</td>
                    <td>
                        <a class="btn btn-xs btn-success" href="{{route('task.view', ['id'=>$item->id])}}">View</a>
                        <a class="btn btn-xs btn-primary" href="{{route('task.edit', ['id'=>$item->id])}}">Edit</a>
                        <a class="btn btn-xs btn-danger" href="{{route('task.delete', ['id'=>$item->id])}}">Delete</a>
                    </td>
                </tr>
                @empty
                <h1>No Tasks were found</h1>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection