<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ url('image/logo2.png') }}" rel="icon">
    <title>{{ $title }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="{{ url('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin/css/ruang-admin.min.css') }}" rel="stylesheet">
    <link href="{{ url('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script src="{{ url('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="{{ url('vendor/jquery-validation/jquery.validate.min.js') }}"></script> --}}
</head>
<style>
    form .error {
        color: red;
        font-size: 15px;
        width: 100%;
    }
</style>

<body id="page-top">
    @include('sweetalert::alert')
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="{{ url('image/logo2.png')}}">
        </div>
        <div class="sidebar-brand-text mx-3">SistemPakar</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin-dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Menu
      </div>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin-penyakit') }}">
            <i class="fas fa-virus"></i>
          <span>Penyakit</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin-gejala') }}">
            <i class="fa-solid fa-thermometer"></i>
          <span>Gejala</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin-bobot') }}">
            <i class="fa fa-calculator"></i>
          <span>Bobot Keyakinan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin-rules') }}">
            <i class="fa-solid fa-code-compare"></i>
          <span>Rule</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin-knowladge') }}">
            <i class="fas fa-book-open"></i>
          <span>Knowladge</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin-riwayat') }}">
            <i class="fas fa-history"></i>
          <span>Riyawat Konsultasi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin-pesan') }}">
            <i class="fa fa-envelope"></i>
          <span>Pesan (Kritik, Saran, dan Masukan)</span>
        </a>
      </li>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{ url('image/user.png') }}" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">Admin</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            @yield('adminlayout')
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      {{-- <footer class="sticky-footer bg-white">
        <div class="container my-auto py-2">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; 2023 Sitem Pakar Diagnosa Penyakit Mulut dan Kuku pada Sapi
              <b><a href="https://themewagon.com/" target="_blank">Website by Shinta Destira Ayu</a></b>
            </span>
          </div>
        </div>
      </footer> --}}
      <!-- Footer -->
    </div>
  </div>
   <!-- Modal Logout -->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabelLogout">Anda akan keluar ?</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <p>Apakah anda yakin ?</p>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
         <form action="{{ url('/admin-logout') }}" method="POST">
            @csrf
        <button type="submit" class="btn btn-danger"><i class="fa fa-arrow-alt-circle-right"></i> Logout</button>
        </form>
       </div>
     </div>
   </div>
   </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  {{-- <script src="{{ url('admin/vendor/jquery/jquery.min.js') }}"></script> --}}
  <script src="{{ url('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ url('admin/js/ruang-admin.min.js') }}"></script>
  <script src="{{ url('admin/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ url('admin/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ url('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

</body>

</html>
