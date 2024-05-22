<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
</head>
<body>
    <form action="{{ route('usuario.index') }}" method="get">
        <label for="">Buscar:</label>
        <input type="text" name="texto" value="{{ $texto }}">
        <input type="submit" value="Buscar">
    </form>
    <a href="{{ route('usuario.create') }}">Nuevo</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->activo ? 'Activo' : 'Inactivo' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $usuarios->appends(['texto' => $texto])->links() }}
</body>
</html>
