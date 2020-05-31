<!-- Modal editar correos de cliente -->
<div class="modal fade" id="modalAgregarCorreosCliente" tabindex="-1" role="dialog" aria-labelledby="modalAgregarCorreosCliente" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-info" style="color: white;">
          <h5 class="modal-title">Agrega un nuevo correo</h5>
        </div>
        <div class="modal-body">
          <div class="box-body">

            <!--  -->
              <div id="idClienteInfoCorreo"></div>

              <div class="container">
                <div class="row">
                  <div class="col-12 text-secondary">
                    <i class="fas fa-info-circle mr-2"></i>Ingrese el correo electronico del cliente.
                    <br>
                  </div>
                </div>

                <div class="row">
                  <div id="editarDescripcionCorreoCliente" class="col-12">Nuevo correo electronico:</div>
                </div>
                <div class="row">

                  <div class="col-12">
                    <div class="form-group">
                      <div class="input-group mb-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-user"></i></span>
                        </div>
                        <input type="text"  class="form-control" placeholder="Correo electronico" id="inputAgregarCorreoCliente" name="inputAgregarCorreoCliente" required>
                      </div>
                    </div>
                  </div>


                </div>
              </div>


          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
        <!---->
      </form>
    </div>
  </div>
</div>
<?php
$agregarCorreo= new ControladorClientes();
$agregarCorreo -> ctrAgregarCorreoCliente();
?>
