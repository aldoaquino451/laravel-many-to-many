@php
    use App\Models\Date;
@endphp

@extends('layouts.admin')

@section('content')
    <h2 class="my-4">Lista dei Progetti</h2>

    <div class=" w-75">
        <table class="table ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data Progetto</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Tecnologia</th>
                    <th scope="col" style="width: 155px">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>

                        <td class=" text-capitalize">{{ $project->name }}</td>

                        <td>{{ Date::formatDate($project->date) }}</td>

                        <td>
                            @if ($project->type)
                                <span class=" text-capitalize text-secondary">{{ $project->type->name }}</span>
                            @else
                                <span>-</span>
                            @endif
                        </td>

                        {{--  --}}
                        <td>
                            @forelse ($project->tecnologies as $tecnology)
                                <a href="{{ route('admin.projects-by-tecnology', $tecnology) }}"
                                    class=" text-decoration-none">
                                    <span class="badge bg-primary text-capitalize">{{ $tecnology->name }} </span>
                                </a>
                            @empty
                                <a href="{{ route('admin.projects-no-tecnology') }}" class=" text-decoration-none">
                                    <span class="badge bg-danger text-capitalize">No Tecnology </span>
                                </a>
                            @endforelse
                        </td>
                        {{--  --}}

                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-success d-inline-block">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning d-inline-block">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $projects->links() }}
    </div>
@endsection
