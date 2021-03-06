@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
        {{ isset($category) ? 'Edit Category' : 'Create Category'}}
    </div>
    <div class="card-body">
        @include('partials.erros')
        <form action="{{ isset($category) ? route('categories.update',$category->id) : route('categories.store') }}" method="post">
            @csrf

            @if(isset($category))
            @method('PUT')
            @endif

            <div class="form-group">
                <label for="name"></label>
                <input value="{{ isset($category) ? $category->name : ''}}" name="name" id="name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-success">{{ isset($category) ? 'Update Category' : 'Add Category'}}</button>
            </div>
        </form>
    </div>
</div>

@endsection