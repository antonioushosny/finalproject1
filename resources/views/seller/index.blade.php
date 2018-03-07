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

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>


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
      <span class="logo-lg"><b>Seller</span>
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
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::guard('seller')->user()->name }} 
                                        <span class="caret"></span>
                                        </a>
                                        <ul style="background-color: #708090" class="dropdown-menu" role="menu">
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
      <div class="user-panel">
        
        <div class="pull-left info">
          <p>{{ Auth::guard('seller')->user()->name }} </p>
        </div>
        <br>
      </div>
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
        <li class="header">MAIN NAVIGATION</li>

        @foreach($groups as $group)
          <li class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>{{$group->group_name}}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            @foreach($group->categories as $category )
              <li><a href="{{ route('showproduct',array('categ_name'=>$category->categ_name,'group_name'=>$group->group_name)) }}"><i class="fa fa-circle-o"></i> {{$category->categ_name}}</a></li>
            @endforeach
            </ul>
          </li>
        @endforeach


        
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

@yield('script')
</body>
</html>
