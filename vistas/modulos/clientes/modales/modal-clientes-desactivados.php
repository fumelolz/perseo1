<div class="modal fade" id="modalClientesDesactivados" tabindex="-1" role="dialog" aria-labelledby="modalClientesDesactivados" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg bg-danger">
        <h5 class="modal-title">Lista de Clientes Desactivados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <table class="table table-bordered table-striped tablas" width="100%">
          <thead class="thead-dark">
            <tr>
              <th style="width: 10px;">#</th>
              <th>Nombre</th>
              <th>Ciudad</th>
              <th>Acciónes</th>
            </tr>
          </thead>
          <tbody>

            <?php 

            $item = null;
            $valor = null;

            $mostrarClientes = ControladorClientes::ctrMostrarClientes($item,$valor);

            foreach ($mostrarClientes as $key => $value) {

              if ($value["estado_cliente"]==0) {
                $id_persona = $value["id_persona"];
                $nombre = $value["nombre"];
                $ap_Paterno = $value["ap_Paterno"];
                $ap_Materno = $value["ap_Materno"];

                if ($value["estado_cliente"]==0) {
                  $estado_cliente = '<button class="btn btn-outline-danger btnActivarCliente" idCliente="'.$id_persona.'" estado="1">Desactivado</button>';
                }else{
                  $estado_cliente = '<button class="btn btn-outline-danger btnActivarCliente" idCliente="'.$id_persona.'" estado="0">Desactivado</button>';
                }

                echo '
                <tr>
                <td>'.$id_persona.'</td>
                <td>'.$nombre.' '.$ap_Paterno.' '.$ap_Materno.'</td>
                <td>'.$value["ciudad"].'</td>
                <td>
                <center>
                <div class="btn-group-sm">

                '.$estado_cliente.'

                </div>
                </center>
                </td>
                </tr>';
              }

            }


            ?>

          </tbody>
        </table>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar Tabla</button>
      </div>

    </div>
  </div>
</div>