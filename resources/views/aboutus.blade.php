@extends('layouts.index')

@section('content')

@foreach($abouts as $about)

<h1 class="text-center">{{$about->con_type}}</h1>
<br><br>
<h6 class="text-center">{{$about->con_value}}</h6>
<hr>


<div class="text-center">
	
		<br><br><br>

	
	<a href="https://www.googleplus.com/">	<li class="fa fa-google-plus fa-3x" style="padding: 10px"></li></a>
	<a href="https://www.facebook.com/">	<li class="fa fa-facebook fa-3x" style="padding: 10px"></li></a>
	<a href="https://www.twitter.com/"><li class="fa fa-twitter fa-3x" style="padding: 10px"></li></li></a>
	<a href="https://www.youtube.com/"><li class="fa fa-youtube fa-3x" style="padding: 10px"></li></a>
	</div>


@endforeach
@endsection