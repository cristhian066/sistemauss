<div class="modal-content">
    <form id="formUpdate" action="{{ route('vehiculo.store') }}" method="post">
        @csrf
        <div class="modal-header">
            <h4 class="modal-title" id="modal-title">Crear Vehículo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="placa">Placa</label>
                <input type="text" name="placa" class="form-control" id="placa" placeholder="Ingrese placa">
                <div id="msg_placa"></div>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" name="modelo" class="form-control" id="modelo" placeholder="Ingrese modelo">
                <div id="msg_modelo"></div>
            </div>
            <div class="form-group">
                <label for="propietario">Propietario</label>
                <input type="text" name="propietario" class="form-control" id="propietario" placeholder="Ingrese propietario">
                <div id="msg_propietario"></div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="guardar"><span id="textoBoton">Guardar</span></button>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </form>
</div>
