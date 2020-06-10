<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 text-center text-sm-left">
          <div class="display-3">Productos</div>
          <p class="text-secondary">En este modulo podra ver los detalles del producto, como sus datos
          ,detalles, etc.</p>
          <button class="btn btn-primary personal-borde-redondeo" data-toggle="modal" data-target="#modalAgregarProducto"><i class="fas fa-plus mr-2"></i>Agregar Producto</button>
          <br><br>
        </div>
        <div class="col-sm-6 text-center">
          <img src="vistas/img/random/075-package-2.png" class="personal-img-modulo-tamaño" alt="Clientes">
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
    <div class="card card-outline card-primary">
      <div class="card-body">
        <!--Se empieza a trabajar los productos-->

        <table class="table table-bordered table-striped tablaProductos">
          <thead class="thead-dark">
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
      <!-- /.card-body -->
      <div class="card-footer">
        <button class="btn btn-outline-danger" data-toggle="modal" data-target="#modalProductosDesactivados">Mostrar productos desactivados</button>
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php 

include "modales/modal-crear-producto.php";
include "modales/modal-editar-producto.php";
include "modales/modal-productos-desactivados.php";
include "modales/modal-inspeccionar-producto.php";

$eliminarProducto = new ControladorProductos();
$eliminarProducto -> ctrEliminarProducto();

?>