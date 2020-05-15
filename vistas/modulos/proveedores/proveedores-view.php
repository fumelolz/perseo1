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
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <!--Se empieza a trabajar los productos-->
              
              <table class="table table-bordered table-striped tablas">
                <thead>
                  <tr>
                    <th style="width: 10px;">#</th>
                    <th>Nombre</th>
                    <th>Fecha de Alianza</th>
                    <th>Ultima fecha de compra</th>
                    <th>Estado</th>
                    <th>Acciónes</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 

                  $item = null;
                  $valor = null;

                  $mostrarProveedores= ControladorProveedores::ctrMostrarProveedores($item,$valor);

                  foreach ($mostrarProveedores as $key => $value) {

                    $id_proveedor = $value["id_proveedor"];
                    $nombre = $value["nombre"];
                    $fechaAlianza = $value["fecha_alianza"];
                    $estado = $value["estado"];
                    $ultimaFechaCompra = $value["ultima_fecha_compra"];

                    echo '
                    <tr>
                    <td>'.$id_proveedor.'</td>
                    <td>'.$nombre.'</td>
                    <td>'.$fechaAlianza.'</td>
                    <td>'.$ultimaFechaCompra.'</td>
                    <td>'.$estado.'</td>
                    <td>botones</td>
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