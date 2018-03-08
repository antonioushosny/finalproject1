<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="_token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Website seller | @yield('title')</title>

  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet"  href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('jvectormap/jquery-jvectormap.css') }}">
  <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}"> 
  <link rel="stylesheet" href="{{ asset('css/tags.css') }}">
  <link rel="stylesheet" href="{{ asset('icheck/square/yellow.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">

 @yield('style')
  @yield('header')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  

<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
     
                                          


      
    </nav>
    
<ul style="margin-left: 1147px;
    margin-top: 4px;">
<li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:white">
                                        {{ Auth::guard('seller')->user()->name }} 
                                        <span class="caret"></span>
                                        </a>
                                        <ul style="background-color: white" class="dropdown-menu" role="menu">
                                            <li >
                                                <a href="{{ route('logout') }}">
                                                                <i class="fa fa-btn fa-sign-out"></i>Logout
                                                </a>
                    
                                                <!-- <form id="logout-form" action="#" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form> -->
                                            </li>
                                        </ul>
                                    </li>
                                    </ul>

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel -->
      
      <!-- search form -->

      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       

    
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Man</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('showproduct',array('categ_name'=>'Shirts','group_name'=>'Men')) }}"><i class="fa fa-circle-o"></i> Shirts</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Polos</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> T-Shirts</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> jeans&Pants</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>shorts</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Swimwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Underwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Sleepwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> jackets,Coats&Hoodies</a></li>

          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Woman</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('showproduct',array('categ_name'=>'Dresses','group_name'=>'Woman')) }}"><i class="fa fa-circle-o"></i> Dresses</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> jumpsuits</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Tops</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Jeans & Pants</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Leggings</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> skirts</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Swimwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Lingerie</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Sleepwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Cardigans & Kimonos</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Jackets&Coats</a></li>
          </ul>
        </li>



        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Kides-boys 0-3</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="#"><i class="fa fa-circle-o"></i> Tops</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>  Pants</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Underwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>  Blankets& Throws</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Swimwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>  Sportswear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>  Sleepswear</a></li>
          </ul>
        </li>



        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Kides-boys 3-6</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="#"><i class="fa fa-circle-o"></i> Tops</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>  Pants</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Underwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Shorts</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Sleepwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Jackets & Coats</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Swimwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>  Suits</a></li>
          </ul>
        </li>




        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Kides-boys 6-12</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Tops</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>  Pants</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Underwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Shorts</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Sleepwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Jackets & Coats</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Swimwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>  Sportswear</a></li>


          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Kides-girls 0-3</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Towels</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Underwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>  Sleepwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>  Blankets & Throws</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Tops</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Baby Clothes & Shoes</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Jackets & Coats</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Pants</a></li>

          </ul>
        </li>



        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Kides-girls  3-6</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Tops</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Underwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Pants</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>  Dresses</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Skirts</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Jackets & Coats</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Sleepwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Shorts</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Shorts</a></li>


          </ul>
        </li>




        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Kides-girls 6-12</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Tops</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>  Underwear </a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Pants</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Dresses</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Jackets & Coats</a></li>
            <li><a href="#l"><i class="fa fa-circle-o"></i> Skirts </a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>  Shorts</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Sleepwear</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>  Jumpsuits, Rompers</a></li>

          </ul>
        </li>     
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<div class="content-wrapper" style="padding:2em">

@yield('content')

</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
 

<script src="{{ asset('js/jquery-3.2.1.min.js') }}" ></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<script src="{{ asset('js/tags.js') }}"></script>

<script type="text/javascript" src="{{ asset('toastr/toastr.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('icheck/icheck.min.js') }}"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>

<script>
 	new WOW().init();
 </script>


@yield('script')
</body>
</html>
