<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Facturación</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">FacturaSys</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('factura.index') }}">
                            Facturas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cliente.index') }}">
                            Clientes
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('articulo.index') }}">
                            Artículos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('proveedores.index') }}">
                            Proveedores
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container text-center mt-5">
        <h1 class="display-5 fw-bold">Bienvenido al Sistema de Facturación</h1>
        <p class="lead mt-3">
            Administra clientes, artículos, proveedores y genera facturas fácilmente.
        </p>

        <a href="{{ route('factura.index') }}" class="btn btn-primary btn-lg mt-3">
            Entrar al Sistema
        </a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
