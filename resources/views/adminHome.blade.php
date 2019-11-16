<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>

    <!-- Scripts 
    <script src="{{ asset('js/app.js') }}" defer></script>-->
    <link rel="apple-touch-icon" href="images/logo1.png">
    <link rel="shortcut icon" href="images/logo1.png">
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    
    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/visualization/dimple/dimple.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery_ui/interactions.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/form_select2.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/pages/components_modals.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/ripple.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
</head>
<body class="navbar-bottom">
    <div id="app">
        <div class="navbar navbar-inverse  ">
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php"><span class="text-bold">Dashboard Admin</span></a>
    
                <ul class="nav navbar-nav visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                    <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>
            </div>
    
            <div class="navbar-collapse collapse" id="navbar-mobile">
                <ul class="nav navbar-nav">
                    <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>
    
                <p class="navbar-text">Status : <span class="label bg-success-400">Online</span></p>
    
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown dropdown-user">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <span>admin</span>
                            <i class="caret"></i>
                        </a>
    
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <main class="py-4">
            <div class="page-header">
                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="index.php"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                       
                        <li class="active"></li>
                    </ul>
                </div>
                <br>
            </div>
            <!-- Page container -->
            <div class="page-container">
        
                <!-- Page content -->
                <div class="page-content">
        
                    <!-- Main sidebar -->
                    <div class="sidebar sidebar-main sidebar-default">
                        <div class="sidebar-content">
        
                            <!-- Main navigation -->
                            <div class="sidebar-category sidebar-category-visible">
                                <div class="sidebar-user-material">
                                    <div class="category-content">
                                        <div class="sidebar-user-material-content">
                                            <h6>Addmin</h6>
                                        </div>
                                                                    
                                        <div class="sidebar-user-material-menu">
                                            <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                                        </div>
                                    </div>
                                    
                                    <div class="navigation-wrapper collapse" id="user-nav">
                                        <ul class="navigation">
                                            <li><a href=" {{ __('Logout') }}" onclick="javascript: return confirm('Anda yakin ingin keluar?')"><i class="icon-switch2"></i> <span>Logout</span></a></li>
                                        </ul>
                                    </div>
                                </div>
        
                                <div class="category-content no-padding">
                                    <ul class="navigation navigation-main navigation-accordion">
        
                                        <!-- Main -->
                                        <li class="navigation-header">
                                            <span>Admin Main</span> <i class="icon-menu" title="Main pages"></i>
                                        </li>
                                        <?php ?>
                                        <li>
                                       
                                        <li  class="active">
                                      
                                            <a href="#">
                                                <i class="icon-home4"></i> <span>Dashboard</span>
                                            </a>
                                        </li>
                                        <li class="active">
                                        
                                        <li>
                                      
                                            <a href="#"><i class="icon-book"></i> <span>Input Data</span></a>
                                            <ul>
                                            <li><a href="{{ url('admin/home/kontak') }}"><i class="fa fa-id-card"></i> Contack</a></li>
                                                <li><a href="{{ url('admin/home/barang') }}"><i class="fa fa-clipboard"></i>Product </a></li>
                                                <li><a href="?galeri"><i class="icon-camera"></i>Galeri</a></li>
                                            </ul>
                                        </li>
                                      
                                        <li class="active">
                                        
                                        <li>
                                       
                                        </li>                          
                                    </ul>
                                </div>
                            </div>
                            <!-- /main navigation -->
        
                        </div>
                    </div>
                    <!-- /main sidebar -->
        
                    <!-- Main content -->
                    <div class="content-wrapper">
                        @yield('content-wrapper')
                        <div class="row">
                            <div class="col-lg-14">
                                <div class="panel panel-flat">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="navbar navbar-default navbar-fixed-bottom footer">
        <ul class="nav navbar-nav visible-xs-block">
            <li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i class="icon-circle-up2"></i></a></li>
        </ul>

        <div class="navbar-collapse collapse" id="footer">
            <div class="navbar-text">
                &copy; 2015. <a href="#" class="navbar-link">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" class="navbar-link" target="_blank">Eugene Kopyov</a>
            </div>

            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <script>
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
      
      </script>
</body>
</html>