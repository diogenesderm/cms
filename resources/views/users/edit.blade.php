@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            My Profile
        </div>
        <div class="card-body">
           @include('partials.erros')

            <form action="{{route('users.update-profile')}}" method="POST" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="sobre">Sobre mim</label>
                    <textarea class="form-control" name="sobre" id="sobre" >{{ $user->sobre }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Atualizar dados</button>
            </form>
        </div>
    </div>
@endsection
