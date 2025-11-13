<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .section { margin-bottom: 15px; }
        .section h2 { border-bottom: 1px solid #ccc; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $about->name ?? 'Nombre del Usuario' }}</h1>
        <p>{{ $about->title ?? 'Título Profesional' }}</p>
    </div>

    <div class="section">
        <h2>Acerca de mí</h2>
        <p>{{ $about->description ?? 'Descripción personal' }}</p>
    </div>

    <!-- Resto de secciones -->
</body>
</html>
