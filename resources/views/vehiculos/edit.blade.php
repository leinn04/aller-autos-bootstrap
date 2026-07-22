@extends('layouts.app')

@section('content')
    <h1>Editar vehículo</h1>

    <form action="{{ route('vehiculos.update', $vehiculo) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select id="cliente_id" name="cliente_id" class="form-control">
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ old('cliente_id', $vehiculo->cliente_id) == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nombre }} {{ $cliente->apellido }}
                    </option>
                @endforeach
            </select>
            @error('cliente_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="placa" class="form-label">Placa</label>
            <input type="text" id="placa" name="placa" value="{{ old('placa', $vehiculo->placa) }}" class="form-control">
            @error('placa')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" id="marca" name="marca" value="{{ old('marca', $vehiculo->marca) }}" class="form-control">
            @error('marca')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" id="modelo" name="modelo" value="{{ old('modelo', $vehiculo->modelo) }}" class="form-control">
            @error('modelo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="anio" class="form-label">Año</label>
            <input type="number" id="anio" name="anio" value="{{ old('anio', $vehiculo->anio) }}" class="form-control">
            @error('anio')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" id="color" name="color" value="{{ old('color', $vehiculo->color) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar vehículo</button>
        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Volver al listado</a>
    </form>
@endsection