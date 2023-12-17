@extends('layouts.admin')

@section('content')
    <h2 class="my-4">
        Lista dei progetti SENZA tecnologia
    </h2>

    <ul class="list-group">
        @foreach ($projects_no_tecnology as $project)
            <li class="list-group-item">
                {{ $project->name }}
            </li>
        @endforeach
    </ul>
@endsection
