<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="_token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Website Admin</title>

  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet"  href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('jvectormap/jquery-jvectormap.css') }}">
  <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}"> 
  
  <link rel="stylesheet" href="{{ asset('icheck/square/yellow.css') }}">
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
  
    <div class="container-fluid">
        <div class="row col-xs-12 custyle">
            <div class="wrapper ">
               <header class="main-header">

                  <a href="index2.html" class="logo">

                   <span class="logo-mini"><b>A</b>LT</span>
  
                   <span class="logo-lg"><b>Admin</b>LTE</span>
                  </a>

                  <nav class="navbar navbar-static-top"></nav>

                  
    
      

      
    
                 </header>
 
                 <aside class="main-sidebar">
  
                              <section class="sidebar">

                  
                  

                                  <form action="#" method="get" class="sidebar-form">
                                    <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                    </button>
                                    </span>
                                    </div>
                                  </form>

                                  <ul class="sidebar-menu" data-widget="tree">
                                   
                                    <li class="header"><a href="{{route('showusers')}}">Users</a></li>
                                    
                                    
                                    
                                  </ul>
                    

                    {{--  <li class="treeview">
                      <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>USERS</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i>USERS</a></li>
                    

                      </ul>
                    </li>  --}}





                  

                    
              
                                </section>
    
                 </aside>




                  <div class="content-wrapper">
                    @yield('content')



                </div>



<footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
 
  </footer>

 
  <div class="control-sidebar-bg"></div>
 

<script src="{{ asset('js/jquery-3.2.1.min.js') }}" ></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('toastr/toastr.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('icheck/icheck.min.js') }}"></script>


</body>
</html>
