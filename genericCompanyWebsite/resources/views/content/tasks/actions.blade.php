<a class="btn btn-xs btn-success" href="{{route('tasks.show', ['id'=>$d])}}">View</a>
<a class="btn btn-xs btn-primary" href="{{route('tasks.edit', ['id'=>$d])}}">Edit</a>
<button id="btn-delete-{{$d}}" class="btn btn-xs btn-danger">Delete</button>
<form action="{{route('tasks.destroy', $d)}}" method="post" id="delete-{{$d}}">
    <input type="hidden" name="_method" value="DELETE">
    {{ csrf_field() }}
</form>
<script>
    document.querySelector('#btn-delete-{{$d}}').onclick = function () {
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
            document.getElementById('delete-{{$d}}').submit();
        });
    };
</script>