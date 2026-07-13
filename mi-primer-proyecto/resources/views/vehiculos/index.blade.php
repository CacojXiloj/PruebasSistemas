@extends('layouts.app')

@section('titulo', 'Listado de Vehículos')

@section('contenido')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-[#002D62]">🚗 Gestión de Vehículos</h1>
        <a href="/vehiculos/crear" class="bg-green-600 text-white px-4 py-2 rounded-md shadow hover:bg-green-700 font-bold transition">
            + Nuevo Vehículo
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#002D62] text-white">
                    <th class="py-3 px-4 uppercase font-semibold text-sm">ID</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Placa</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Marca</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Modelo</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($vehiculos as $auto)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $auto->id }}</td>
                    <td class="py-3 px-4 font-bold">{{ $auto->placa }}</td>
                    <td class="py-3 px-4">{{ $auto->marca }}</td>
                    <td class="py-3 px-4">{{ $auto->modelo }}</td>
                    <td class="py-3 px-4 text-center">
                        <a href="/vehiculos/{{ $auto->id }}/editar" class="text-blue-500 hover:text-blue-700 mr-2">✏️ Editar</a>
                        <button class="text-red-500 hover:text-red-700">🗑️ Borrar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection