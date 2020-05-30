<!-- Modal ver el contacto de los clientes -->
<div class="modal fade" id="modalContactoCliente" tabindex="-1" role="dialog" aria-labelledby="modalContactoCliente" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-info" style="color: white;">
          
        <div class="container">
          <div class="row justify-content-center align-self-center">
            <i class="fas fa-mug-hot fa-5x"></i>
          </div>
          <div class="row justify-content-center align-self-center">
            <p class="display-4" id="nombreCliente">Cliente</p>
          </div>
        </div>


        </div>
        <div class="modal-body">

          <div class="box-body">

              <div class="container">
                <div class="row">

                  <div class="col-2">
                    <div class="btn btn-info" width="10px"><i class="fas fa-tty fa-2x"></i></div>
                  </div>

                  <div class="col-4">
                    <div class="text-left text-secondary" style="font-size: 15px;">Telefonos</div>
                    <button class="btn btn-primary" style="font-size: 10px;" data-toggle="modal" data-target="#modalAgregarTelefonosCliente" data-dismiss="modal">Agregar nuevo telefono</button>
                  </div>

                  <div class="col-2">
                    <div class="btn btn-info" width="10px"><i class="fas fa-envelope-open-text fa-2x"></i></div>
                  </div>

                  <div class="col-4">
                    <div class="text-left text-secondary" style="font-size: 15px;">Emails</div>
                    <button class="btn btn-primary" style="font-size: 10px;" data-toggle="modal" data-target="#" data-dismiss="modal">Agregar nuevo correo</button>
                  </div>

                </div>
                <br>
                <div class="row">
                  <!--Colunma izquierda para los telefonos-->
                  <div class="col-6">
                    <div class="row" id="MostrarTelefonosCI2"></div>
                  </div>
                  
                  <!--Colunma izquierda para los telefonos-->
                  <div class="col-6">
                    <div class="row" id="MostrarCorreosCD2"></div>
                  </div>

                </div>

              </div>

          </div>
        </div>

        <div class="modal-footer">
          <div class="container">
            <div class="row">
              <div class="col-6"><p class="text-primary"><i class="fas fa-info-circle mr-2"></i>Si das click sobre el telefono o correo se copiara al portapapeles.</p></div>
            </div>
          </div>
          <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
        </div>
        <!---->
      </form>
    </div>
  </div>
</div>