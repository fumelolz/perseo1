<!-- Modal crear Cliente -->
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalAgregarUsuario" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-light" style="color: black;">
          <h5 class="modal-title" id="modalAgregarUsuario">Agregar Usuario</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el nombre del cliente -->
            <div class="form-group">
              <div class="row">

                <div class="input-group mb-1 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Nombre del usuario" id="usuarioNombre" name="usuarioNombre" required>
                </div>

                <div class="input-group mb-1 col-4">
                  <input type="text"  class="form-control" placeholder="Apellido paterno del usuario" id="usuarioApPaterno" name="usuarioApPaterno" required>
                </div>

                <div class="input-group mb-1 col-4">
                  <input type="text"  class="form-control" placeholder="Apellido materno del usuario" id="usuarioApMaterno" name="usuarioApMaterno" required>
                </div>

              </div>
            </div>

            <!-- Entrada para el nombre del usuario -->
            <div class="form-group">
              <div class="row">
                <div class="input-group mb-1 col-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Email del usuario" id="usuarioEmail" name="usuarioEmail" required>
                </div>
              </div>
            </div>

            <!-- Entrada para el nombre del usuario -->
            <div class="form-group">
              <div class="row">
                <div class="input-group mb-1 col-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Rfc del usuario" id="usuarioRfc" name="usuarioRfc" required>
                </div>
                <div class="input-group mb-1 col-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="INE del usuario" id="usuarioIne" name="usuarioIne" required>
                </div>
              </div>
            </div>


            <!-- Entrada para el nombre del usuario -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Direccion del usuario" id="usuarioDireccion" name="usuarioDireccion" required>
              </div>
            </div>

            <!-- Entrada para el nombre del usuario -->
            <div class="form-group">
              <div class="row">
                <div class="input-group mb-1 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Pais del usuario" id="usuarioPais" name="usuarioPais" required>
                </div>

                <div class="input-group mb-1 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Estado del usuario" id="usuarioEstado" name="usuarioEstado" required>
                </div>

                <div class="input-group mb-1 col-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Ciudad del usuario" id="usuarioCiudad" name="usuarioCiudad" required>
                </div>

              </div>
            </div>

            <!-- Entrada para el nombre del usuario -->
            <div class="form-group row">
              <div class="input-group mb-1 col-6">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Fecha de nacimiento del usuario" id="usuarioFechaNacimiento" name="usuarioFechaNacimiento" required>
              </div>
            </div>

            <hr>

            <!-- Entrada para el nombre del usuario -->
            <div class="form-group">
              <div class="row">
                <div class="input-group mb-1 col-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Username" id="usuarioUsername" name="usuarioUsername" required>
                </div>
                <div class="input-group mb-1 col-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Password" id="usuarioPassword" name="usuarioPassword" required>
                </div>
              </div>
            </div>

            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="usuarioNivel0" name="usuarioNivel" class="custom-control-input" value="0">
              <label class="custom-control-label" for="usuarioNivel0">Administrador</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="usuarioNivel1" name="usuarioNivel" class="custom-control-input" value="1">
              <label class="custom-control-label" for="usuarioNivel1">Vendedor</label>
            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?php 

        $crearUsuario = new ControladorUsuarios();
        $crearUsuario -> ctrCrearUsuario();

        ?>
      </form>
    </div>
  </div>
</div>