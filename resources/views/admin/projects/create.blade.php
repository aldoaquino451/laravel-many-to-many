@extends('layouts.admin')

@section('content')
    <h2>Crea un nuovo Progetto</h2>
    <div class="w-50">

        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf

            <div class="my-3 form-group">
                <label for="name" class="my-1">Nome</label>
                <input class=" form-control" type="text" id="name" name="name">
            </div>

            <div class="my-3 form-group">
                <label for="type" class="my-1">Tipo</label>
                <select class="form-select" id="type" name="type_id">
                    <option value="">...</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">
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
                            value="{{ $tecnology->id }}" autocomplete="off">
                        <label class="btn btn-outline-primary"
                            for="tecnology_{{ $tecnology->id }}">{{ $tecnology->name }}</label>
                    @endforeach
                </div>
            </div>

            <div class="my-3 form-group">
                <label for="description" class="my-1">Descrizione</label>
                <textarea class=" form-control" type="text" id="description" name="description" cols="30" rows="10"></textarea>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Invio</button>
                <button type="reset" class="btn btn-primary">Annulla</button>
            </div>

        </form>
    </div>
@endsection
