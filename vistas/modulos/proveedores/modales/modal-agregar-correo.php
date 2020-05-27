<!-- Modal editar telefonos proveedor -->
<div class="modal fade" id="modalAgregarCorreosProveedor" tabindex="-1" role="dialog" aria-labelledby="modalAgregarCorreosProveedor" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-info" style="color: white;">
          <h5 class="modal-title">Agrega un nuevo correo</h5>
        </div>
        <div class="modal-body">
          <div class="box-body">

            <!-- Entrada para el nombre del Proveedor -->
              <div id="idProveedorinfo2"></div>

              <div class="container">
                <div class="row">
                  <div id="editarDescripcion" class="col-12">Nuevo correo electronico:</div>
                </div>
                <div class="row">

                  <div class="col-12">
                    <div class="form-group">
                      <div class="input-group mb-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-user"></i></span>
                        </div>
                        <input type="text"  class="form-control" placeholder="Correo electronico" id="inputAgregarCorreo" name="inputAgregarCorreo" required>
                      </div>
                    </div>
                  </div>


                </div>
              </div>


          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
        <!---->
      </form>
    </div>
  </div>
</div>
<?php
$agregarCorreo= new ControladorProveedores();
$agregarCorreo -> ctrAgregarCorreoProveedor();
?>
