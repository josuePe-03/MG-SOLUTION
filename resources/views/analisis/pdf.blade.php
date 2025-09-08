<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Análisis #{{ $analisis->id }}</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Análisis #{{ $analisis->id }}</h2>
    <p><strong>Cliente:</strong> {{ $analisis->cliente->nombre }}</p>
    <p><strong>Doctor:</strong> {{ $analisis->doctor->nombre }}</p>
    <p><strong>Tipo de análisis:</strong> {{ $analisis->tipoAnalisis->nombre }}</p>
    <p><strong>Método:</strong> {{ $analisis->tipoMetodo->nombre }}</p>
    <p><strong>Muestra:</strong> {{ $analisis->tipoMuestra->nombre }}</p>
    <p><strong>Nota:</strong> {{ $analisis->nota }}</p>

    <h3>Resultados</h3>
    <table>
        <thead>
            <tr>
                <th>Hemograma</th>
                <th>Categoría</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($analisis->hemogramas as $h)
                <tr>
                    <td>{{ $h->nombre }}</td>
                    <td>{{ $h->categoria->nombre ?? 'Sin categoría' }}</td>
                    <td>{{ $h->pivot->resultado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
