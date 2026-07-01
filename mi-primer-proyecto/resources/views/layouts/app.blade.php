<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Sistema Principal')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Arial, sans-serif; background-color: #f4f4f9; display: flex; min-height: 100vh; }
        
        /* Barra de Navegación Lateral (Sidebar) */
        .sidebar { width: 250px; background-color: #002D62; color: white; padding: 20px; display: flex; flex-direction: column; }
        .sidebar h2 { text-align: center; margin-bottom: 30px; font-size: 1.5rem; letter-spacing: 1px; }
        .sidebar a { color: white; text-decoration: none; padding: 15px; margin-bottom: 10px; border-radius: 5px; display: block; transition: 0.3s; font-weight: bold; }
        .sidebar a:hover { background-color: #004080; padding-left: 25px; } 
        
        /* Área de Contenido Principal */
        .main-content { flex: 1; padding: 40px; display: flex; flex-direction: column; }
        .caja { background: white; padding: 30px; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

    <nav class="sidebar">
        <h2>MI SISTEMA</h2>
        <a href="#">🏠 Inicio</a>
        <a href="#">🚗 Vehículos</a>
        <a href="#">👥 Clientes</a>
        <a href="#">⚙ Configuración</a>
    </nav>

    <main class="main-content">
        @yield('contenido')
    </main>

</body>
</html>