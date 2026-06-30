<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo; 

class DashboardController extends Controller 
{
    public function inicio()
    {
        return view('dashboard');
    }

    public function crear()
    {
        return view('vehiculo');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'placa' => 'required|unique:vehiculos',
            'marca' => 'required',
            'modelo' => 'required',
        ]);

        Vehiculo::create($request->all());

        return back()->with('success', '¡Vehículo guardado exitosamente en la base de datos!');
    }
}