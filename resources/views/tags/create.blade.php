@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
        {{ isset($tag) ? 'Edit Tag' : 'Create Tag'}}
    </div>
    <div class="card-body">
      @include('partials.erros')
        <form action="{{ isset($tag) ? route('tags.update',$tag->id) : route('tags.store') }}" method="post">
            @csrf

            @if(isset($tag))
            @method('PUT')
            @endif

            <div class="form-group">
                <label for="name"></label>
                <input value="{{ isset($tag) ? $tag->name : ''}}" name="name" id="name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-success">{{ isset($tag) ? 'Update Tag' : 'Add Tag'}}</button>
            </div>
        </form>
    </div>
</div>

@endsection