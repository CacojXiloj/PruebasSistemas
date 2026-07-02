<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo; // ¡Muy importante!

class VehiculoController extends Controller
{
    // 1. Mostrar la tabla (Listado)
    public function index()
    {
        $vehiculos = Vehiculo::all(); // Traemos todos los de PostgreSQL
        return view('vehiculos.index', compact('vehiculos'));
    }

    // 2. Mostrar el formulario
    public function create()
    {
        return view('vehiculos.create'); // Busca en la carpeta vehiculos el archivo create
    }

    // 3. Guardar en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|unique:vehiculos',
            'marca' => 'required',
            'modelo' => 'required',
        ]);

        Vehiculo::create($request->all());

        // ¡Cambio clave! Al guardar, regresamos a la tabla, no al formulario.
        return redirect('/vehiculos')->with('success', '¡Vehículo guardado exitosamente!');
    }
}