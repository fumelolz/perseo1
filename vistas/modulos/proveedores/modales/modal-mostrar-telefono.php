<!-- Modal ver telefonos proveedor -->
<div class="modal fade" id="modalTelefonosProveedor" tabindex="-1" role="dialog" aria-labelledby="modalTelefonosProveedor" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <form role="form" method="Post" enctype="multipart/form-data">
        <div class="modal-header bg-dark" style="color: white;">
          
        <div class="container">
          <div class="row justify-content-center align-self-center">
            <!-- <i class="fas fa-id-badge fa-5x"></i> -->
            <img src="vistas/img/modulos/ContactoModulo.png" alt="Contacto" class="personal-img-submodulo-tamaño">
          </div>
          <div class="row justify-content-center align-self-center">
            <p class="display-4" id="nombreProveedorT">Hola</p>
          </div>
        </div>


        </div>
        <div class="modal-body">

          <div class="box-body">

              <div class="container">

                  

                <!-- <div class="row">

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

                </div> -->

                <div class="row">

                  <div class="col-6 text-center">
                    <i class="fas fa-tty fa-3x text-dark"></i>
                    <div class="btn btn-warning rounded-circle" data-toggle="modal" data-target="#modalAgregarTelefonosProveedor" data-dismiss="modal"><i class="fas fa-plus"></i></div>
                  </div>

                  <div class="col-6 text-center">
                    <i class="fas fa-envelope-open-text fa-3x text-dark"></i>
                    <div class="btn btn-warning rounded-circle" data-toggle="modal" data-target="#modalAgregarCorreosProveedor" data-dismiss="modal"><i class="fas fa-plus"></i></div>
                  </div>

                </div>

                <br>
                <div class="row" id="divMostrarContacto">
                  <!--Colunma izquierda para los telefonos-->
                  <div class="col-6">
                    <div class="row" id="MostrarTelefonosCI"></div>
                  </div>
                  
                  <!--Colunma izquierda para los telefonos-->
                  <div class="col-6">
                    <div class="row" id="MostrarCorreosCD"></div>
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