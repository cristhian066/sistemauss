<div class="modal-content">
    <form action="{{ route('entrada.store') }}" method="post">
        @csrf
        <div class="modal-header">
            <h4 class="modal-title" id="modal-title">Crear Entrada</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="vehiculo_id">Vehículo</label>
                <select name="vehiculo_id" class="form-control" id="vehiculo_id">
                    <option value="">Selecciona un vehículo</option>
                    @foreach($vehiculos as $vehiculo)
                    <option value="{{ $vehiculo->id }}">{{ $vehiculo->placa }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha', now()->format('Y-m-d')) }}">
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
