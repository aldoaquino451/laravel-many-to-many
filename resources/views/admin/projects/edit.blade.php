@extends('layouts.admin')

@section('content')
    <h2>
        Modifica il progetto
        <span class=" fw-bold text-capitalize">{{ $project->name }}</span>
    </h2>
    <div class="w-50">

        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="my-3 form-group">
                <label for="name" class="my-1">Nome</label>
                <input class=" form-control" type="text" id="name" name="name" value="{{ $project->name }}">
            </div>

            <div class="my-3 form-group">
                <label for="type" class="my-1">Tipo</label>
                <select class="form-select" id="type" name="type_id">
                    <option value="">...</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if ($type->id === $project->type_id) selected @endif>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="my-3 form-group">
                <label class="my-1">Tecnologia</label>
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    @foreach ($tecnologies as $tecnology)
                        <input type="checkbox" class="btn-check" id="tecnology_{{ $tecnology->id }}" name="tecnologies[]"
                            value="{{ $tecnology->id }}" autocomplete="off"
                            @if ($project->tecnologies->contains($tecnology)) checked @endif>
                        <label class="btn btn-outline-primary"
                            for="tecnology_{{ $tecnology->id }}">{{ $tecnology->name }}</label>
                    @endforeach
                </div>
            </div>

            <div class="my-3 form-group">
                <label for="description" class="my-1">Descrizione</label>
                <textarea class=" form-control" type="text" id="description" name="description" cols="30" rows="10">{{ $project->description }}</textarea>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Invio</button>
            </div>

        </form>
    </div>
@endsection
