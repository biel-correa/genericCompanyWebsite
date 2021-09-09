<a href="{{ route('users.show', $id) }}" class="btn btn-xs btn-success">View</a>
<a href="{{ route('users.edit', $id) }}" class="btn btn-xs btn-primary">Edit</a>
@if (count($model->tasksAssined) == 0 && count($model->tasksCreated) == 0)
    <a class="btn btn-xs btn-danger" id="btn-delete-{{$id}}">Delete</a>
    <form action="{{route('users.destroy', $id)}}" method="post" id="delete-{{$id}}">
        <input type="hidden" name="_method" value="DELETE">
        {{ csrf_field() }}
    </form>
    <script>
        document.querySelector('#btn-delete-{{$id}}').onclick = function () {
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
                document.getElementById('delete-{{$id}}').submit();
            });
        };
    </script>
@else
    <button class="btn btn-xs btn-danger" disabled>Delete</button>
@endif