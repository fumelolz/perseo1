<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Proveedores</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lista de proveedores</li>
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
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProveedor">Agregar Proveedor</button>

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
                <thead>
                  <tr>
                    <th style="width: 10px;">#</th>
                    <th>Nombre</th>
                    <th>Fecha de Alianza</th>
                    <th>Ultima fecha de compra</th>
                    <th>Acciónes</th>
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
                      <td>botones</td>
                      </tr>';
                    }
                  }


                  ?>
                  
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button class="btn btn-danger">Ver lista de proveedores eliminados</button>
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->

        </section>
        <!-- /.content -->
      </div>
  <!-- /.content-wrapper -->

  <!-- Modal crear Cliente -->
<div class="modal fade" id="modalAgregarProveedor" tabindex="-1" role="dialog" aria-labelledby="modalAgregarProveedor" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-secondary" style="color: white;">
          <h5 class="modal-title" id="modalAgregarProveedor">Agregar Proveedor</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el nombre del Proveedor -->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Nombre del proveedor" id="proveedorNombre" name="proveedorNombre" required>
              </div>
            </div>

            <!-- Entrada para la fecha de alianza-->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Fecha de la alianza" id="proveedorFechaAlianza" name="proveedorFechaAlianza" required>
              </div>
            </div>

            <!-- Entrada para el estado-->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Estado del proveedor" id="proveedorEstado" name="proveedorEstado" required>
              </div>
            </div>

            <!-- Entrada para la ultima fecha de compra-->
            <div class="form-group">
              <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-user"></i></span>
                </div>
                <input type="text"  class="form-control" placeholder="Ultima fecha de compra" id="proveedorUFC" name="proveedorUFC" required>
              </div>
            </div>

            

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?php 

        $crearProveedor = new ControladorProveedores();
        $crearProveedor -> ctrCrearProveedor();

        ?>
      </form>
    </div>
  </div>
</div>