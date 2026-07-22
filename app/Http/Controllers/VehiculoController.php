<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::with('cliente')->orderBy('id', 'desc')->get();
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        return view('vehiculos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'cliente_id' => ['required', 'exists:clientes,id'],
            'placa' => ['required', 'string', 'max:20'],
            'marca' => ['required', 'string', 'max:50'],
            'modelo' => ['required', 'string', 'max:50'],
            'anio' => ['required', 'integer', 'min:1950', 'max:' . (date('Y') + 1)],
            'color' => ['nullable', 'string', 'max:30'],
        ]);

        Vehiculo::create($datos);

        return redirect()
            ->route('vehiculos.index')
            ->with('mensaje', 'Vehículo registrado exitosamente');
    }

    public function edit(Vehiculo $vehiculo)
    {
        $clientes = Cliente::orderBy('nombre')->get();
        return view('vehiculos.edit', compact('vehiculo', 'clientes'));
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
        $datos = $request->validate([
            'cliente_id' => ['required', 'exists:clientes,id'],
            'placa' => ['required', 'string', 'max:20'],
            'marca' => ['required', 'string', 'max:50'],
            'modelo' => ['required', 'string', 'max:50'],
            'anio' => ['required', 'integer', 'min:1950', 'max:' . (date('Y') + 1)],
            'color' => ['nullable', 'string', 'max:30'],
        ]);

        $vehiculo->update($datos);

        return redirect()
            ->route('vehiculos.index')
            ->with('mensaje', 'Vehículo actualizado exitosamente');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();

        return redirect()
            ->route('vehiculos.index')
            ->with('mensaje', 'Vehículo eliminado exitosamente');
    }

    public function show(Vehiculo $vehiculo)
    {
        //
    }
}