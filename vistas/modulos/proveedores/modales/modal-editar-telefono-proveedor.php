<!-- Modal editar telefonos proveedor -->
<div class="modal fade" id="modalEditarTelefonosProveedor" tabindex="-1" role="dialog" aria-labelledby="modalEditarTelefonosProveedor" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-info" style="color: white;">
          <h5 class="modal-title">Telefonos del proveedor</h5>
        </div>
        <div class="modal-body">
        <br><br>
          <div class="box-body">

            <!-- Entrada para el nombre del Proveedor -->

              <div class="container">
                <div class="row">
                  <div id="editarDescripcion" class="col-6"></div>
                  <div id="editaTelefonos"class="col-6"></div>
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

        $editarTelefonoProveedor = new ControladorProveedores();
        $editarTelefonoProveedor -> ctrEditarTelefonoProveedor();

?>
<?php 

  $eliminarProveedor= new ControladorProveedores();
  $eliminarProveedor-> ctrEliminarTelefonoProveedor();

?>