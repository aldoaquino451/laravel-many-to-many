@extends('layouts.admin')

@section('content')
    <h2>Modifica il Progetto {{ $project->name }}</h2>
    <div class="w-50">

        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" form-group m-3">
                <label for="name">Modifica il Nome</label>
                <input class=" form-control" type="text" id="name" name="name" value="{{ $project->name }}">
            </div>
            <div class=" form-group m-3">
                <label for="description">Modifica la Descrizione</label>
                <textarea class=" form-control" type="text" id="description" name="description" cols="30" rows="10">{{ $project->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Invia</button>

        </form>
    </div>
@endsection
