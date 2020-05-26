<!-- Modal editar producto -->
<div class="modal fade" id="modalEditarProducto" tabindex="-1" role="dialog" aria-labelledby="modalEditarProducto" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-light" style="color: black;">
          <h5 class="modal-title" id="modalEditarProducto">Editar Producto</h5>
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
                  <input type="hidden" id="editarIdProducto" name="editarIdProducto">
                  <input type="text"  class="form-control" placeholder="Descripción del producto" id="editarProductoDescripcion" name="editarProductoDescripcion" required>
                </div>

              </div>
            </div>

            <!-- Entrada para el nombre del cliente -->
            <div class="form-group">
              <div class="row">

                <div class="input-group mb-1 col-8">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <select class="form-control" name="editarProductoCategoria" required>
                    <option id="editarProductoCategoria">Categoria del producto</option>
                    <?php 

                    $item = null;
                    $valor = null;

                    $categorias = ControladorProductos::ctrMostrarCategorias($item,$valor);

                    foreach ($categorias as $key => $value) {
                      echo '<option value="'.$value["id_categoria"].'">'.$value["descripcion"].'</option>';
                    }

                     ?>
                    
                  </select>
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
                  <input type="text"  class="form-control editarPrecioCompra" placeholder="Precio de compra" id="editarProductoCompra" name="editarProductoCompra" required>
                </div>
                <div class="input-group mb-1 col-6">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text"  class="form-control editarPrecioVenta" placeholder="Precio de venta" id="editarProductoVenta" name="editarProductoVenta" required>
                </div>
              </div>

              <div class="row mt-2 d-flex justify-content-end">
                <div class="col-5 pt-2">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" id="editarPorcentaje" checked>
                    <label for="editarPorcentaje" class="custom-control-label">Utilizar porcentaje</label>
                  </div>
                </div>

                <div class="col-4">
                  <div class="input-group">
                    <input type="number" class="form-control editarPorcentaje" min="0" max="100" value="40" name="editarUtilidad" id="editarUtilidad" required>
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fa fa-percent"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="productoFoto">Foto del producto</label>
              <input type="hidden" id="actualFoto" name="actualFoto">
              <input type="file" class="form-control-file" id="editarProductoFoto" name="editarProductoFoto">
              <p class="help-block">Peso maximo de la foto 5Mb</p>
              <img class="imagenPreviaEditar" src="vistas/img/producto-default.png" class="img-thumbnail" width="100px">
            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?php 

        $crearProducto = new ControladorProductos();
        $crearProducto -> ctrCrearProducto();

        ?>
      </form>
    </div>
  </div>
</div>

