<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Facturación</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">

        {{-- LOGO --}}
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            Sistema de Facturación
        </a>

        {{-- BOTÓN MOBILE --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- MENÚ --}}
        <div class="collapse navbar-collapse" id="menu">
            <div class="ms-auto d-flex gap-2 flex-wrap">

                <a href="{{ route('factura.index') }}" class="btn btn-outline-light btn-sm">
                    Facturas
                </a>

                <a href="{{ route('cliente.index') }}" class="btn btn-outline-light btn-sm">
                    Clientes
                </a>

                <a href="{{ route('articulo.index') }}" class="btn btn-outline-light btn-sm">
                    Artículos
                </a>

                <a href="{{ route('proveedores.index') }}" class="btn btn-outline-light btn-sm">
                    Proveedores
                </a>

                {{-- CONSULTAS --}}
                <a href="{{ route('consultas.ventas') }}" class="btn btn-outline-warning btn-sm">
                    Ventas
                </a>

                <a href="{{ route('consultas.stock') }}" class="btn btn-outline-info btn-sm">
                    Stock Bajo
                </a>

            </div>
        </div>

    </div>
</nav>

{{-- CONTENIDO --}}
<div class="container">
    @yield('content')
</div>

{{-- FOOTER --}}
<footer class="bg-dark text-light text-center py-3 mt-5">
    <small>© {{ date('Y') }} Sistema de Facturación</small>
</footer>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
