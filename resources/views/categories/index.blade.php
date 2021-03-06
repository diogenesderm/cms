@extends('layouts.app')



@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{route('categories.create')}}" class="btn btn-success">Add Category</a>
</div>
<div class="card card-default">
    <div class="card-header">
        Categories
    </div>

    <div class="card-body">
        @if($categories->count() > 0)
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Posts Count</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>{{ $category->posts()->count() }}</td>
                    <td>
                        <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-info btn-sm">Edit</a>
                        <button onclick="handleDelete({{ $category->id }})" class="gtn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal -->
        <form action="" method="POST" id="deleteCategoryForm">
            @csrf
            @method('DELETE')
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
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
            <h3>Nao ha categorias</h3>
        @endif
    </div>
</div>

@endsection

@section('scripts')
<script>
    function handleDelete(id) {
        $('#deleteModal').modal('show');

        var form = document.getElementById('deleteCategoryForm');
        form.action = '/categories/' + id;

    }
</script>
@endsection