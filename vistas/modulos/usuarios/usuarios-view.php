<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Usuarios</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Usuarios</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <!-- Boton para crear un usuario -->
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuario</button>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped tablas" width="100%">
              <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Estado_Usuario</th>
                  <th>Email</th>
                  <th>RFC</th>
                  <th>INE</th>
                  <th>Dirección</th>
                  <th>Pais</th>
                  <th>Estado</th>
                  <th>Ciudad</th>
                  <th>Acciónes</th>
                </tr>
              </thead>
              <tbody>

                <?php 

                $item = null;
                $valor = null;

                $mostrarUsuarios = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);

                foreach ($mostrarUsuarios as $key => $value) {

                  $id_persona = $value["id_persona"];
                  $nombre = $value["nombre"];
                  $ap_Paterno = $value["ap_Paterno"];
                  $ap_Materno = $value["ap_Materno"];



                  echo '
                  <tr>
                  <td>'.$id_persona.'</td>
                  <td>'.$nombre.' '.$ap_Paterno.' '.$ap_Materno.'</td>
                  <td>'.$value["username"].'</td>
                  <td>'.$value["state"].'</td>
                  <td>'.$value["email"].'</td>
                  <td>'.$value["rfc"].'</td>
                  <td>'.$value["ine"].'</td>
                  <td>'.$value["direccion"].'</td>
                  <td>'.$value["pais"].'</td>
                  <td>'.$value["estado"].'</td>
                  <td>'.$value["ciudad"].'</td>
                  <td>
                  <center>
                  <div class="btn-group-sm">

                  <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$id_persona.'" ><i class="fas fa-pencil-alt"></i></button>

                  <button class="btn btn-danger btnEliminarCliente" idCliente="'.$id_persona.'"><i class="fas fa-times"></i></button>

                  </div>
                  </center>
                  </td>
                  </tr>';
                }


                ?>

              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Footer
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

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
                  <input type="radio" id="usuarioNivel0" name="usuarioNivel" class="custom-control-input">
                  <label class="custom-control-label" for="usuarioNivel0">Administrador</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="usuarioNivel1" name="usuarioNivel" class="custom-control-input">
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

    <!-- Modal editar Cliente -->
    <div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog" aria-labelledby="modalEditarCliente" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <form role="form" method="Post" enctype="multipart/form-data">
            <div class="modal-header bg-secondary" style="color: white;">
              <h5 class="modal-title" id="modalAgregarCliente">Editar Cliente</h5>
            </div>

            <div class="modal-body">

              <div class="box-body">

                <!-- Entrada para el nombre del cliente -->
                <div class="form-group">
                  <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-user"></i></span>
                    </div>
                    <input type="hidden" id="editarIdCliente" name="editarIdCliente">
                    <input type="text"  class="form-control" placeholder="Nombre del cliente" id="editarClienteNombre" name="editarClienteNombre" required>
                  </div>
                </div>

                <!-- Entrada para el nombre del cliente -->
                <div class="form-group">
                  <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-user"></i></span>
                    </div>
                    <input type="text"  class="form-control" placeholder="Apellido paterno del cliente" id="editarClienteApPaterno" name="editarClienteApPaterno" required>
                  </div>
                </div>

                <!-- Entrada para el nombre del cliente -->
                <div class="form-group">
                  <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-user"></i></span>
                    </div>
                    <input type="text"  class="form-control" placeholder="Apellido materno del cliente" id="editarClienteApMaterno" name="editarClienteApMaterno" required>
                  </div>
                </div>

                <!-- Entrada para el nombre del cliente -->
                <div class="form-group">
                  <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-user"></i></span>
                    </div>
                    <input type="text"  class="form-control" placeholder="Email del cliente" id="editarClienteEmail" name="editarClienteEmail" required>
                  </div>
                </div>

                <!-- Entrada para el nombre del cliente -->
                <div class="form-group">
                  <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-user"></i></span>
                    </div>
                    <input type="text"  class="form-control" placeholder="Rfc del cliente" id="editarClienteRfc" name="editarClienteRfc" required>
                  </div>
                </div>

                <!-- Entrada para el nombre del cliente -->
                <div class="form-group">
                  <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-user"></i></span>
                    </div>
                    <input type="text"  class="form-control" placeholder="INE del cliente" id="editarClienteIne" name="editarClienteIne" required>
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
                <div class="form-group">
                  <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-user"></i></span>
                    </div>
                    <input type="text"  class="form-control" placeholder="Pais del cliente" id="editarClientePais" name="editarClientePais" required>
                  </div>
                </div>

                <!-- Entrada para el nombre del cliente -->
                <div class="form-group">
                  <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-user"></i></span>
                    </div>
                    <input type="text"  class="form-control" placeholder="Estado del cliente" id="editarClienteEstado" name="editarClienteEstado" required>
                  </div>
                </div>

                <!-- Entrada para el nombre del cliente -->
                <div class="form-group">
                  <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-user"></i></span>
                    </div>
                    <input type="text"  class="form-control" placeholder="Ciudad del cliente" id="editarClienteCiudad" name="editarClienteCiudad" required>
                  </div>
                </div>

                <!-- Entrada para el nombre del cliente -->
                <div class="form-group">
                  <div class="input-group mb-1">
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

    <?php 

    $eliminarCliente = new ControladorClientes();
    $eliminarCliente -> ctrEliminarCliente();

    ?>