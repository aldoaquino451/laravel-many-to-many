@extends('layouts.admin')

@section('content')
    <h2 class="my-4">Progetti raggruppati per Tipi</h2>

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
                            {{ $type->name }}: {{ count($type->projects) }} progetti
                        </td>
                        <td class="text-capitalize">
                            <ul class="list-group">
                                @foreach ($type->projects as $project)
                                    <li class="list-group-item">
                                        {{ $project->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <th scope="row">-</th>
                    <td class="text-capitalize">
                        Nessun Tipo
                    </td>
                    <td class="text-capitalize">
                        <ul class="list-group">
                            @foreach ($projects_no_type as $project)
                                <li class="list-group-item">
                                    {{ $project->name }}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
