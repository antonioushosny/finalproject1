<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet"  href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet"  href="{{ asset('css/style.css') }}">
        <link rel="stylesheet"  href="{{ asset('css/animate.min.css') }}">
        <link rel="stylesheet"  href="{{ asset('css/show.css') }}">
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
 
    
 

        <title>Open Cart @yield('title')</title>
   
    </head>
    <style>
  
        body {
            font-family: Arial;
            margin: 0;
        }
        
        * {
            box-sizing: border-box;
        }
        .navbar-fixed-bottom, .navbar-fixed-top{
            z-index:3;
        }
        img {
            vertical-align: middle;
        }
        
        /* Position the image container (needed to position the left and right arrows) */
        .productslide {
            position: relative;
        }
        
        /* Hide the images by default */
        .mySlides {
            display: none;
        }
        
        /* Add a pointer when hovering over the thumbnail images */
        .cursor {
            cursor: pointer;
        }
        
        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 40%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }
        
        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }
        
        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
        
        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }
        
        /* Container for image text */
        .caption-container {
            text-align: center;
            background-color: #222;
            padding: 2px 16px;
            color: white;
        }
        
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        
        /* Six columns side by side */
        .column {
            float: left;
            width: 16.66%;
        }
        
        /* Add a transparency effect for thumnbail images */
        .demo {
            opacity: 0.6;
        }
        
        .active,
        .demo:hover {
            opacity: 1;
        }
    
    </style>
    <body>
        <!-- start header -->
        <div class="navbar-fixed-top">
        <div class="container">
                <div class="row" style="background: #e6e6ff">
                        <div class="col-sm-4"> 
                                <a class="logo"  href="#"><img src="{{asset('img/logo.jpg')}}" class="wow bounceInLeft"></a>
                        </div>
                        <div class="col-sm-2">
                            <div class="check">
                                <div><p>Check Rate</p></div>
                                <div>
                                <img src="{{asset('img/flagus.jpg')}}">
                                <img src="{{asset('img/flaguk.jpg')}}">
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="check">
                            <!-- hereeeee -->
                            <span></span><a href="{{route('shoppingcart')}}" >Shoping Cart</a>
                                <span class="badge">{{ Session::has('cartt') ? Session::get('cartt')->totalQty : '' }}</span>
                               <br><span class="fa fa-cart-plus"></span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <form class="search" action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
               </div>
        <!-- end header-->
        <!--start navbar-->
        <div class="container-fluid">
                <nav class="navbar navbar-default" style="z-index:2; background-color:#575757; ">
                       <div class="navbar-header">
                         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span> 
                         </button>
                        
{{--  @foreach($groups as $group)
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
        @endforeach  --}}

                       </div>
                       <div class="collapse navbar-collapse" id="myNavbar">
                         <ul class="nav navbar-nav">
                             <li><a href="{{ route('product') }}">Home</a></li>
                             <li id="wm">
                                 <a href="#">Women
                                     <div id="showwomen" style="width:600%;background-color:#575757; display:none; position:absolute;z-index:1 ;opacity:0.9;margin-left:17%;margin-top:-2%;">
                                         <div class="row">
                                            @foreach ($groups[1]->categories->chunk(6) as $key => $category)
                                             <div class="col-md-6">
                                                 <ul id="submenu">
                                                @foreach ($category as $categ)
                                                    <li><a href="{{ route('show',array('categ_name'=>$categ->categ_name,'group_name'=>$groups[1]->group_name)) }}">{{$categ->categ_name}}</a></li>
                                                @endforeach
                                                </ul>
                                             </div>
                                            @endforeach
                                         </div>
                                     </div>        
                                 </a>
                             </li>
                             
                             <li id="mn">
                                <a href="#">Men
                                    <div id="showman" style="width:600%;background-color:#575757; display:none; position:absolute;z-index:1 ;opacity:0.9;margin-left:17%;margin-top:-2%;">
                                         <div class="row">
                                            @foreach ($groups[0]->categories->chunk(6) as $key => $category)                                         
                                             <div class="col-md-6">
                                                 <ul id="submenu">
                                                @foreach ($category as $categ)
                                                    <li><a href="{{ route('show',array('categ_name'=>$categ->categ_name,'group_name'=>$groups[0]->group_name)) }}">{{$categ->categ_name}}</a></li>
                                                @endforeach
                                                 </ul>
                                             </div>
                                             @endforeach
                                         </div>
                                     </div>
                                </a>
                            </li>
                             <li><a href="#">Babies
                                    <div id="showwomen" style="width:600%;background-color:#575757; display:none; position:absolute;z-index:1 ;opacity:0.9;margin-left:17%;margin-top:-2%;">
                                         <div class="row">
                                             <div class="col-md-6">
                                                 <ul id="submenu">
                                                    <li><a href="{{ route('show',array('categ_name'=>'Dresses','group_name'=>'Woman')) }}">Dresses</a></li>
                                                    <li><a href="{{ route('show',array('categ_name'=>'Tops & T-Shirts','group_name'=>'Woman')) }}">Tops &amp; T-Shirts</a></li>
                                                    <li><a href="{{ route('show',array('categ_name'=>'Shirts & Blouses','group_name'=>'Woman')) }}">Shirts &amp; Blouses</a></li>
                                                    <li><a href="{{ route('show',array('categ_name'=>'Skirts','group_name'=>'Woman')) }}">Skirts</a></li>
                                                    <li><a href="{{ route('show',array('categ_name'=>'Trousers & Shorts','group_name'=>'Woman')) }}">Trousers &amp; Shorts</a></li>
                                                    <li><a href="{{ route('show',array('categ_name'=>'Leggings & Hosiery','group_name'=>'Woman')) }}">Leggings &amp; Hosiery</a></li>
                                                    <li><a href="{{ route('show',array('categ_name'=>'Playsuits & Jumpsuits','group_name'=>'Woman')) }}">Playsuits &amp; Jumpsuits </a></li>
                                                    <li><a href="{{ route('show',array('categ_name'=>'Jeans','group_name'=>'Woman')) }}">Jeans</a></li>
                                                 </ul>
                                             </div>
                                             <div class="col-md-6">
                                                 <ul>
                                                     <li><a href="{{ route('show',array('categ_name'=>'Sportswear & Joggers','group_name'=>'Woman')) }}">Sportswear &amp; Joggers </a></li>
                                                     <li><a href="{{ route('show',array('categ_name'=>'Swim & Beachwear','group_name'=>'Woman')) }}">Swim &amp; Beachwear </a></li>
                                                     <li><a href="{{ route('show',array('categ_name'=>'Blazer & Jackets','group_name'=>'Woman')) }}">Blazer &amp; Jackets </a></li>
                                                     <li><a href="{{ route('show',array('categ_name'=>'Knitwear','group_name'=>'Woman')) }}">Knitwear</a></li>
                                                     <li><a href="{{ route('show',array('categ_name'=>'Onesies & Nightwear','group_name'=>'Woman')) }}">Onesies &amp; Nightwear</a></li>
                                                     <li><a href="{{ route('show',array('categ_name'=>'Lingerie','group_name'=>'Woman')) }}">Lingerie </a></li>
                                                     <li><a href="{{ route('show',array('categ_name'=>'Suit','group_name'=>'Woman')) }}">Suit</a></li>
                                                     <li><a href="{{ route('show',array('categ_name'=>'Sale','group_name'=>'Woman')) }}">Sale</a></li>
                                                 </ul>
                                             </div>  
                                         </div>
                                     </div>
                                </a>
                            </li>
                             <li><a href="{{route('contactt')}}">Contact Us</a></li>
                             <li><a href="{{route('about')}}">About</a></li>
                            
                         </ul>
                         <!--<ul class="nav navbar-nav navbar-right">
                             <li class="dropdown">
                                 <a class="dropdown-toggle" data-toggle="dropdown" href="#">User
                                 <span class="caret"></span></a>
                                 <ul class="dropdown-menu">
                                     <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                                     <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                                 </ul>
                             </li>
                          
                         </ul>-->
                             
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @guest
        
                                <li><a class="" href="#" id="auth"
                                    onclick="document.getElementById('authentication').style.display='block'">Login Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <ul style="background-color: #708090" class="dropdown-menu" role="menu">
                                        <li >
                                            <a href="{{ route('logout') }}">
                                                <i class="fa fa-btn fa-sign-out"></i>Logout
                                            </a>
                
                                            <form id="logout-form" action="#" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
              
                       </div>
                   </nav>
                </div>
                </div>
                <br>
                <br><br><br><br><br><br><br>

              <!--Login Modal user -->
              
              <div id="authentication" class="w3-modal">
                      <span
                          onclick="document.getElementById('authentication').style.display='none'"
                          class="w3-closebtn w3-grey w3-hover-red w3-container w3-padding-16 w3-display-topright">X</span>
              
                      <div class="w3-modal-content w3-card-8 w3-animate-zoom"
                          style="max-width: 600px">
              
                          <div class="col-md-6 w3-card-8 w3-teal" onclick="openForm('Login')">
                              <h3>Sign In</h3>
                          </div>
                          <div class="col-md-6 w3-card-8 w3-teal"
                              onclick="openForm('Register')">
                              <h3>Sign Up</h3>
                          </div>
                          <div style="margin-top: 25px !important;">
                              <div id="Login" class="w3-container form">
                                  <div class="w3-container ">
                                      <div class="w3-section">
                                          <br> <br>@if (count($errors->login) > 0)
                                          <div class="alert alert-danger">
                                              <ul>
                                                  @foreach ($errors->login->all() as $error)
                                                  <P>{{ $error }}</p>
                                                  @endforeach
                                              </ul>
                                          </div>
                                          @endif 
                                          @if (Session::has('message'))
                                          <div class="alert alert-warning">{{ Session::get('message') }}</div>
                                          @endif
                                          <form action="{{ route('login') }}" method="post">
                                              {{ csrf_field() }} <input type="hidden" name="redirurl"
                                                  value="{{ $_SERVER['REQUEST_URI'] }}">
                                                  <input type="radio" name="choices" value="user" required>User<br>
                                                    <input type="radio" name="choices" value="seller" >Seller<br>
                                                   <label><b>Username</b></label>
                                              <input name="username"
                                                  class="w3-input w3-border w3-margin-bottom" type="text"
                                                  placeholder="Enter Username" required> <label><b>Password</b></label>
                                                  
                                              <input class="w3-input w3-border w3-margin-bottom"
                                                  name="password" type="password" placeholder="Enter Password"
                                                  required> <input type="submit"
                                                  class="w3-btn w3-btn-block w3-green" value="Login"> <input
                                                  class="w3-check w3-margin-top" type="checkbox"
                                                  checked="checked"> Remember me
                                          </form>
                                      </div>
                                  </div>
                                  <div class="w3-container w3-border-top w3-padding-16 ">
                                      <button
                                          onclick="document.getElementById('authentication').style.display='none'"
                                          type="button" class="w3-btn w3-red">Cancel</button>
                                      <span class="w3-right w3-padding w3-hide-small">Forgot <a href="#">password?</a></span>
                                  </div>
                              </div>
                          </div>
                          <div id="Register" class="w3-container form ">
                              <div class="w3-container">
                                  <div class="w3-section">
              
                                      <br> <br> 
                                      @if (count($errors->register) > 0)
                                      <div class="alert alert-danger">
                                          <ul>
                                              @foreach ($errors->register->all() as $error)
                                              <P>{{ $error }}</p>
                                              @endforeach
                                          </ul>
                                      </div>
                                      @endif
                                      <form action="{{ route('register')}} " method="POST" id="regForm">
                                          {{ csrf_field() }} <input type="hidden" name="redirurl"
                                              value="{{ $_SERVER['REQUEST_URI'] }}"> 
                                              <input type="radio" name="choices" value="user" required onclick="show1();">User<br>
                                            <input type="radio" name="choices" value="seller" onclick="show2();">Seller<br>
                                          <label><b>Email</b></label>
                                          <input class="w3-input w3-border w3-margin-bottom" type="text"
                                              name="email" placeholder="Enter Email"
                                              value="{{ old('email') }}" required>

                                              

                                              <div id="divUser" class="user">
                                                <label><b>Username</b></label>
                                                <input class="w3-input w3-border w3-margin-bottom" type="text"
                                                    name="name" placeholder="Enter username" required
                                                    value="{{ old('name') }}">
                                              </div>
                                               
                                          <label><b>Address</b></label>
                                          <input class="w3-input w3-border w3-margin-bottom" type="text"
                                              name="address" placeholder="Enter address" required
                                              value="{{ old('address') }}"> 
                                          
                                          <label><b>Phone</b></label>
                                          <input class="w3-input w3-border w3-margin-bottom" type="text"
                                              name="phone" placeholder="Enter phone" required
                                              value="{{ old('phone') }}">                                     
              
                                          <label><b>Password</b></label> 
                                          <input class="w3-input w3-border w3-margin-bottom" type="password"
                                              name="password" required placeholder="Enter Password"> 
                                          <label><b>Confirm Password</b></label>
                                          <input class="w3-input w3-border w3-margin-bottom" required
                                              type="password" name="password_confirmation"
                                              placeholder="Enter Password">
                                          <button type="submit" class="w3-btn w3-btn-block w3-green">SignUp</button>
                                      </form>
                                  </div>
                              </div>
                              <div class="w3-container w3-border-top w3-padding-16 ">
                                  <button
                                      onclick="document.getElementById('authentication').style.display='none'"
                                      type="button" class="w3-btn w3-red">Cancel</button>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="fluid-container"></div>
 
                  <script>	
              openForm("Login");
             
              function openForm(formName) {
                  
                  var x = document.getElementsByClassName("form");
                  for (i = 0; i < x.length; i++) {
                     x[i].style.display = "none";  
                  }
                  document.getElementById(formName).style.display = "block";  
              }

            //   function show1(){
            //     document.getElementById('divComp').style.display ='none';
            //     document.getElementById('divUser').style.display = 'block';
            //     }
            //     function show2(){
            //         document.getElementById('divUser').style.display ='none';
            //     document.getElementById('divComp').style.display = 'block';
            //     }
              </script>
              @if (Session::has('message'))
                  <script>  $('#auth').click(); </script>
                  @endif @if($errors->login->any())
                  <script>  $('#auth').click();</script>
                  @endif @if($errors->register->any())
                  <script>  $('#auth').click(); openForm('Register');</script>
                  @endif
              
        <!--end navbar-->
        
            @yield('content')
        
            
        <!-- start section  footer -->
        <div class="container-fluid">
            <section class="footer">
             <div class="row">
                 <div class="col-md-6">
                     <h3 style="margin-left: 30px">Sitemap</h3>
                     <ul class="list-unstyled three-columns" style="margin-left: 30px">
                         <li> Home</li>
                         <li> About</li>
                         <li> Account</li>
                         <li> Contact Us</li> 					
                     </ul>
                 </div>
                 <div class="col-md-6">
                     <h3>contact information</h3>
                     <div class="media">
                         
                         <div class="media-body">
                            <a href="https://www.googleplus.com/">	<li class="fa fa-google-plus fa-3x" style="padding: 10px"></li></a>
	<a href="https://www.facebook.com/">	<li class="fa fa-facebook fa-3x" style="padding: 10px"></li></a>
	<a href="https://www.twitter.com/"><li class="fa fa-twitter fa-3x" style="padding: 10px"></li></li></a>
	<a href="https://www.youtube.com/"><li class="fa fa-youtube fa-3x" style="padding: 10px"></li></a>
                         </div>
                     </div>
                 </div>
             </div>
            </section>
         </div>	
        <!-- end section  footer -->
        
    
    
       
    
            <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>   
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('js/custom.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css"></script>
            <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
            <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
            <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
            <script src="{{ asset('js/wow.min.js') }}"></script>
            <script>
    new WOW().init();
 </script>
            

 
    @yield('script')    
        
        </body>
    </html>
