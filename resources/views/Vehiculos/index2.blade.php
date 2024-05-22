<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de vehículos</title>
</head>
<body>
    <form action="{{ route('vehiculo.index') }}" method="get">
        <label for="">Buscar:</label>
        <input type="text" name="texto" value="{{ $texto }}">
        <input type="submit" value="Buscar">
    </form>
    <a href="{{ route('vehiculo.create') }}">Nuevo</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Placa</th>
                <th>Modelo</th>
                <th>Propietario</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $vehiculo)
            <tr>
                <td>{{ $vehiculo->id }}</td>
                <td>{{ $vehiculo->placa }}</td>
                <td>{{ $vehiculo->modelo }}</td>
                <td>{{ $vehiculo->propietario }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $vehiculos->appends(['texto' => $texto])->links() }}
</body>
</html>
