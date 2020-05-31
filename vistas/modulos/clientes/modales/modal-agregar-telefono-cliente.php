<!-- Modal agregar telefonos clientes -->
<div class="modal fade" id="modalAgregarTelefonosCliente" tabindex="-1" role="dialog" aria-labelledby="modalAgregarTelefonosCliente" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-info" style="color: white;">
          <h5 class="modal-title">Agrega un nuevo telefono</h5>
        </div>
        <div class="modal-body">
          <div class="box-body">

            <!-- Entrada para el id del cliente -->
              <div id="idClienteinfo"></div>

              <div class="container">

                <div class="row">
                  <div class="col-12 text-secondary">
                    <i class="fas fa-info-circle mr-2"></i>Ingrese la descripcion y el correo electronico del cliente.
                    <br>
                  </div>
                </div>

                <div class="row">
                  <div id="editarDescripcionCliente" class="col-6">Descripcion del telefono:</div>
                  <div id="editaTelefonosCliente"class="col-6">No. Telefono</div>
                </div>
                <div class="row">

                  <div class="col-6">
                    <div class="form-group">
                      <div class="input-group mb-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-user"></i></span>
                        </div>
                        <input type="text"  class="form-control" placeholder="Descripcion del telefono" id="inputAgregarDescripcionCliente" name="inputAgregarDescripcionCliente" required>
                      </div>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-group">
                      <div class="input-group mb-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-user"></i></span>
                        </div>
                        <input type="text"  class="form-control" placeholder="Numero de telefono" id="inputAgregarTelefonoCliente" name="inputAgregarTelefonoCliente" required>
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
$agregarTelefono= new ControladorClientes();
$agregarTelefono -> ctrAgregarTelefonoCliente();
?>
