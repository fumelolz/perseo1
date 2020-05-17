<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Productos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Lista de productos</li>
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
                  <th>Descripcion</th>
                  <th>Precio de compra</th>
                  <th>Precio de venta</th>
                  <th>Stock</th>
                  <th>Imagen</th>
                  <th>estado</th>
                  <th>Acciónes</th>
                </tr>
              </thead>
              <tbody>

                <?php 

                $item = null;
                $valor = null;

                $mostrarProductos= ControladorProductos::ctrMostrarProductos($item,$valor);

                foreach ($mostrarProductos as $key => $value) {

                  $id_producto = $value["id_producto"];
                  $descripcion = $value["descripcion"];
                  $precio_compra = $value["precio_compra"];
                  $precio_venta = $value["precio_venta"];
                  $imagen = $value["ruta_imagen"];
                  $estado = $value["estado"];
                  $stockRespuesta = ControladorProductos::ctrMostrarStockProducto($id_producto);

                  if ($stockRespuesta>=20) {
                    $stock = "<button class='btn btn-success'>".$stockRespuesta."</button>";
                  }else if($stockRespuesta<20 && $stockRespuesta>=10){
                    $stock = "<button class='btn btn-warning'>".$stockRespuesta."</button>";
                  }else if($stockRespuesta<10){
                    $stock = "<button class='btn btn-danger'>".$stockRespuesta."</button>";
                  }

                  echo '
                  <tr>
                  <td>'.$id_producto.'</td>
                  <td>'.$descripcion.'</td>
                  <td>'.$precio_compra.'</td>
                  <td>'.$precio_venta.'</td>
                  <td>'.$stock.'</td>
                  <td>'.$imagen.'</td>
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