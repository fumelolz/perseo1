<!-- Modal ver telefonos proveedor -->
<div class="modal fade" id="modalTelefonosProveedor" tabindex="-1" role="dialog" aria-labelledby="modalTelefonosProveedor" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-info" style="color: white;">
          <h5 class="modal-title" id="modalTelefonosProveedor">Telefonos del proveedor</h5>
        </div>
        <div class="modal-body">

        <div id="idProveedorT" class="btn btn-danger"></div>
        <div id="nombreProveedorT" class="btn btn-info"></div>
        <br><br>
          <div class="box-body">

            <!-- Entrada para el nombre del Proveedor -->
            <table class="table table-bordered table-striped tablas">
                <thead>
                  <tr>
                    <th>Descripcion</th>
                    <th>Telefono</th>
                    <th>Acciónes</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $item=null;
                  $valor=null;
                  $mostrarTelefonos= ControladorProveedores::ctrMostrarTelefonos($item,$valor);

                  foreach ($mostrarTelefonos as $key => $value) {

                      $descripcion = $value["descripcion"];
                      $telefono = $value["telefono"];
                      echo '
                      <tr>
                      <td>'.$descripcion.'</td>
                      <td>'.$telefono.'</td>
                      <td>
                      </td>
                      </tr>
                          ';
                  }
                  ?>
                  
                </tbody>
              </table>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
        <!---->
      </form>
    </div>
  </div>
</div>