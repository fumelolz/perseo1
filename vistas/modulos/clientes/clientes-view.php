<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 text-center text-sm-left">
          <div class="display-1">Clientes</div>
          <p class="text-secondary">En este modulo podra ver los detalles del cliente, como sus datos
            , compras, contacto, etc.</p>
            <button class="btn btn-primary personal-borde-redondeo" data-toggle="modal" data-target="#modalAgregarCliente"><i class="fas fa-plus mr-2"></i>Agregar Cliente</button>
            <br><br>
        </div>
        <div class="col-sm-6 text-center">
          <img src="vistas/dist/img/modulos/ClientesModulo.png" class="personal-img-modulo-tamaño" alt="Clientes">
          <!--<ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Clientes</li>
          </ol>-->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card">
      
     <!-- <div class="card-header">
         Boton para crear un cliente
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">Agregar Cliente</button>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
            </div>
          </div>-->


          <div class="card-body">
            <table class="table table-bordered table-striped tablas" width="100%">
              <thead class="thead-dark">
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Nombre</th>
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
                  <td>'.$value["ciudad"].'</td>
                  <td>
                  <center>
                  <div class="btn-group-sm">

                  <button class="btn btn-outline-info btnInspeccionarCliente" data-toggle="modal" data-target="#modalInspeccionarCliente" idCliente="'.$id_persona.'">Inspeccionar</button>

                  <!--<button class="btn btn-info btnContactoCliente" data-toggle="modal" data-target="#modalContactoCliente" idCliente="'.$id_persona.'" ><i class="far fa-address-book text-white"></i></button>

                  <button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$id_persona.'" ><i class="fas fa-pencil-alt"></i></button>

                  <button class="btn btn-danger btnEliminarCliente" idCliente="'.$id_persona.'"><i class="fas fa-times"></i></button>-->

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
    include "modales/modal-mostrar-contacto.php";
    include "modales/modal-editar-telefono-cliente.php";
    include "modales/modal-agregar-telefono-cliente.php";
    include "modales/modal-editar-correo-cliente.php";
    include "modales/modal-agregar-correo-cliente.php";
    include "modales/modal-inspeccionar-cliente.php";
    ?>