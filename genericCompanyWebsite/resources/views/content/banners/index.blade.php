@extends('layout')
@section('content')
    <div class="page-header">
        <h1 class="title">Banners</h1>
        <ol class="breadcrumb">
            <li class="active">Banners</li>
        </ol>
        <div class="right">
            <a class="btn btn-success" href="{{ route('banners.create') }}"><i class="fa fa-user-plus"></i> ADD</a>
        </div>
    </div>
    @foreach($data as $file)
        <div class="panel panel-widget blog-post">
            <div class="panel-body">
                <img src="{{asset($file->file_path)}}" class="image" alt="img" style="opacity: 1" loading=lazy>
                <a class="btn btn-xs btn-success" href="{{ route('banners.show', $file->file_name) }}">View</a>
                <a class="btn btn-xs btn-primary" href="{{route('banners.edit', $file->file_name)}}">Edit</a>
                <a class="btn btn-xs btn-danger" id="btn-delete-{{$file->id}}">Delete</a>
                <form action="{{route('banners.destroy', $file->file_name)}}" method="post" id="delete-{{$file->id}}">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}
                </form>
                <script>
                    document.querySelector('#btn-delete-{{$file->id}}').onclick = function () {
                        swal({
                            title: "Tem certeza?",
                            text: "O cadastro será permanentemente excluído!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Sim",
                            cancelButtonText: "Não",
                            closeOnConfirm: true
                        }, function () {
                            event.preventDefault();
                            document.getElementById('delete-{{$file->id}}').submit();
                        });
                    };
                </script>
<!--                <p class="author">
                    <img src="img/profileimg.png" alt="img">
                    <span>Jonathan Doe</span>
                    Designer
                </p>-->
            </div>
        </div>
    @endforeach
@endsection