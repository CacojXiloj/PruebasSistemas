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

    // 4. Mostrar el formulario para EDITAR un vehículo
    public function edit($id)
    {
        // Buscamos el vehículo en la base de datos usando el ID de la ruta
        $vehiculo = Vehiculo::findOrFail($id);

        // Mandamos a llamar a la vista 'edit' y le pasamos la información de ese vehículo
        return view('vehiculos.edit', compact('vehiculo'));
    }

    // 5. Recibir los datos del formulario y sobreescribir en PostgreSQL
    public function update(Request $request, $id)
    {
        // 1. Validar que no nos manden campos vacíos
        $request->validate([
            // TRUCO SENIOR: Le decimos a Laravel que la placa debe ser única, 
            // PERO que ignore el ID del vehículo que estamos editando actualmente.
            'placa' => 'required|unique:vehiculos,placa,' . $id,
            'marca' => 'required',
            'modelo' => 'required',
        ]);

        // 2. Buscar el vehículo exacto que queremos editar
        $vehiculo = Vehiculo::findOrFail($id);

        // 3. Sobreescribir los datos viejos con los nuevos que vinieron del formulario
        $vehiculo->update($request->all());

        // 4. Redirigir de vuelta a la tabla con un mensaje verde de victoria
        return redirect('/vehiculos')->with('success', '¡Vehículo actualizado correctamente!');
    }

    // 6. Eliminar definitivamente el vehículo de la base de datos
    public function destroy($id)
    {
        // 1. Buscar el vehículo exacto por su ID o lanzar un error 404 si no existe
        $vehiculo = Vehiculo::findOrFail($id);

        // 2. Ejecutar la orden de eliminación en PostgreSQL
        $vehiculo->delete();

        // 3. Redirigir a la tabla general con un mensaje de éxito
        return redirect('/vehiculos')->with('success', '¡Vehículo eliminado del sistema correctamente!');
    }
}