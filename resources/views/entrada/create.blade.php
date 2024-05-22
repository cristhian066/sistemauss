<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear entrada</title>
</head>
<body>
    <form action="{{ route('entrada.store') }}" method="post">
        @csrf
        <label for="vehiculo_id">Vehículo</label>
        <select name="vehiculo_id" id="vehiculo_id">
            <option value="">Selecciona un vehículo</option>
            @foreach($vehiculos as $vehiculo)
                <option value="{{ $vehiculo->id }}">{{ $vehiculo->placa }}</option>
            @endforeach
        </select>
        
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" value="{{ now()->format('Y-m-d') }}">
        
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
