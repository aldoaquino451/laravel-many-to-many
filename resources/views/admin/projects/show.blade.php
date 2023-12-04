@php
    use App\Models\Date;
@endphp

@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <h4 class="my-4 text-capitalize">{{ $project->name }}</h4>
            <p class="my-3"><strong>Data: </strong>{{ Date::formatDate($project->date) }}</p>
            <p class="my-3"><strong>Descrizione: </strong><br> {{ $project->description }}</p>
        </div>
    </div>
@endsection
