<?php
if (strlen(session_id()) < 1) {
  session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Plan de accion | https://www.unicesar.edu.co/index.php/es/</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="../public/dist/css/skins/skin-green.css">

  <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
  <link rel="shortcut icon" href="../public/img/LogoUpc.png">

  <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="../public/complement/bootstrap-select.min.css">

</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>UPC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PDA-UPC</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" alt="User Image">

                <p>
                  <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
                  <small><?php echo $_SESSION['login']; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <?php
            if ($_SESSION['escritorio']==1) {
              echo '<li>
                      <a href="#">
                        <i class="fa fa-tasks"></i> <span>Escritorio</span>
                      </a>
                    </li>';
            }
            ?>
            <?php
            if ($_SESSION['recurso']==1) {
              echo '<li class="treeview">
                      <a href="#">
                        <i class="fa fa-align-left"></i> <span>Recurso</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="recursos.php"><i class="fa fa-circle-o"></i> Recursos</a></li>
                      </ul>
                    </li>';
            }
            ?>
            <?php
            if ($_SESSION['actividad']==1) {
              echo '<li class="treeview">
                      <a href="#">
                        <i class="fa fa-th"></i> <span>Actividad</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="actividades.php"><i class="fa fa-circle-o"></i> Actividad</a></li>
                        <li><a href="seguimiento.php"><i class="fa fa-circle-o"></i> Seguimiento</a></li>
                      </ul>
                    </li>';
            }
            ?>
            <?php
            if ($_SESSION['estrategias_programas']==1) {
              echo '<li class="treeview">
                      <a href="#">
                        <i class="fa fa-book"></i> <span>Estrategias & Programas</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="eje_estrategicos.php"><i class="fa fa-circle-o"></i> Ejes estrategicos</a></li>
                        <li><a href="programa.php"><i class="fa fa-circle-o"></i> Programas</a></li>
                      </ul>
                    </li>';
            }
            ?>
            <?php
            if ($_SESSION['acceso']==1) {
              echo '<li class="treeview">
                      <a href="#">
                        <i class="fa fa-folder"></i> <span>Acceso</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                        <li><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos</a></li>
                      </ul>
                    </li>';
            }
            ?>
            <?php
            if ($_SESSION['consultars']==1) {
              echo '<li class="treeview">
                      <a href="#">
                        <i class="fa fa-bar-chart"></i> <span>Consulta Seguimientos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="consultacompras.php"><i class="fa fa-circle-o"></i> Consulta Seguimientos</a></li>
                      </ul>
                    </li>';
            }
            ?>
            <?php
            if ($_SESSION['consultara']==1) {
              echo '<li class="treeview">
                      <a href="#">
                        <i class="fa fa-bar-chart"></i> <span>Consulta Movimientos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="consultaventas.php"><i class="fa fa-circle-o"></i> Consulta Movimientos</a></li>
                      </ul>
                    </li>';
            }
            ?>
            <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>