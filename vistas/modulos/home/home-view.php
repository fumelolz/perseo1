  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <?php

              // This is just an example. In application this will come from Javascript (via an AJAX or something)
              $timezone_offset_minutes = 330;  // $_GET['timezone_offset_minutes']

              // Convert minutes to seconds
              $timezone_name = timezone_name_from_abbr("", $timezone_offset_minutes*60, 0);
              echo '<pre>'; print_r($timezone_name); echo '</pre>';

              date_default_timezone_set($timezone_name);

              $date = date('Y-m-d');
              $time = date('H:i:s');

              $fecha_servidor = ControladorDB::ctrMostrarFecha();
              $fecha_local = date('Y-m-d');
              $hora_local = date('H:i:s');

              echo 'Fecha del gestor de base de datos: '; echo $fecha_servidor["fecha"];
              echo '<br>'; 
              echo 'Hora del gestor de base de datos: '; echo $fecha_servidor["hora"];
              echo '<br>';
              echo 'Fecha local: '; echo $fecha_local; 
              echo '<br>';
              echo 'Hora local: '; echo $hora_local; 

              ?>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              Footer
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->

        </section>
        <!-- /.content -->
      </div>
  <!-- /.content-wrapper -->