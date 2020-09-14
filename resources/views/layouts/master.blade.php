
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="./img/logo.png" alt="LaraStart Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/profile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <router-link to="/home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt "></i>
              <p>
                    Dashboard
              </p>
            </router-link>
          </li>

          <li class="nav-item has-treeview">
            <a id="att" href="#" class="nav-link">
              <i class="nav-icon fas fa-user-clock orange"></i>
              <p>
                Mark Today's Attendance
              </p>
            </a>
           </li>

          <!-- <li class="nav-item">
            <router-link to="/profile" class="nav-link">
              <i class="nav-icon fas fa-user "></i>
              <p>
                    Profile
              </p>
            </router-link>
          </li> -->

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs "></i>
              <p>
                Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('isAdmin')
              <li class="nav-item">
                <router-link to="/users" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Users</p>
                </router-link>
              </li>
              @endcan
              <li class="nav-item">
                <router-link to="/attendence" class="nav-link">
                  <i class="fas fa-clock nav-icon"></i>
                  <p>View Attendance</p>
                </router-link>
              </li>
            </ul>
          </li>

          <li class="nav-item">

            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              <i class="nav-icon fa fa-power-off"></i>
                <p>
                
                  {{ __('Logout') }}
                
                </p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <vue-progress-bar></vue-progress-bar>
      <router-view></router-view>

      <div class="modal fade" id="AddAttendance" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Attendance</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- /Add Form Content -->
              <div class="row" style="margin: auto; width: 40%;">
                  <button id="check-in">
                    <i class="fas fa-sign-in-alt fa-9x"></i>
                    Check-In
                  </button>
                  <button id="check-out" class="btn-warning">
                    <i class="fas fa-sign-out-alt fa-9x"></i>
                    Check-Out
                  </button>
                  <h5 class = "" id="attendance_recorded">You have checked-out</h5>
                  <span id="check_in_time" style="font-size: 22px;"></span>
              </div>

              <!-- /.Add Form Content -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
      </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<script src="/js/app.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
var user_id = <?php echo auth()->user()->id; ?>;
$('#att').on('click',function () {
  $.ajax({
      type : 'get',
      url : '{{URL::to("api/statusURL")}}',
      data:{"user_id":user_id},
      dataType: "JSON",
        success:function(data)
        {
          $('#AddAttendance').modal('show');
          if(data.length > 0)
          {
            if(data[0].check_out)
            {
              $('#attendance_recorded').show();
              $('#check-in').hide();
              $('#check-out').hide();
            }
            else
            {
              $('#attendance_recorded').hide();
              $('#check-in').hide();
              $('#check-out').show();
            }
          }
          else
          {
            $('#attendance_recorded').hide();
            $('#check-out').hide();
            $('#check-in').show(); 
          }
        }
    });               
});
$('#check-in').on('click',function () {
  $('#check-in').hide();
  $.ajax({
      type : 'get',
      url : '{{URL::to("api/checkInURL")}}',
      data:{"user_id":user_id},
        success:function(data){
          $('#check_in_time').text('Check-In Time:'+data);
          $('#check_in_time').fadeOut(4000,function(){
          $('#check-out').show();
            
          });
          // location.reload();
        }
    });                          
});
$('#check-out').on('click',function () {
  $('#check-out').hide();
  $.ajax({
      type : 'get',
      url : '{{URL::to("api/checkOutURL")}}',
      data:{"user_id":user_id},
      dataType: "JSON",
      success:function(data){}
    });
  $('#attendance_recorded').show();                           
});
// $(document).ready(
//     function notifications(){
//     setInterval(function(){
//       $.ajax({
//         type: 'get',
//         url: '{{URL::to("api/notifications")}}',
//         dataType: "JSON",
//         success: function(data){
//           $('#main_count').text(data.main_count);
//           $('#announcement_count').text(data.announcement_count + ' new announcements');
//         }
//       })
//     }, 2000);
//   }
// )
</script>

</body>
</html>
