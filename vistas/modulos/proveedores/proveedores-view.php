<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        
        <div class="row mb-2">
        <div class="col-sm-6 text-center text-sm-left">
          <div class="display-1">Proveedores</div>
          <p class="text-secondary">En este modulo veras los proveedores, la fecha de alianza, la ultima compra, y su informacion de contacto. </p>
            <button class="btn btn-primary personal-borde-redondeo"  data-toggle="modal" data-target="#modalAgregarProveedor"><i class="fas fa-plus mr-2"></i>Agregar Proveedor</button>
            <br><br>
        </div>
        <div class="col-sm-6 text-center">
          <img src="vistas/dist/img/modulos/ProveedoresModulo.png" class="personal-img-modulo-tamaño" alt="Clientes">
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
        <div class="card-header">
          
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <!--Se empieza a trabajar los proveedores-->
              
              <table class="table table-bordered table-striped tablas">
                <thead class="thead-dark">
                  <tr>
                    <th style="width: 10px;">#</th>
                    <th>Nombre</th>
                    <th>Fecha de Alianza</th>
                    <th>Ultima fecha de compra</th>
                    <th>Contacto</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 

                  $item = null;
                  $valor = null;

                  $mostrarProveedores= ControladorProveedores::ctrMostrarProveedores($item,$valor);

                  foreach ($mostrarProveedores as $key => $value) {

                    if($value["estado"]!=0){

                      $id_proveedor = $value["id_proveedor"];
                      $nombre = $value["nombre"];
                      $fechaAlianza = $value["fecha_alianza"];
                      $ultimaFechaCompra = $value["ultima_fecha_compra"];

                      echo '
                      <tr>
                      <td>'.$id_proveedor.'</td>
                      <td>'.$nombre.'</td>
                      <td>'.$fechaAlianza.'</td>
                      <td>'.$ultimaFechaCompra.'</td>
                      <td>
                          <center>
                          <div class="btn-group-sm">
                          
                          <div class="btn btn-info btnTelefonoProveedor" data-toggle="modal" data-target="#modalTelefonosProveedor" idProveedor="'.$id_proveedor.'" style="cursor: pointer"><i class="fas fa-address-book"></i><span></span></div>

                          <button class="btn btn-warning btnEditarProveedor" data-toggle="modal" data-target="#modalEditarProveedor" idProveedor="'.$id_proveedor.'" ><i class="fas fa-pencil-alt"></i></button>

                          <button class="btn btn-danger btnEliminarProveedor" idProveedor="'.$id_proveedor.'"><i class="fas fa-times"></i></button>

                          </div>
                          </center>
                      </td>
                      </tr>';
                    }
                  }


                  ?>
                  
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="proveedores-eliminados" class="btn btn-danger">Ver lista de proveedores eliminados</a>
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->

        </section>
        <!-- /.content -->
      </div>
  <!-- /.content-wrapper -->

<?php
include "modales/modal-mostrar-telefono.php";
include "modales/modal-editar-telefono.php";
include "modales/modal-agregar-telefono.php";
include "modales/modal-crear-proveedor.php";
include "modales/modal-editar-proveedor.php";
include "modales/modal-agregar-correo.php";
include "modales/modal-editar-correo.php";
?>
<?php 

  $eliminarProveedor= new ControladorProveedores();
  $eliminarProveedor-> ctrEliminarProveedor();

?>