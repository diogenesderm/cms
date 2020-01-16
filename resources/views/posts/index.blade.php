@extends('layouts.app');

@section('content')

<div class="d-flex justify-content-end mb-2">
<a class="btn btn-success" href="{{ route('posts.create')}}">Create Posts</a>
</div>

<div class="card card-default">
    <div class="card-header">
        Posts
    </div>
    <div class="card-body">
        @if($posts->count() > 0 )
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Action</th>
                <tbody>
                    @if(isset($posts))
                    @foreach ($posts as $post)
                    <tr>
                        <td>
                         <img width="60px" height="60px" src="{{ url('storage/app/'.$post->image) }}" alt="">
                        </td>
                        <td>
                            {{ $post->title }}
                        </td>
                        <td>
                        <a href="{{ route('categories.edit',$post->category_id) }}">
                            {{ $post->category->name }}
                        </a>
                        </td>
                        @if($post->trashed())
                            <td>
                            <form action="{{ route('restore-posts',$post->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-info" type="submit">Restore</button>
                            </form>
                            </td>

                            @else
                            <td>
                                <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-info btn-sm">Edit</a>
                                </td>
                        @endif
                        <td>
                        <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn btn-danger">
                              {{ $post->trashed() ? 'Delete' : 'Trash'}}
                            </button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                   @endif
                </tbody>
            </thead>
        </table>
        @else
        <h3>Não ha posts</h3>
        @endif
    </div>
</div>
@endsection

