<?php
    session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

    require 'koneksi.php';

    $id_bengkel = $_GET['id_bengkel'];
    $dataUbah = mysqli_query($conn, "SELECT * FROM bengkel WHERE id_bengkel='$id_bengkel'");

    $data1 = mysqli_fetch_assoc($dataUbah);

    $username = $_SESSION['username_akun'];

    $result = mysqli_query($conn, "SELECT * FROM akun WHERE username_akun = '$username'");
    $data = mysqli_fetch_array($result);
?>

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
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

  <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

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
      .hitam{
        background-color: #343a40;
      }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed hitam">
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
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal" data-slide="true" role="button" >
          <i class="fas fa-sign-out-alt"></i>
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
            <a href="dashboard_admin.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active bg-red">
              <i class="nav-icon fas fa-map-marker tulisan"></i>
              <p>
                Lokasi Bengkel
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="view_bengkel_admin.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Bengkel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_marker_cluster_admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengelompokan Bengkel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_marker_search_admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pencarian</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="view_saran_admin.php" class="nav-link">
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
      <div class="container-fluid bg-dark">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Bengkel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Pemetaan Bengkel</li>
              <li class="breadcrumb-item active">Daftar Bengkel</li>
              <li class="breadcrumb-item">Update Bengkel</li>
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
        <form autocomplete="off" action="<?php echo "update_bengkel_admin_action.php?id_bengkel=".$data1['id_bengkel']; ?>" method="POST">
        <div class="card-header bg-dark">
          <div class="space_d">
          <?php
            if(isset($_GET['input'])){
              if($_GET['input'] == "success"){
                echo "
                  <center>
                  <div class='alert bg-teal alert-dismissible tulisan'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Berhasil menambahkan data tempat kost</strong>
                  </div>
                  </center>
                ";
              }
            }
            else {
              echo "
                <center>
                <div class='alert alert-danger alert-dismissible tulisan'>
                  Selamat Datang <strong>".$data['nama_akun']."
                </strong>
                </div>
                </center>
              ";
            }
          ?>
          </div>
        </div>

        <div class="container-fluid">
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
                <label for="exampleNama">Nama Bengkel</label>
                <input type="text" class="form-control" id="exampleInputNama" name="nama" required="" value="<?php echo $data1['nama_bengkel']; ?>">
              </div>
              <div class="form-group">
                <label>Kategori Bengkel</label>
                <select class="form-control select2" style="width: 100%;" name="kategori">
                  <option value="Motor" <?php if ($data1['kategori_bengkel']=='Motor'){echo 'selected';}?>>Motor</option>
                  <option value="Mobil" <?php if ($data1['kategori_bengkel']=='Mobil'){echo 'selected';}?>>Mobil</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleJambuka">Jam Buka</label>
                <input type="time" class="form-control" id="exampleInputJambuka" name="jambuka" required="" value="<?php echo $data1['jam_buka']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleJamtutup">Jam Tutup</label>
                <input type="time" class="form-control" id="exampleInputJamtutup" name="jamtutup" required="" value="<?php echo $data1['jam_tutup']; ?>">
              </div>
              <div class="form-group">
                <label>Kecamatan</label>
                <select class="form-control select2" style="width: 100%;" name="kecamatan">
                  <option value="1" <?php if ($data1['id_kecamatan']=='1'){echo 'selected';}?>>Sendangadi</option>
                  <option value="2" <?php if ($data1['id_kecamatan']=='2'){echo 'selected';}?>>Sinduadi</option>
                  <option value="3" <?php if ($data1['id_kecamatan']=='3'){echo 'selected';}?>>Trihanggo</option>
                </select>
              </div>
              <div class="row">
                  <!-- left column -->
                  <div class="col-md-6">
                    <div id="map" style="width:100%;height:260px;"></div>
                  </div>
                  
                  <div class="col-md-6">
                      <label for="exampleInputTitik" class="input">Titik Koordinat</label>
                        <input type="text" class="form-control" id="Latitude" required="" name="latitude" readonly="" value="<?php echo $data1['latitude']; ?>">
                        <br>
                        <input type="text" class="form-control" id="Longitude" required="" name="longitude" readonly="" value="<?php echo $data1['longitude']; ?>">
                        <br>
                        <div class="container-login100-form-btn">
                          <div class="alert alert-danger">
                              Drag Marker (Tekan Tahan Marker) yang ada pada map untuk menentukan latitude dan longitude
                          </div>
                        </div>
                  </div>
              </div>
              <br>
              <button type="submit" class="btn btn-primary submit" name="submit">Update Data</button>
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

<!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin keluar dari halaman ini</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih Logout untuk keluar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="action_logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">

  var curLocation = [0,0];
  if (curLocation[0] == 0 && curLocation[1] == 0) {
    curLocation = [<?php echo $data1['latitude']; ?>, <?php echo $data1['longitude']; ?>];
  }
  
  var map = L.map('map').setView([-7.747875373748834, 110.35532949501062], 16);

  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11'
  }).addTo(map);

  map.attributionControl.setPrefix(false);

  var marker = new L.marker(curLocation, {
    draggable : 'true'
  });

  marker.on('dragend', function(event){
    var position = marker.getLatLng();
    marker.setLatLng(position, {
      draggable : 'true'
    }).bindPopup(position).update();
    $("#Latitude").val(position.lat);
    $("#Longitude").val(position.lng).keyup();
  });

  $("#Latitude,#Longitude").change(function(){
    var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
    marker.setLatLng(position, {
      draggable : 'true'
    }).bindPopup(position).update();
    map.panTo(position);
  });

  map.addLayer(marker);

</script>



<script type="text/javascript">
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
</script>
</body>
</html>