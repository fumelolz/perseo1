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
    <div class="card card-outline card-primary">
      <div class="card-header">
        <!-- Boton para crear un producto -->
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">Agregar Producto</button>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <!--Se empieza a trabajar los productos-->

            <table class="table table-bordered table-striped tablaProductos">
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
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->

  <?php 

    include "modales/modal-crear-producto.php";
    include "modales/modal-editar-producto.php";

    $eliminarProducto = new ControladorProductos();
    $eliminarProducto -> ctrEliminarProducto();

  ?>