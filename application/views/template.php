<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nobby.co.id</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>assets/backend/plugins/summernote/summernote-bs4.min.css">


  <link href="<?= base_url() ?>assets/backend/vendors/sweetalert2/sweetalert2.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/backend/vendors/sweetalert2/animate.min.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav style="background-color:RGB(40, 178, 170);" class="main-header navbar navbar-expand navbar-light navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="" style="color: RGB(245, 245, 245);" class="nav-link"> :</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside style="background-color:RGB(40, 178, 170);" class="main-sidebar sidebar-light elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
        <img src="<?= base_url() ?>assets/backend/dist/img/Nobbyb.png" alt="nobby Logo" class="brand-image">
        <span style="color: RGB(245, 245, 245); font-style: bold;" class="brand-text font-weight-dark">Nobby.co.id</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url() ?>assets/backend/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a style="color: RGB(245, 245, 245);" href="#" class="d-block">| <i class="fa fa-user"> <small class="font-weight-bold"></small></i></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li style="font-style: bold; font-size: bold; color: RGB(245, 245, 245);" class="nav-header">Main </li>

           

              <li class="nav-item Active">
                <a style="color: RGB(245, 245, 245);" href="<?= site_url('Dashboard') ?>" class="nav-link">
                  <i class="nav-icon  fas fa-chart-line"></i>
                  <p style="color: RGB(245, 245, 245);">
                    Dashboard
                  </p>
                </a>
              </li>


              <li style="font-style: bold; font-size: bold; color: RGB(245, 245, 245);" class="nav-header">Menu </li>
              <li class="nav-item">
                <a style="color: RGB(245, 245, 245);" href="#" class="nav-link">
                  <i class="nav-icon fas fa-folder-plus"></i>
                  <p style="color: RGB(245, 245, 245);">
                    Data Kategori
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>



                <ul class="nav nav-treeview ">
                  <li class="nav-item">
                    <a style="color: RGB(245, 245, 245);" href="<?= site_url('ClassData') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p style="color: RGB(245, 245, 245);">Class</p>
                    </a>
                  </li>
                </ul>

                <ul class="nav nav-treeview ">
                  <li class="nav-item">
                    <a style="color: RGB(245, 245, 245);" href="<?= site_url('SubClassData') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p style="color: RGB(245, 245, 245);">SubClass</p>
                    </a>
                  </li>
                </ul>


                <ul class="nav nav-treeview ">
                  <li class="nav-item">
                    <a style="color: RGB(245, 245, 245);" href="<?= site_url('Kategori') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p style="color: RGB(245, 245, 245);">Kategori</p>
                    </a>
                  </li>
                </ul>



                <ul class="nav nav-treeview ">
                  <li class="nav-item">
                    <a style="color: RGB(245, 245, 245);" href="<?= site_url('SubKategori') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p style="color: RGB(245, 245, 245);">SubKategori</p>
                    </a>
                  </li>
                </ul>

            </li>

            <li class="nav-item Active">
                <a style="color: RGB(245, 245, 245);" href="<?= site_url('Data_emp') ?>" class="nav-link">
                  <i class="nav-icon  fas fa-file"></i>
                  <p style="color: RGB(245, 245, 245);">
                    Multiple i
                  </p>
                </a>
            </li>


              <li class="nav-item Active">
                <a style="color: RGB(245, 245, 245);" href="<?= site_url('Multiples') ?>" class="nav-link">
                  <i class="nav-icon  fas fa-file"></i>
                  <p style="color: RGB(245, 245, 245);">
                    Multiples Data
                  </p>
                </a>
              </li>


              <li class="nav-item Active">
                <a style="color: RGB(245, 245, 245);" href="<?= site_url('class_mltp') ?>" class="nav-link">
                  <i class="nav-icon  fas fa-file"></i>
                  <p style="color: RGB(245, 245, 245);">
                    Multiple class
                  </p>
                </a>
            </li>

          </ul>
          </li>
          </ul>
          </li>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- jQuery -->
  <script src="<?= base_url() ?>assets/backend/plugins/jquery/jquery.min.js"></script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <?php echo $contents ?>
      <!-- Main content -->

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 0.0.0
      </div>
      <strong>Copyright &copy; 2023 <a class="text-info" href="https://Nobby.co.id/">Nobby.co.id</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>assets/backend/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>assets/backend/dist/js/demo.js"></script>

  <script src="<?= base_url() ?>assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <!-- <script src="<?= base_url() ?>assets/backend/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/pdfmake/vfs_fonts.js"></script> -->
  <script src="<?= base_url() ?>assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <script src="<?= base_url() ?>assets/backend/vendors/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/plugins/summernote/summernote-bs4.min.js"></script>


  <!-- Page specific script -->


  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        // "buttons": ["copy", "csv"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

<script>
 $(document).ready(function() {
        $('#forhrd').DataTable()
 }) 
</script>

  <script>
    var flash = $('#flash').data('flash');
    if (flash) {
      Swal.fire({
        icon: 'success',
        title: 'success',
        text: flash
      })
    }


    var flasherr = $('#flasherr').data('flasherr');
    if (flasherr) {
      Swal.fire({
        icon: 'info',
        title: 'Gagal',
        text: flasherr
      })
    }


    $(document).on('click', '#btn-hapus', function(e) {
      e.preventDefault();
      // link for href
      var link = $(this).attr('href');
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data Akan Dihapus!",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = link;
        }
      })
    })


    $(document).on('click', '#btn-keluar', function(e) {
      e.preventDefault();
      // link for href
      var link = $(this).attr('href');
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Akan Logout!",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Logout!',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = link;
        }
      })
    })


    $(document).on('click', '#btn-Approve', function(e) {
      e.preventDefault();
      // link for href
      var link = $(this).attr('href');
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data Akan Di Approve!",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Approve!',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = link;
        }
      })
    })


    $(document).on('click', '#btn-Canceled', function(e) {
      e.preventDefault();
      // link for href
      var link = $(this).attr('href');
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data Akan Di Cancel!",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Cancel!',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = link;
        }
      })
    })


    $(document).on('click', '#btn-Closed', function(e) {
      e.preventDefault();
      // link for href
      var link = $(this).attr('href');
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Data Akan Di Closed!",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Closed!',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = link;
        }
      })
    })
  </script>


  <script>
    $(function() {
      // Summernote
      $('#summernote').summernote()

      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>


  <script>
    /** add active class and stay opened when selected */
    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.nav-sidebar a').filter(function() {
      return this.href == url;
    }).addClass('active');

    // for treeview
    $('ul.nav-treeview a').filter(function() {
      return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
  </script>


</body>

</html>