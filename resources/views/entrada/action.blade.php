<div class="modal-content">
    <form id="formUpdate" action="{{ $entrada->id ? route('entrada.update', $entrada) : route('entrada.store') }}" method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="modal-title">Entrada</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @if($entrada->id)
                @method('PUT')
                <input type="hidden" name="id" value="{{ $entrada->id }}">
            @endif
            @csrf
            <div class="form-group">
                <label for="vehiculo">Vehículo</label>
                <select name="vehiculo" class="form-control" id="vehiculo">
                    @foreach($vehiculos as $vehiculo)
                        <option value="{{ $vehiculo->id }}">{{ $vehiculo->placa }}</option>
                    @endforeach
                </select>
                <div id="msg_vehiculo"></div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary" id="guardar"><span id="textoBoton">Guardar</span></button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </form>
</div>
