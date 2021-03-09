<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <script src="{{ asset('js/jquery-1.10.2.min.js') }}" ></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript" ></script>
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: none;
        color: black!important;
        border-radius: 4px;
        border: 1px solid #828282;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:active {
        background: none;
        color: black!important;
        }
        .dataTables_wrapper .dataTables_filter input {
            margin-left: -0.5em;
            width: 220px;
        }
    </style>
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" target="_blank" href="{{ route('index') }}">Car Dealership</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    @if (session('status'))
        <script>
            toastr.success('{{ session('status') }}', {timeOut:5000})
        </script>
    @endif

    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i> Admin
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="{{ route('changePassword') }}"><i class="fas fa-user-edit"></i> Change Password</a>
            <!-- <a class="dropdown-item" href="#"><i class="fas fa-wrench"></i> Mail Configuration</a> -->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item {{ (request()->is('dashboard')) ? 'active' : '' }} {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ (request()->is('admin/cars*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('cars') }}">
            <i class="fas fa-car"></i>
            <span>Vehicle</span></a>
        </li>
        <li class="nav-item {{ (request()->is('admin/manufacturers')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('manufacturers') }}">
            <i class="fas fa-industry"></i>
            <span>Manufacturers</span></a>
        </li>
        <li class="nav-item {{ (request()->is('admin/models')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('models') }}">
            <i class="fas fa-grip-vertical"></i>
            <span>Models</span></a>
        </li>
        <li class="nav-item {{ (request()->is('admin/body_types*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('body_types') }}">
            <i class="fas fa-clipboard-list"></i>
            <span>Body Types</span></a>
        </li>
        <li class="nav-item {{ (request()->is('admin/fuel_types*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('fuel_types') }}">
            <i class="fas fa-gas-pump"></i>
            <span>Fuel Types</span></a>
        </li>
        <li class="nav-item {{ (request()->is('admin/transmissions*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('transmissions') }}">
            <i class="fas fa-trademark"></i>
            <span>Transmissions</span></a>
        </li>
        <li class="nav-item {{ (request()->is('admin/doors*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('doors') }}">
            <i class="fas fa-door-open"></i>
            <span>Doors</span></a>
        </li>
        <li class="nav-item {{ (request()->is('admin/equipments*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('equipments') }}">
            <i class="fas fa-cogs"></i>
            <span>Equipments</span></a>
        </li>
        <li class="nav-item {{ (request()->is('admin/cylinders*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('cylinders') }}">
            <i class="fab fa-cuttlefish"></i>
            <span>Cylinders</span></a>
        </li>
        <li class="nav-item {{ (request()->is('admin/colors*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('colors') }}">
            <i class="fas fa-brush"></i>
            <span>Colors</span></a>
        </li>
        <li class="nav-item {{ (request()->is('admin/origins*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('origins') }}">
            <i class="fas fa-chevron-right"></i>
            <span>Origins</span></a>
        </li>
        <li class="nav-item {{ (request()->is('admin/registrations*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('registrations') }}">
            <i class="fas fa-chevron-right"></i>
            <span>Registrations</span></a>
        </li>
        <li class="nav-item {{ (request()->is('admin/conditions*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('conditions') }}">
            <i class="fas fa-chevron-right"></i>
            <span>Conditions</span></a>
        </li>
    </ul>

        <div id="content-wrapper">
            @yield('dashboard-content')
        </div>
        <!-- /.container-fluid -->

      <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Beko Car Sales 2019</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <!-- <a class="btn btn-primary" href="login.html">Logout</a> -->
            <a class="btn btn-info" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
      </div>
    </div>
  </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('js/sb-admin.min.js') }}"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    @yield('dashboard-script')

</body>

</html>
