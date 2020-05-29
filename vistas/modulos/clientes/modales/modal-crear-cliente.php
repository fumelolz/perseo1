<!-- Modal crear Cliente -->
<div class="modal fade" id="modalAgregarCliente" tabindex="-1" role="dialog" aria-labelledby="modalAgregarCliente" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-secondary" style="color: white;">
          <h5 class="modal-title" id="modalAgregarCliente">Agregar Cliente</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <h3 class="text-muted mb-3">Informacion Personal</h3>
            <hr>

            <!-- Entrada para el nombre del cliente -->
            <div class="form-group">
              <div class="row">
                <div class="input-group mb-1 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Nombre del cliente" id="clienteNombre" name="clienteNombre" required>
                </div>
                <div class="input-group mb-1 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Apellido paterno del cliente" id="clienteApPaterno" name="clienteApPaterno" required>
                </div>
                <div class="input-group mb-1 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Apellido materno del cliente" id="clienteApMaterno" name="clienteApMaterno" required>
                </div>
              </div>
            </div>

            <!-- Entrada para el nombre del cliente -->
            <div class="form-group">
              <div class="row">
                <div class="input-group mb-1 col-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Rfc del cliente" id="clienteRfc" name="clienteRfc" required>
                </div>
                <div class="input-group mb-1 col-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="INE del cliente" id="clienteIne" name="clienteIne" required>
                </div>
              </div>
              
            </div>

            <!-- Entrada para el nombre del cliente -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Direccion del cliente" id="clienteDireccion" name="clienteDireccion" required>
              </div>
            </div>

            <!-- Entrada para el nombre del cliente -->
            <div class="form-group">
              <div class="row">
                <div class="input-group mb-1 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Pais del cliente" id="clientePais" name="clientePais" required>
                </div>
                <div class="input-group mb-1 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Estado del cliente" id="clienteEstado" name="clienteEstado" required>
                </div>
                <div class="input-group mb-1 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Ciudad del cliente" id="clienteCiudad" name="clienteCiudad" required>
                </div>
              </div>
            </div>

            <!-- Entrada para el nombre del cliente -->
            <div class="form-group">
              <div class="row">
                <div class="input-group mb-1 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Fecha de nacimiento del cliente" id="clienteFechaNacimiento" name="clienteFechaNacimiento" required>
                </div>
              </div>
            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?php 

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();

        ?>
      </form>
    </div>
  </div>
</div>