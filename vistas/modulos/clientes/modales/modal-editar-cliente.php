<!-- Modal editar Cliente -->
<div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog" aria-labelledby="modalEditarCliente" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-dark" style="color: white;">
          <h5 class="modal-title" id="modalAgregarCliente">Editar Cliente</h5>
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
                  <input type="hidden" id="editarIdCliente" name="editarIdCliente">
                  <input type="text"  class="form-control" placeholder="Nombre del cliente" id="editarClienteNombre" name="editarClienteNombre" required>
                </div>
                <div class="input-group mb-1 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Apellido paterno del cliente" id="editarClienteApPaterno" name="editarClienteApPaterno" required>
                </div>
                <div class="input-group mb-1 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Apellido materno del cliente" id="editarClienteApMaterno" name="editarClienteApMaterno" required>
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
                  <input type="text"  class="form-control" placeholder="Rfc del cliente" id="editarClienteRfc" name="editarClienteRfc" required>
                </div>
                <div class="input-group mb-1 col-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="INE del cliente" id="editarClienteIne" name="editarClienteIne" required>
                </div>
              </div>
            </div>

            <!-- Entrada para el nombre del cliente -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Direccion del cliente" id="editarClienteDireccion" name="editarClienteDireccion" required>
              </div>
            </div>

            <!-- Entrada para el nombre del cliente -->
            <div class="form-group row">
              <div class="input-group mb-1 col-4">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Pais del cliente" id="editarClientePais" name="editarClientePais" required>
              </div>
              <div class="input-group mb-1 col-4">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Estado del cliente" id="editarClienteEstado" name="editarClienteEstado" required>
              </div>
              <div class="input-group mb-1 col-4">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Ciudad del cliente" id="editarClienteCiudad" name="editarClienteCiudad" required>
              </div>
            </div>

            <!-- Entrada para el nombre del cliente -->
            <div class="form-group row">
              <div class="input-group mb-1 col-4">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Fecha de nacimiento del cliente" id="editarClienteFechaNacimiento" name="editarClienteFechaNacimiento" required>
              </div>
            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
        <?php 

        $editarCliente = new ControladorClientes();
        $editarCliente -> ctrEditarCliente();

        ?>
      </form>
    </div>
  </div>
</div>