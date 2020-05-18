<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perseo V1</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.css">

  <!--Estilos propios-->
  <link rel="stylesheet" href="vistas/css/estilos.css">

  <!-- SweetAlert -->
  <link rel="stylesheet" href="vistas/plugins/sweetalert2/sweetalert2.css">
  <!-- SweetAlert -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">

  <!-- Site wrapper -->
  <div class="wrapper">

    <?php 

    include "modulos/navbar.php";
    include "modulos/sidebar.php";

    if (isset($_GET["ruta"])) {

      if ($_GET["ruta"]=="home" || 
          $_GET["ruta"]=="clientes" ||
          $_GET["ruta"]=="productos" ||
          $_GET["ruta"]=="proveedores" ||
          $_GET["ruta"]=="usuarios") {

        include "modulos/".$_GET["ruta"]."/".$_GET["ruta"]."-view.php";

    }


  }else{
    include "modulos/home/home-view.php";
  }

  include "modulos/footer.php";


  ?> 

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="vistas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>

<!-- DataTables -->
<script src="vistas/plugins/datatables/jquery.dataTables.js"></script>
<script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="vistas/dist/js/demo.js"></script>

<!-- Js Personalizado -->
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/clientes.js"></script>

</body>
</html>
