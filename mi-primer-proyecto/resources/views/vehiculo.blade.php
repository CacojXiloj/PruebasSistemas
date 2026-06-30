<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Vehículo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">🚗 Registrar Nuevo Vehículo</h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">¡Excelente!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops, hay un problema:</strong>
                <ul class="list-disc mt-2 ml-4 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/vehiculos/guardar" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Placa de la unidad:</label>
                <input type="text" name="placa" value="{{ old('placa') }}" placeholder="Ej: P-123ABC" required 
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 uppercase">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Marca:</label>
                <input type="text" name="marca" value="{{ old('marca') }}" placeholder="Ej: Toyota" required 
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 capitalize">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Modelo:</label>
                <input type="text" name="modelo" value="{{ old('modelo') }}" placeholder="Ej: Hilux" required 
                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 capitalize">
            </div>

            <button type="submit" 
                    class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">
                💾 Guardar Vehículo
            </button>
        </form>
        
        <div class="text-center mt-4">
            <a href="/panel" class="text-sm text-blue-500 hover:underline">← Volver al Panel</a>
        </div>
    </div>

</body>
</html>