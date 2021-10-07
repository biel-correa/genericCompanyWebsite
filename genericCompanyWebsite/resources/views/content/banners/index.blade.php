@extends('layout')
@section('content')
    @foreach($data as $file)
        <div class="panel panel-widget blog-post">
            <div class="panel-body">
                <img src="{{asset($file->full_path)}}" class="image" alt="img" style="opacity: 1">
                <a class="btn btn-xs btn-success" href="{{ route('banners.show', $file->file_name) }}">View</a>
                <a class="btn btn-xs btn-primary" href="{{route('banners.edit', $file->file_name)}}">Edit</a>
                <a class="btn btn-xs btn-danger" href="{{route('banners.edit', $file->file_name)}}">Delete</a>
<!--                <p class="author">
                    <img src="img/profileimg.png" alt="img">
                    <span>Jonathan Doe</span>
                    Designer
                </p>-->
            </div>
        </div>
    @endforeach
@endsection