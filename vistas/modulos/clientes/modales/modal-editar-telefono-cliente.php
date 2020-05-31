<!-- Modal editar telefonos clientes -->
<div class="modal fade" id="modalEditarTelefonosCliente" tabindex="-1" role="dialog" aria-labelledby="modalEditarTelefonosCliente" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-info" style="color: white;">
          <h5 class="modal-title">Telefonos del Cliente</h5>
        </div>
        <div class="modal-body">
          <div class="box-body">

            <!-- Entrada para el nombre del Proveedor -->

              <div class="container">

                <div class="row">
                  <div class="col-12 text-secondary">
                    <i class="fas fa-info-circle"></i> Edita la descripcion y telefono de abajo, para editar el numero existente.
                  </div>
                </div>

                <div class="row">
                  <div id="editarDescripcionTelefonoCliente" class="col-6"></div>
                  <div id="editarTelefonoCliente"class="col-6"></div>
                </div>
              </div>


          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
        <!---->
      </form>
    </div>
  </div>
</div>
<?php 

        $editarTelefonoProveedor = new ControladorClientes();
        $editarTelefonoProveedor -> ctrEditarTelefonoClientes();

?>
<?php 

   $eliminarTelefonoCliente= new ControladorClientes();
   $eliminarTelefonoCliente-> ctrEliminarTelefonoCliente();

?>