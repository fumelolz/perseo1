<!-- Modal crear Cliente -->
<div class="modal fade" id="modalAgregarProducto" tabindex="-1" role="dialog" aria-labelledby="modalAgregarProducto" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-light" style="color: black;">
          <h5 class="modal-title" id="modalAgregarProducto">Agregar Producto</h5>
        </div>

        <div class="modal-body">

          <div class="box-body">

            <h3 class="text-muted mb-3">Informacion del producto</h3>
            <hr>

            <!-- Entrada para el nombre del cliente -->
            <div class="form-group">
              <div class="row">

                <div class="input-group mb-1 col-8">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Descripción del producto" id="productoDescripcion" name="productoDescripcion" required>
                </div>

              </div>
            </div>

            <!-- Entrada para el nombre del usuario -->
            <div class="form-group">
              <div class="row">
                <div class="input-group mb-1 col-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Precio de compra" id="productoCompra" name="productoCompra" required>
                </div>
                <div class="input-group mb-1 col-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control" placeholder="Precio de venta" id="productoVenta" name="productoVenta" required>
                </div>
              </div>

              <div class="row mt-2 d-flex justify-content-end">
                <div class="col-3 pt-2">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="percentageCheckBox" checked>
                    <label for="percentageCheckBox" class="custom-control-label">Utilizar porcentaje</label>
                  </div>
                </div>

                <div class="col-2 ">
                  <div class="input-group">
                    <input type="number" class="form-control nuevoPorcentaje" min="0" max="100" value="40" required>
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fa fa-percent"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleFormControlFile1">Foto del producto</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1">
              <p class="help-block">Peso maximo de la foto 5Mb</p>
              <img class="prevImage" src="vistas/img/producto-default.png" class="img-thumbnail" width="100px">
            </div>

            <hr>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?php 

        $crearUsuario = new ControladorUsuarios();
        $crearUsuario -> ctrCrearUsuario();

        ?>
      </form>
    </div>
  </div>
</div>

