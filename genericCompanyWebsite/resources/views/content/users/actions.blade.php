<a class="btn btn-xs btn-success" href="{{ route('users.show', $d) }}">View</a>
<a class="btn btn-xs btn-primary" href="{{ route('users.edit', $d) }}">Edit</a>
@if ($canDelete)    
    <button class="btn btn-xs btn-danger" id="btn-delete-{{$d}}">Delete</button>
    <form action="{{route('users.destroy', $d)}}" method="post" id="delete-{{$d}}">
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

@else
    <button class="btn btn-xs btn-danger" disabled>Delete</button>
@endif