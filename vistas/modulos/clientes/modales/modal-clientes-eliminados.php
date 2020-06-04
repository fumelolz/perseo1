<div class="modal fade" id="modalClientesEliminados" tabindex="-1" role="dialog" aria-labelledby="modalClientesEliminados" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg bg-danger">
        <h5 class="modal-title">Lista de Clientes eliminados</h5>
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

                  $id_persona = $value["id_persona"];
                  $nombre = $value["nombre"];
                  $ap_Paterno = $value["ap_Paterno"];
                  $ap_Materno = $value["ap_Materno"];



                  echo '
                  <tr>
                  <td>'.$id_persona.'</td>
                  <td>'.$nombre.' '.$ap_Paterno.' '.$ap_Materno.'</td>
                  <td>'.$value["ciudad"].'</td>
                  <td>
                  <center>
                  <div class="btn-group-sm">

                  <button class="btn btn-outline-success" idCliente="'.$id_persona.'">Desactivado</button>

                  </div>
                  </center>
                  </td>
                  </tr>';
                }


                ?>

              </tbody>
            </table>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>

    </div>
  </div>
</div>