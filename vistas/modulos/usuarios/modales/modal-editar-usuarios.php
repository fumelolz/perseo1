<!-- Modal editar Cliente -->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalEditarUsuario" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">

  <form role="form" method="Post" enctype="multipart/form-data">
    <div class="modal-header bg-light" style="color: black;">
      <h5 class="modal-title" id="modalEditarUsuario">Editar Usuario</h5>
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
              <input type="hidden" id="editarIdUsuario" name="editarIdUsuario">
              <input type="text"  class="form-control" placeholder="Nombre del usuario" id="editarUsuarioNombre" name="editarUsuarioNombre" required>
            </div>

            <div class="input-group mb-1 col-4">
              <input type="text"  class="form-control" placeholder="Apellido paterno del usuario" id="editarUsuarioApPaterno" name="editarUsuarioApPaterno" required>
            </div>

            <div class="input-group mb-1 col-4">
              <input type="text"  class="form-control" placeholder="Apellido materno del usuario" id="editarUsuarioApMaterno" name="editarUsuarioApMaterno" required>
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
              <input type="text"  class="form-control" placeholder="Email del usuario" id="editarUsuarioEmail" name="editarUsuarioEmail" required>
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
              <input type="text"  class="form-control" placeholder="Rfc del usuario" id="editarUsuarioRfc" name="editarUsuarioRfc" required>
            </div>
            <div class="input-group mb-1 col-6">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
              </div>
              <input type="text"  class="form-control" placeholder="INE del usuario" id="editarUsuarioIne" name="editarUsuarioIne" required>
            </div>
          </div>
        </div>


        <!-- Entrada para el nombre del usuario -->
        <div class="form-group">
          <div class="input-group mb-1">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text"  class="form-control" placeholder="Direccion del usuario" id="editarUsuarioDireccion" name="editarUsuarioDireccion" required>
          </div>
        </div>

        <!-- Entrada para el nombre del usuario -->
        <div class="form-group">
          <div class="row">
            <div class="input-group mb-1 col-4">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
              </div>
              <input type="text"  class="form-control" placeholder="Pais del usuario" id="editarUsuarioPais" name="editarUsuarioPais" required>
            </div>

            <div class="input-group mb-1 col-4">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
              </div>
              <input type="text"  class="form-control" placeholder="Estado del usuario" id="editarUsuarioEstado" name="editarUsuarioEstado" required>
            </div>

            <div class="input-group mb-1 col-4">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
              </div>
              <input type="text"  class="form-control" placeholder="Ciudad del usuario" id="editarUsuarioCiudad" name="editarUsuarioCiudad" required>
            </div>

          </div>
        </div>

        <!-- Entrada para el nombre del usuario -->
        <div class="form-group row">
          <div class="input-group mb-1 col-6">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="far fa-user"></i></span>
            </div>
            <input type="text"  class="form-control" placeholder="Fecha de nacimiento del usuario" id="editarUsuarioFechaNacimiento" name="editarUsuarioFechaNacimiento" required>
          </div>
        </div>

        <hr>

        <h3 class="text-muted mb-3 mt-3">Informacion de usuario</h3>
        <hr>

        <!-- Entrada para el nombre del usuario -->
        <div class="form-group">
          <div class="row">
            <div class="input-group mb-1 col-6">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
              </div>
              <input type="text"  class="form-control" placeholder="Username" id="editarUsuarioUsername" name="editarUsuarioUsername" readonly>
            </div>
            <div class="input-group mb-1 col-6">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-user"></i></span>
              </div>
              <input type="hidden" id="passActual" name="passActual">
              <input type="text"  class="form-control" placeholder="Password" id="editarUsuarioPassword" name="editarUsuarioPassword">
            </div>
          </div>
        </div>

        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="editarUsuarioNivel0" name="editarUsuarioNivel" class="custom-control-input" value="0">
          <label class="custom-control-label" for="editarUsuarioNivel0">Administrador</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="editarUsuarioNivel1" name="editarUsuarioNivel" class="custom-control-input" value="1">
          <label class="custom-control-label" for="editarUsuarioNivel1">Vendedor</label>
        </div>

        <hr>

      </div>

    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
    <?php 

    $editarUsuario = new ControladorUsuarios();
    $editarUsuario -> ctrEditarUsuario();

    ?>
  </form>
</div>
</div>
</div>