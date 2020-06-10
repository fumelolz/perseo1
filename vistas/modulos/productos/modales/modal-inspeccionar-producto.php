<!-- Modal inspeccionr cliente -->
<div class="modal fade" id="modalInspeccionarProducto" tabindex="-1" role="dialog" aria-labelledby="modalInspeccionarProducto" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

       <!--Titulo del modal-->
      <div class="modal-header text-white personal-colorfondo-colorprimario">

          <div class="col-11 text-left">

            <div class="display-4" id="m_i_p-descripcion"> NombreProducto </div>

          </div>

          <div class="col-1">

            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true" class="display-4">&times;</span>
            </button>

          </div>

      </div>
      
      <!--Cuerpo del modal-->
      <div class="modal-body">

        <div class="container">

          <div class="row d-flex justify-content-between">

            <div class="col-3 text-center">
              <i class="fas fa-globe-asia fa-3x text-purple"></i>
              <br>
              <div class="text-secondary">Precio Venta</div>
              <div class="quitar-desbordamiento font-weight-bold" id="m_i_p-precioVenta">DescripcionPrecioVenta</div>
            </div>

            <div class="col-3 text-center">
              <i class="fas fa-route fa-3x text-purple"></i>
              <br>
              <div class="text-secondary">ESTADO</div>
              <div class="quitar-desbordamiento font-weight-bold" id="m_i_c-estado">DescripcionESTADO</div>
            </div>

            <div class="col-3 text-center">
              <i class="far fa-building fa-3x text-purple"></i>
              <br>
              <div class="text-secondary">CIUDAD</div>
              <div class="quitar-desbordamiento font-weight-bold" id="m_i_c-ciudad">DescripcionCIUDAD</div>
            </div>

            <div class="col-3 text-center">
              <i class="far fa-calendar-alt fa-3x text-purple"></i>
              <br>
              <div class="text-secondary">FECHA DE NACIMIENTO</div>
              <div class="quitar-desbordamiento font-weight-bold" id="m_i_c-fechaNacimiento">DescripcionF</div>
            </div>

          </div>
            
            <br>

          <div class="row d-flex justify-content-between">

            <div class="col-3 text-center">
              <i class="fas fa-money-check fa-3x text-purple"></i>
              <br>
              <div class="text-secondary">RFC</div>
              <div class="quitar-desbordamiento font-weight-bold" id="m_i_c-rfc">DescripcionRFC</div>
            </div>

            <div class="col-3 text-center">
              <i class="far fa-address-card fa-3x text-purple"></i>
              <br>
              <div class="text-secondary">INE</div>
              <div class="quitar-desbordamiento font-weight-bold" id="m_i_c-ine">DescripcionINE</div>
            </div>

            <div class="col-3 text-center">
              <i class="fas fa-map-signs fa-3x text-purple"></i>
              <br>
              <div class="text-secondary">DIRECCION</div>
              <div class="quitar-desbordamiento font-weight-bold" id="m_i_c-direccion">DescripcionDIRECCION</div>
            </div>

          </div>

        </div>

      </div>

      <!--FooterModal-->
      <div class="modal-footer">

        <div class="container">
          <div class="row">
            <div class="col-6">
              <div id="m_i_c-botonModificar" class="float-left"></div>
              <div id="m_i_c-botonEliminar" class="float-left"></div>
            </div>
            <div class="col-6">
              <div id="m_i_c-botonContactar" class="float-right"></div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>
<?php

?>

<!-- <h5 class="modal-title" id="mcliente-nombreCliente">Nombre del cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->

 <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->