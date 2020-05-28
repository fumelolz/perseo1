  
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="home" class="nav-link">Home</a>
    </li>

  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="vistas/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"><?php echo ucfirst($_SESSION["nombre_usuario"]); ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="vistas/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

            <p>
              <?php
              if ($_SESSION["nivel"] == 1 ) {
                $nivel = "Administrador";
              }else{
                $nivel = "Vendedor";
              }
              echo ucfirst($_SESSION["username"]).' - '.$nivel; 
              ?>
              <small>Miembro desde <?php echo $_SESSION["fecha_alta"]; ?></small>
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            <div class="row">
              <div class="col-4 text-center">
                <a href="#">Followers</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Sales</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Friends</a>
              </div>
            </div>
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
            <a href="#" class="btn btn-default btn-flat float-right">Sign out</a>
          </li>
        </ul>
      </li>
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-ellipsis-v"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right p-0">
        <a href="logout" class="dropdown-item">
         <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
       </a>
     </div>
   </li>
  </ul>
</nav>
  <!-- /.navbar -->