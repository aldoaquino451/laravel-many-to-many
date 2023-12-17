@extends('layouts.admin')

@section('content')
    <h2 class="my-4">Progetti raggruppati per Tecnologia</h2>

    <div class=" w-75">
        <table class="table ">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Versione</th>
                    <th scope="col">Progetti</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tecnologies as $tecnology)
                    <tr>
                        <th scope="row">{{ $tecnology->id }}</th>
                        <td class="text-capitalize">
                            {{ $tecnology->name }}
                        </td>
                        <th scope="row">{{ $tecnology->version }}</th>
                        <td class="text-capitalize">
                            @if (!$tecnology->projects->isEmpty())
                                <ul class="list-group">
                                    <li class="list-group-item bg-dark text-light">
                                        Numero Progetti: {{ count($tecnology->projects) }}
                                    </li>
                                    @foreach ($tecnology->projects as $project)
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
                        Nessuna Tecnologia
                    </td>
                    <td class="text-capitalize">
                        -
                    </td>
                    <td class="text-capitalize">
                        @if (count($projects_no_tecnology) > 0)
                            <ul class="list-group">
                                <li class="list-group-item bg-dark text-light">
                                    Numero Progetti: {{ count($projects_no_tecnology) }}
                                </li>
                                @foreach ($projects_no_tecnology as $project)
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
