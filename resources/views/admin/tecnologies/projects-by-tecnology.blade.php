@extends('layouts.admin')

@section('content')
<h2 class="my-4">
  Lista dei progetti per la tecnologia :
  <span class=" text-capitalize">{{ $tecnology->name }}</span>
</h2>

<ul class="list-group">
  @foreach ($tecnology->projects as $project)
  <li class="list-group-item">
    {{ $project->name }}
  </li>
  @endforeach
</ul>
@endsection