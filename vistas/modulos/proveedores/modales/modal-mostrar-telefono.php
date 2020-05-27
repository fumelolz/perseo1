<!-- Modal ver telefonos proveedor -->
<div class="modal fade" id="modalTelefonosProveedor" tabindex="-1" role="dialog" aria-labelledby="modalTelefonosProveedor" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-info" style="color: white;">
          
        <div class="container">
          <div class="row justify-content-center align-self-center">
            <i class="fas fa-id-badge fa-5x"></i>
          </div>
          <div class="row justify-content-center align-self-center">
            <p class="display-4" id="nombreProveedorT">Hola</p>
          </div>
        </div>


        </div>
        <div class="modal-body">

          <div class="box-body">

            <!-- Entrada para el nombre del Proveedor -->
            <!-- <table class="table table-bordered table-striped" width=100%>
                <thead>
                  <tr>
                    <th>Descripcion</th>
                    <th>Telefono</th>
                    <th>Acciónes</th>
                  </tr>
                </thead>
                <tbody class="addTelefonos">
                  
                </tbody>
            </table>
 -->

              <div class="container">
                <div class="row">

                  <div class="col-2">
                    <div class="btn btn-info" width="10px"><i class="fas fa-tty fa-2x"></i></div>
                  </div>

                  <div class="col-4">
                    <div class="text-left text-secondary" style="font-size: 15px;">Telefonos</div>
                    <button class="btn btn-primary" style="font-size: 10px;" data-toggle="modal" data-target="#modalAgregarTelefonosProveedor" data-dismiss="modal">Agregar nuevo telefono</button>
                  </div>

                  <div class="col-2">
                    <div class="btn btn-info" width="10px"><i class="fas fa-envelope-open-text fa-2x"></i></div>
                  </div>

                  <div class="col-4">
                    <div class="text-left text-secondary" style="font-size: 15px;">Emails</div>
                    <button class="btn btn-primary" style="font-size: 10px;" data-toggle="modal" data-target="#modalAgregarCorreosProveedor" data-dismiss="modal">Agregar nuevo correo</button>
                  </div>

                </div>
                <br>
                <div class="row" id="divMostrarContacto">

                </div>

              </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
        </div>
        <!---->
      </form>
    </div>
  </div>
</div>