<!DOCTYPE html>
<html>
<head>
    <title>Preview Currículum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <header class="text-center mb-4">
            <h1>{{ $about->name ?? 'Nombre del Usuario' }}</h1>
            <p>{{ $about->title ?? 'Título Profesional' }}</p>
        </header>

        <section class="mb-4">
            <h2>Acerca de mí</h2>
            <p>{{ $about->description ?? 'Descripción personal' }}</p>
        </section>

        <section class="mb-4">
            <h2>Experiencia Laboral</h2>
            @foreach($experiences as $exp)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>{{ $exp->position }} en {{ $exp->company }}</h5>
                        <p>{{ $exp->start_date }} - {{ $exp->end_date }}</p>
                        <p>{{ $exp->description }}</p>
                    </div>
                </div>
            @endforeach
        </section>

        <!-- Secciones similares para educación, habilidades y premios -->
    </div>
</body>
</html>
