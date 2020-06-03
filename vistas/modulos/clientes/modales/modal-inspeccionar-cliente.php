<!-- Modal inspeccionr cliente -->
<div class="modal fade" id="modalInspeccionarCliente" tabindex="-1" role="dialog" aria-labelledby="modalInspeccionarCliente" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

       <!--Titulo del modal-->
      <div class="modal-header text-white personal-colorfondo-colorprimario">

          <div class="col-3">

            <img src="vistas/dist/img/modulos/ClientesInspeccionar.png" alt="Clientes" class="personal-img-modulo-tamaño-inspeccionar">

          </div>

          <div class="col-8 text-center">

            <div class="display-4" id="m_i_c-nombre"> NombreCliente </div>

            <h5 id="m_i_c-apellidos">Apellidos Cliente</h5>

          </div>

          <div class="col-1">
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </div>

      </div>
      
      <!--Cuerpo del modal-->
      <div class="modal-body">

        <div class="row">

          <div class="col-5">
            <div class="row">

              <div class="col-12 bg bg-secondary rounded subtitulo-cliente">RFC</div>
              <div class="col-12 text-info" id="m_i_c-rfc" style="word-wrap: break-word;font-size: 25px;">DescripcionRFC</div>

              <div class="col-12 bg bg-secondary rounded subtitulo-cliente">DIRECCION</div>
              <div class="col-12 text-info" id="m_i_c-direccion" style="word-wrap: break-word;font-size: 25px;">DescripcionDIRECCION</div>

              <div class="col-12 bg bg-secondary rounded subtitulo-cliente">ESTADO</div>
              <div class="col-12 text-info" id="m_i_c-estado" style="word-wrap: break-word;font-size: 25px;">DescripcionESTADO</div>

              <div class="col-12 bg bg-secondary rounded subtitulo-cliente">FECHA DE NACIMIENTO</div>
              <div class="col-12 text-info" id="m_i_c-fechaNacimiento" style="word-wrap: break-word;font-size: 25px;">DescripcionFECHADENACIMIENTO</div>

            </div>
          </div>
        
          <div class="col-2"></div>

          <div class="col-5">
            <div class="row">

              <div class="col-12 bg bg-secondary rounded subtitulo-cliente">INE</div>
              <div class="col-12 text-info" id="m_i_c-ine" style="word-wrap: break-word;font-size: 25px;">DescripcionINE</div>

              <div class="col-12 bg bg-secondary rounded subtitulo-cliente">PAIS</div>
              <div class="col-12 text-info" id="m_i_c-pais" style="word-wrap: break-word;font-size: 25px;">DescripcionPAIS</div>

              <div class="col-12 bg bg-secondary rounded subtitulo-cliente">CIUDAD</div>
              <div class="col-12 text-info" id="m_i_c-ciudad" style="word-wrap: break-word;font-size: 25px;">DescripcionCIUDAD</div>

            </div>
          </div>

          <div class="col-6">
            <br>
            <div id="m_i_c-botonModificar"></div>
            <div id="m_i_c-botonEliminar"></div>
          </div>

          <div class="col-6">
            <br>
           <div  id="m_i_c-botonContactar"></div>
          </div>

        </div>

      </div>

    </div>
  </div>
</div>
<?php
    $eliminarCliente = new ControladorClientes();
    $eliminarCliente -> ctrEliminarCliente();
?>

<!-- <h5 class="modal-title" id="mcliente-nombreCliente">Nombre del cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->

 <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->