<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pemetaan Bengkel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

  <script src="geojson/js/leaflet.ajax.js"></script>

  <link rel="stylesheet" href="geojson/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />
  <script src="geojson/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>

  <!-- CLUSTER -->
  <link rel="stylesheet" href="cluster/dist/MarkerCluster.css" />
  <link rel="stylesheet" href="cluster/dist/MarkerCluster.Default.css" />
  <script src="cluster/dist/leaflet.markercluster-src.js"></script>

  <style>#map { width: 100%; }
.info { width: 100%; padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; } .info h4 { margin: 0 0 5px; color: #777; }
.legend { width: 30%; text-align: left; line-height: 18px; color: #555; } .legend i { width: 18px; height: 18px; float: left; margin-right: 8px; opacity: 0.7; }</style>
    
  <style type="text/css">
      .orange {
        border-color: orange;
      }
      .card_color {
        background-color: orange;
      }
      .tulisan {
        color: white;
        width: 102%;
        margin-left: -1%;
      }
      .coloum1{
        height: 70px;
      }
      .space_d{
        height: 50px;
      }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed bg-dark">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal" data-slide="true" role="button" >
          <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PEMETAAN BENGKEL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-map-marker"></i>
              <p>
                Lokasi Tempat Bengkel
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view_marker_cluster_user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengelompokan Bengkel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_marker_search_by_price_user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Berdasarkan jam Buka</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_marker_search_user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pencarian</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="input_saran_user.php" class="nav-link active bg-danger">
              <i class="nav-icon fas fa-clone tulisan"></i>
              <p class="tulisan">
                Saran
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-dark">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Input Saran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Pemetaan Bengkel</li>
              <li class="breadcrumb-item active">Input Saran</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content bg-dark">

      <div class="space_d">
      </div>

      <div class="card bg-dark">
        <form autocomplete="off" action="input_saran_user_action.php" method="POST">
        <div class="card-header bg-dark">
          <div class="space_d">
          <?php
            if(isset($_GET['input'])){
              if($_GET['input'] == "success"){
                echo "
                  <center>
                  <div class='alert bg-teal alert-dismissible tulisan'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Saran anda sangat berpengaruh untuk perkembangan website</strong>
                  </div>
                  </center>
                ";
              }
            }
            else {
              echo "
                <center>
                <div class='alert alert-danger alert-dismissible tulisan'>
                  Selamat Datang <strong>Pengunjung</strong>
                </div>
                </center>
              ";
            }
          ?>
          </div>
        </div>

        <div class="container-fluid bg-dark">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- ./col -->
          <!-- ./col -->
          <!-- ./col -->
          <!-- ./col -->
        </div>

        <table border="0" width="100%">
          <tr>
              <td>
              </td>
          </tr>
          <tr>
            <td>
              <!-- Main row -->

              <div class="form-group">
                <label for="exampleNama">Nama</label>
                <input type="text" class="form-control" id="exampleInputNama" placeholder="Enter Nama" name="nama" required="">
              </div>
              <div class="form-group">
                <label for="exampleKeterangan">Keterangan</label>
                <textarea id="exampleInputKeterangan" class="form-control" name="keterangan" rows="4" cols="50"></textarea>
              </div>
              <br>
              <button type="submit" class="btn btn-primary submit" name="submit">Kirim Saran</button>
              <br>
              <br>
            </td>
          </tr>
          <tr>
            <td>   
            </td>
          </tr>
        </table>
        <!-- /.row -->
      </div>
      </form>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer bg-dark">
    <center>
      <strong>Copyright &copy; 2023 Pemetaan Bengkel</a></strong>
    </center>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Login Modal-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title kelas_login" id="exampleModalLabel">
                        Login
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form autocomplete="off" action="action_login.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" name="submit">Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>