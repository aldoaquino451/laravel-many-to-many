@extends('layouts.admin')

@section('content')
    <h2 class="my-4">Lista dei Tipi</h2>

    <div class=" w-75">

        <section>
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success " role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.types.store') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nuovo Tipo" name="name">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-primary">Aggiungi</button>
                    </div>
                </div>
            </form>
        </section>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col" style="width: 155px">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr>
                        <th scope="row">{{ $type->id }}</th>

                        <td class=" text-capitalize">
                            @if ($type->id === $type_id)
                                <form action="{{ route('admin.types.update', $type) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $type->name }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-secondary">Modifica</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                {{ $type->name }}
                            @endif
                        </td>

                        <td>
                            <form action="{{ route('admin.types.edit', $type) }}" method="GET" class="d-inline-block">
                                @csrf
                                <button type="submit" class="btn btn-warning">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </form>

                            <form action="{{ route('admin.types.destroy', $type) }}" method="POST" class="d-inline-block">
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

        {{ $types->links() }}
    </div>
@endsection
