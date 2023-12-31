@extends('layouts.admin')

@section('content')
    <h2 class="my-4">Progetti raggruppati per Tipo</h2>

    <div class=" w-75">
        <table class="table ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Progetti</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>
                        <td class="text-capitalize">
                            {{ $type->name }}
                        </td>
                        <td class="text-capitalize">
                            @if (!$type->projects->isEmpty())
                                <ul class="list-group">
                                    <li class="list-group-item bg-dark text-light">
                                        Numero Progetti: {{ count($type->projects) }}
                                    </li>
                                    @foreach ($type->projects as $project)
                                        <li class="list-group-item">
                                            {{ $project->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <span>Nessun Progetto</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <th scope="row">-</th>
                    <td class="text-capitalize">
                        Nessun Tipo
                    </td>
                    <td class="text-capitalize">
                        @if (count($projects_no_type) > 0)
                            <ul class="list-group">
                                <li class="list-group-item bg-dark text-light">
                                    Numero Progetti: {{ count($projects_no_type) }}
                                </li>
                                @foreach ($projects_no_type as $project)
                                    <li class="list-group-item">
                                        {{ $project->name }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <span>Nessun Progetto</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
