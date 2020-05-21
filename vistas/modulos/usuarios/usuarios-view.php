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

                  $id_usuario = $value["id_usuario"];
                  $id_persona = $value["id_persona"];
                  $nombre = $value["nombre"];
                  $ap_Paterno = $value["ap_Paterno"];
                  $ap_Materno = $value["ap_Materno"];

                  if ($value["state"] == 1) {
                    $btn = '<center><button class="btn btn-danger" estado="1" idUsuario="'.$id_usuario.'">Desactivado</button></center>';
                  }else{
                    $btn = '<center><button class="btn btn-success" estado="0" idUsuario="'.$id_usuario.'">Activado</button></center>';
                  }

                  echo '
                  <tr>
                  <td>'.$id_usuario.'</td>
                  <td>'.$nombre.' '.$ap_Paterno.' '.$ap_Materno.'</td>
                  <td>'.$value["username"].'</td>
                  <td>'.$btn.'</td>
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

                  <button class="btn btn-warning btnEditarUsuario" data-toggle="modal" data-target="#modalEditarUsuario" idUsuario="'.$id_persona.'" ><i class="fas fa-pencil-alt"></i></button>

                  <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$id_persona.'"><i class="fas fa-times"></i></button>

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

    <?php 

    include "modales/modal-crear-usuarios.php";
    include "modales/modal-editar-usuarios.php";

    $eliminarCliente = new ControladorClientes();
    $eliminarCliente -> ctrEliminarCliente();

    ?>