<a class="btn btn-xs btn-success" href="{{route('tasks.show', ['id'=>$id])}}">View</a>
<a class="btn btn-xs btn-primary" href="{{route('tasks.edit', ['id'=>$id])}}">Edit</a>
<button id="btn-delete-{{$id}}" class="btn btn-xs btn-danger">Delete</button>
<form action="{{route('tasks.destroy', $id)}}" method="post" id="delete-{{$id}}">
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