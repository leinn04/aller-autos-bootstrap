@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Listado de Vehículos</h2>

        <a href="{{ route('vehiculos.create') }}" class="btn btn-success mb-3">
            Nuevo Vehículo
        </a>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Placa</th>
                    <th>Marca / Modelo</th>
                    <th>Año</th>
                    <th>Color</th>
                    <th>Cliente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vehiculos as $vehiculo)
                    <tr>
                        <td>{{ $vehiculo->id }}</td>
                        <td>{{ $vehiculo->placa }}</td>
                        <td>{{ $vehiculo->marca }} {{ $vehiculo->modelo }}</td>
                        <td>{{ $vehiculo->anio }}</td>
                        <td>{{ $vehiculo->color ?? 'Sin color' }}</td>
                        <td>{{ $vehiculo->cliente->nombre }} {{ $vehiculo->cliente->apellido }}</td>
                        <td>
                            <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('vehiculos.destroy', $vehiculo) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Seguro que deseas eliminar este vehículo?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No existen vehículos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection