<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Proveedores Eliminados</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Lista de proveedores eliminados</li>
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
        Se muestra la lista de los proveedores eliminados
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
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>

                <?php 

                $item = null;
                $valor = null;

                $mostrarProveedores= ControladorProveedores::ctrMostrarProveedores($item,$valor);

                foreach ($mostrarProveedores as $key => $value) {

                  if($value["estado"]!=1){

                    $id_proveedor = $value["id_proveedor"];
                    $nombre = $value["nombre"];
                    $fechaAlianza = $value["fecha_alianza"];
                    $ultimaFechaCompra = $value["ultima_fecha_compra"];
                    $estado = $value["estado"];

                    $btnEstado = '<center><button class="btn btn-danger btn-sm btnActivarProveedor" estado="1" idProveedor="'.$value["id_proveedor"].'">Desactivado</button></center>';

                    echo '
                    <tr>
                    <td>'.$id_proveedor.'</td>
                    <td>'.$nombre.'</td>
                    <td>'.$fechaAlianza.'</td>
                    <td>'.$ultimaFechaCompra.'</td>
                    <td>'.$btnEstado.'</td>
                    </tr>';
                  }
                }


                ?>

              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <a href="proveedores" class="btn btn-success">Regresar a los proveedores activos</a>
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->