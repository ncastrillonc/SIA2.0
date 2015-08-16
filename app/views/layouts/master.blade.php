<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>
        
        @section('titulo')
            SIA 2.0
        @show
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    {{HTML::style("./master/bootstrap/css/bootstrap.min.css")}}
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    {{HTML::style("./master/dist/css/AdminLTE.min.css")}}
    
    {{HTML::style("./assets/css/style.css")}}
    
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    {{HTML::style("./master/dist/css/skins/_all-skins.min.css")}}
   
    <!-- iCheck -->
    {{HTML::style("./master/plugins/iCheck/flat/blue.css")}}
    
    <!-- Morris chart -->
    {{HTML::style("./master/plugins/morris/morris.css")}}
    
    <!-- jvectormap -->
    {{HTML::style("./master/plugins/jvectormap/jquery-jvectormap-1.2.2.css")}}
   
    <!-- Date Picker -->
    {{HTML::style("./master/plugins/datepicker/datepicker3.css")}}
   
    <!-- Daterange picker -->
    {{HTML::style("./master/plugins/daterangepicker/daterangepicker-bs3.css")}}
    
    <!-- bootstrap wysihtml5 - text editor -->
    {{HTML::style("./master/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}
    
    @section('styles')
    
    @show
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
               <!--seccion para el tipo de usuario-->
              @section('tipo_u')
               
              @show
          </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{url('./master/dist/img/avatar04.png')}}" class="user-image" alt="User Image" />
                  <span class="hidden-xs">{{Auth::user()->nombre}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{url('./master/dist/img/avatar04.png')}}" class="img-circle" alt="User Image" />
                    <p>
                      {{Auth::user()->nombre}} {{Auth::user()->apellidos}}
                      <small>{{Auth::user()->usuario}}<?php echo "@unal.edu.co"; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <p>Followers</p>
                    </div>
                    <div class="col-xs-4 text-center">
                      <p>Sales</p>
                    </div>
                    <div class="col-xs-4 text-center">
                      <p>Friends</p>
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
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{url('./master/dist/img/avatar04.png')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>{{Auth::user()->nombre}}</p>
              <a href="#"><i class="fa fa-circle text-success"></i>{{Session::get('tipo')}}</a>
            </div>
          </div>
          <!-- search form -->
         
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">NAVEGACIÓN</li>
                
                @if (Session::get('tipo') === "Administrador")
                    @include('menu.admin')
                @elseif (Session::get('tipo') === "Estudiante")
                    @include('menu.student')
                @else
                    I don't have any records!
                @endif
            </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @section('titulo')
            
            @show
          </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home fa-lg"></i> Inicio</a></li>
                <li class="active"> @section('titulo')  @show</li>
            </ol>
          
        </section>

        <!-- Main content -->
        <section class="content">
            
                @yield('content')
            
                @show

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked />
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right" />
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    {{HTML::script('//code.jquery.com/jquery-1.11.3.min.js')}}
    
    <!-- jQuery UI 1.11.4 -->
    {{HTML::script('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js')}}
   
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script type="text/javascript">
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    {{HTML::script('./master/bootstrap/js/bootstrap.min.js')}}
    
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    {{HTML::script('./master/plugins/morris/morris.min.js')}}
    
    <!-- Sparkline -->
     {{HTML::script('./master/plugins/sparkline/jquery.sparkline.min.js')}}
   
    <!-- jvectormap -->
    {{HTML::script('./master/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}
    {{HTML::script('./master/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}
    
    <!-- jQuery Knob Chart -->
    {{HTML::script('./master/plugins/knob/jquery.knob.js')}}
    
    <!-- daterangepicker -->
    {{HTML::script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js')}}
    {{HTML::script('./master/plugins/daterangepicker/daterangepicker.js')}}
    
    <!-- datepicker -->
    {{HTML::script('./master/plugins/datepicker/bootstrap-datepicker.js')}}
   
    <!-- Bootstrap WYSIHTML5 -->
    {{HTML::script('./master/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}
    
    <!-- Slimscroll -->
    {{HTML::script('./master/plugins/slimScroll/jquery.slimscroll.min.js')}}
   
    <!-- FastClick -->
    {{HTML::script('./master/plugins/fastclick/fastclick.min.js')}}
    
    <!-- AdminLTE App -->
    {{HTML::script('./master/dist/js/app.min.js')}}
    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{HTML::script('./master/dist/js/pages/dashboard.js')}}
    
    <!-- AdminLTE for demo purposes -->
    {{HTML::script('./master/dist/js/demo.js')}}
    
    <script>
        var baseUrl = "{{URL::to('/')}}";
    </script>
    
    {{HTML::script('./assets/js/app.js')}}
    @section('scripts')
    
    @show
   
  </body>
</html>
