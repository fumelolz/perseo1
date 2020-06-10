<div class="modal fade" id="modalProductosDesactivados" tabindex="-1" role="dialog" aria-labelledby="modalProductosDesactivados" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg bg-danger">
        <h5 class="modal-title">Lista de Productos Desactivados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <table class="table table-bordered table-striped tablaProductosDesactivados quitar-desbordamiento" width="100%">
          <thead class="thead-dark">
            <tr>
              <th style="width: 10px;">#</th>
              <th>Descripción</th>
              <th>Estado</th>
              <th>Acciónes</th>
            </tr>
          </thead>
          <!-- <tbody>

            <?php 

            // $item = null;
            // $valor = null;

            // $mostrarProductos = ControladorProductos::ctrMostrarProductos($item,$valor);

            // foreach ($mostrarProductos as $key => $value) {

            //   if ($value["estado"]==0) {
            //     $id_producto = $value["id_producto"];
            //     $descripcion = $value["descripcion"];
            //     $estado = $value["estado"];

            //     if ($estado == 0) {
            //       $estado_producto = "<center><button class='btn btn-danger btnActivarProducto' estado='1' idProducto='".$id_producto."'>Desactivado</button></center>";
            //     }else{
            //       $estado_producto = "<center><button class='btn btn-success btnActivarProducto' estado='0' idProducto='".$id_producto."'>Activado</button></center>";
            //     }

            //     echo '
            //     <tr>
            //     <td>'.$id_producto.'</td>
            //     <td>'.$descripcion.'</td>
            //     <td>
            //     <center>
            //     <div class="btn-group-sm">
            //     '.$estado_producto.'
            //     </div>
            //     </center>
            //     </td>
            //     </tr>';
            //   }

            // }


            ?>

          </tbody> -->
        </table>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar Tabla</button>
      </div>

    </div>
  </div>
</div>