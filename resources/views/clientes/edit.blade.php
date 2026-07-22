@extends('layouts.app')

@section('content')
    <h1>Editar cliente</h1>

    <form action="{{ route('clientes.update', $cliente) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" class="form-control">
            @error('nombre')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $cliente->apellido) }}" class="form-control">
            @error('apellido')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ci" class="form-label">Cédula de identidad</label>
            <input type="text" id="ci" name="ci" value="{{ old('ci', $cliente->ci) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}" class="form-control">
            @error('telefono')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" id="correo" name="correo" value="{{ old('correo', $cliente->correo) }}" class="form-control">
            @error('correo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $cliente->direccion) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar cliente</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver al listado</a>
    </form>
@endsection