@extends('layouts.app')

@section('titulo', 'Editar Vehículo')

@section('contenido')
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md mx-auto">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">✏️ Editar Vehículo</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops, revisa los datos:</strong>
                <ul class="list-disc mt-2 ml-4 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Fíjate en la ruta: apuntamos a /vehiculos/ID -->
        <form action="/vehiculos/{{ $vehiculo->id }}" method="POST" class="space-y-4">
            @csrf
            <!-- Esta es la directiva mágica para convertir POST en PUT -->
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Placa de la unidad:</label>
                <!-- Fíjate cómo combinamos old() con el valor actual de la base de datos -->
                <input type="text" name="placa" value="{{ old('placa', $vehiculo->placa) }}" required 
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 uppercase">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Marca:</label>
                <input type="text" name="marca" value="{{ old('marca', $vehiculo->marca) }}" required 
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 capitalize">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Modelo:</label>
                <input type="text" name="modelo" value="{{ old('modelo', $vehiculo->modelo) }}" required 
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 capitalize">
            </div>

            <button type="submit" 
                    class="w-full bg-yellow-500 text-white font-bold py-2 px-4 rounded-md hover:bg-yellow-600 transition duration-300">
                🔄 Actualizar Vehículo
            </button>
        </form>
        
        <div class="text-center mt-4">
            <a href="/vehiculos" class="text-sm text-blue-500 hover:underline">← Cancelar y Volver</a>
        </div>
    </div>
@endsection