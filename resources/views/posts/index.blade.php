@extends('layouts.app');

@section('content')
   
<div class="d-flex justify-content-end mb-2">
<a href="{{ route('posts.create')}}"></a>
</div>

<div class="card card-default">
    <div class="card-header">
        Posts
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Action</th>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>
                         <img width="60px" height="60px" src="{{ url('storage/'.$post->image) }}" alt=""> 
                        </td>
                        <td>
                            {{ $post->title }}
                        </td>
                        <td>
                            <a href="" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
            </thead>
        </table>
    </div>
</div>
@endsection