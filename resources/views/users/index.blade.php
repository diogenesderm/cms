@extends('layouts.app')
@section('content')

<div class="card card-default">
    <div class="card-header">
        Users
    </div>
    <div class="card-body">
        @if($users->count() > 0)
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo permissão</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td><img class="rounded-circle" src="{{ Gravatar::src($user->email)}}"></td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        @if(!$user ->isAdmin())
                            <form action="{{route('users.make-admin',$user->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="gtn btn-success btn-sm">Make Admin</button>
                            </form>

                       @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal -->
        <form action="" method="POST" id="deleteUserForm">
            @csrf
            @method('DELETE')
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-bold">
                                Voce Tem certeza disso?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @else
            <h3>Nao ha Users</h3>
        @endif
    </div>
</div>

@endsection

@section('scripts')
<script>
    function handleDelete(id) {
        $('#deleteModal').modal('show');

        var form = document.getElementById('deleteUserForm');
        form.action = '/users/' + id;

    }
</script>
@endsection
