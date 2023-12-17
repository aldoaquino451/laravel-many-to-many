@php
    use App\Models\Date;
@endphp

@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <h4 class="my-4 text-capitalize">
                {{ $project->name }}
                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning d-inline-block">
                    <i class="fa-solid fa-pencil"></i>
                </a>
                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </h4>

            <p>
                <strong>Tipo: </strong>
                <span class=" text-capitalize text-secondary">{{ $project->type?->name ?? ' - ' }}</span>
            </p>

            <p><strong>Tecnologia: </strong></p>
            @forelse ($project->tecnologies as $tecnology)
                <span class="badge bg-primary">{{ $tecnology->name }} </span>
            @empty
                <span> - </span>
            @endforelse

            <p class="my-3"><strong>Data: </strong>{{ Date::formatDate($project->date) }}</p>

            <p class="my-3"><strong>Descrizione: </strong><br> {{ $project->description }}</p>
        </div>
    </div>
@endsection
