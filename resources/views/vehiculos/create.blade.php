@extends('layouts.app')

@section('content')
    <h1>Registrar vehículo</h1>

    <form action="{{ route('vehiculos.store') }}" method="POST" class="mt-3">
        @csrf

        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select id="cliente_id" name="cliente_id" class="form-control">
                <option value="">-- Selecciona un cliente --</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
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
            <input type="text" id="placa" name="placa" value="{{ old('placa') }}" class="form-control">
            @error('placa')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" id="marca" name="marca" value="{{ old('marca') }}" class="form-control">
            @error('marca')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" id="modelo" name="modelo" value="{{ old('modelo') }}" class="form-control">
            @error('modelo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="anio" class="form-label">Año</label>
            <input type="number" id="anio" name="anio" value="{{ old('anio') }}" class="form-control">
            @error('anio')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" id="color" name="color" value="{{ old('color') }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Guardar vehículo</button>
        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Volver al listado</a>
    </form>
@endsection