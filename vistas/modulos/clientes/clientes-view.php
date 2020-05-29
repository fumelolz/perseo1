<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Clientes</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Clientes</li>
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
        <!-- Boton para crear un cliente -->
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">Agregar Cliente</button>
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

                $mostrarClientes = ControladorClientes::ctrMostrarClientes($item,$valor);

                foreach ($mostrarClientes as $key => $value) {

                  $id_persona = $value["id_persona"];
                  $nombre = $value["nombre"];
                  $ap_Paterno = $value["ap_Paterno"];
                  $ap_Materno = $value["ap_Materno"];



                  echo '
                  <tr>
                  <td>'.$id_persona.'</td>
                  <td>'.$nombre.' '.$ap_Paterno.' '.$ap_Materno.'</td>
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


    <?php 

    include "modales/modal-crear-cliente.php";
    include "modales/modal-editar-cliente.php";

    $eliminarCliente = new ControladorClientes();
    $eliminarCliente -> ctrEliminarCliente();

    ?>