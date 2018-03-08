@extends('layouts.index')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!--start section contact us-->
<section class="contact_us text-center">
	<div class="fields">
		<div class="container">
			<div class="row">
				<i class="fa fa-headphones fa-5x"></i>
				<h1>Tell us what you fell</h1>
				<!--start contact form-->
				<form role="form" class="col-md-6" style="padding: 20px" method="POST" action="{{ route('contact') }}">
                      
                        {{ csrf_field() }}
                        <input type="hidden" value="  {{ csrf_token() }}">
				    
						<div class="form-group">
							<input  type="text" class="form-control input-lg" placeholder="Username" name="name">
						</div>
						<div class="form-group">
							<input  type="email" class="form-control input-lg"  placeholder="Email" name="email">
						</div>
						<div class="form-group">
							<input  type="text" class="form-control input-lg"  placeholder="title" name='subject'>
						</div>
					
						<div class="form-group">
							<textarea class="form-control input-lg" placeholder="your Message" name='body'></textarea>
							<button class="btn btn-primary btn-lg btn-block" type="submit">contact us</button>
						</div>
					
				</form>

				<div class="col-md-6">
				

					<hr style="width: 50%">
				<a href="https://www.googleplus.com/">	<li class="fa fa-google-plus fa-3x" style="padding: 10px"></li></a>
				<a href="https://www.facebook.com/">	<li class="fa fa-facebook fa-3x" style="padding: 10px"></li></a>
				<a href="https://www.twitter.com/"><li class="fa fa-twitter fa-3x" style="padding: 10px"></li></li></a>
				<a href="https://www.youtube.com/"><li class="fa fa-youtube fa-3x" style="padding: 10px"></li></a>
				</div>
				<!--end contact form-->

	       </div>
		</div>
	</div>
</section>
<!--end section contact us-->
@endsection