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
      $_GET["ruta"]=="clientes") {
    
    include "modulos/".$_GET["ruta"]."/".$_GET["ruta"].".php";

  }

}else{
  include "modulos/home/home.php";
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
  <!-- AdminLTE for demo purposes -->
  <script src="vistas/dist/js/demo.js"></script>
</body>
</html>
