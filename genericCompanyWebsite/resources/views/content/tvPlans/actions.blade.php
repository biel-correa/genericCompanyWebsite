<a href="{{ route('tv_plans.show', $id) }}" class="btn btn-xs btn-success">View</a>
<a href="{{ route('tv_plans.edit', $id) }}" class="btn btn-xs btn-primary">Edit</a>
@if ($is_active)
    <a class="btn btn-xs btn-danger" id="btn-delete-{{$id}}">Delete</a>
    <form action="{{route('tv_plans.destroy', $id)}}" method="post" id="delete-{{$id}}">
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
    <a class="btn btn-xs btn-info" id="btn-delete-{{$id}}">Deactivated</a>
@endif

