@extends('layouts.index')
@section('style')
<style>
h3.accordion-header {
        margin-bottom: -4px;
}
.accor-content{
    
     overflow-y: scroll;
     width:170px;
    height:100px;
}
.accor-content-cond{
    
}
.divaccor{
    height:700px;
}


.ui-accordion .ui-accordion-content {
    padding: 1em 0.2em;}

div.accor-content ul{
    list-style-type: none;
}
div.accor-content li
{
    margin-left: -37px;
}
span.fa-circle{
    
    font-size: 40px;
    
}

</style>
@endsection
@section('content')
 <!-- start Hotest products-->
  <div class="container">
        <h1 style="margin-top: 30px">Hotest Products</h1>
        @foreach ($products->chunk(4) as $productchunk)
        <div class="row">
            @foreach ($productchunk as $product)
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="slider-item">
                    <div class="slider-image" style="width:100%;height:100%">
                        <img  src="{{asset('images/'.$product->images->toArray()[0]['img_name'])}}" class="img-responsive" alt="a" />
                        <div class="middle">
                            <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#Quikviewmodal-{{ $product->id }}" data-id="{{ $product->id }}">Quik Show</button>
                        </div>
                        
                        
                    </div>
                    <div class="slider-main-detail">
                        <div class="slider-detail">
                            <div class="product-detail">
                                <h5>styel:{{ $product->style->style_name }}</h5>
                                 @if($product->product_price_sale >= 1)<h5 class="detail-price"></h5>Price:<del style="color:red">{{$product->product_price}} EGP</del> {{$product->product_price_sale}} EGP</h5>@endif
                                 @if($product->product_price_sale < 1)<h5 class="detail-price"></h5>Price:{{$product->product_price}}  EGP</h5>@endif
                            </div>
                        </div>
                        <div class="cart-section">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-6 review">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-6">
                                       <a href="{{route('addtocartt',['id'=>$product->id])}}" class="AddCart btn btn-info"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
<div id="Quikviewmodal-{{ $product->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content" style="margin-left:-10em; width:60em">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <div class="p_content">
                    <div class="row"> 
                         <div class="col-sm-4 ">
                            <div class="carousel slide media-carousel" id="media">
                              <div class="carousel-inner">
                            @foreach ($product->images as $key => $image)
                                <div class="item{{ $key == 0 ? ' active' : '' }}">              
                                      <a class="thumbnail" href="#"><img alt="" src="{{asset('images/'.$image->img_name)}}"></a>
                                </div>
                            @endforeach    
                                <div class="item">
                                 <a class="thumbnail" href="#"><img alt="" src="{{asset('img/images.jpg')}}"></a>
                                </div>
                                <div class="item">
                                  <a class="thumbnail" href="#"><img alt="" src="{{asset('img/images.jpg')}}"></a>
                                </div>
                              </div>
                              <a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                              <a data-slide="next" href="#media" class="right carousel-control">›</a>
                            </div>                          
    
                      

                          </div>
                
                          <div class="col-sm-4 cente ctr">
                            <p class='popprise text-left'>{{$product->product_price}}EGY <p>
                           
                            <hr>   
                            <p class="text-left popdetails">Color-Size</p>
                            @foreach($product->colors as $color)
                                <p class="text-left popdetails">{{$color->color_name}}</p>
                                 @foreach($color->sizes as $size)
                                    <label class="checkbox-inline" style="font-size:.7em;"><input type="radio" name="size" value="{{$size->id}}">{{$size->size_name}}</label>
                                @endforeach
                                 <label style="font-size:.7em;"></label>Quantity:</label><input type="number" name="quan" style="width:2em; height:2em;">
                            @endforeach
                            <hr>   
  
                            <div>
                              <span class="redd"></span>
                              <span class="bluee"></span>
                            </div>
                            <hr>
                            <p class="text-left prodmain popprise">PRODUCT INFORMATION:</p>
                            <ul class="list text-justify ulsize" style="font-size:.7em">
                                @if($product->product_price_sale >= 1)<li >Price:<del style="color:red">{{$product->product_price}} EGP</del> {{$product->product_price_sale}} EGP</li>@endif
                              @if($product->product_price_sale < 1)<li ></li>Price:{{$product->product_price}}  EGP</h5>@endif
                              <li >Price:{{$product->style->style_name}}</li>
                              <li >Price:{{$product->product_desc}}</li>
                            
                            </ul>
                          </div>
                          <div class="col-sm-4 right">
                            <div class="place">
                              <p class="text-left small">
                                shiped to <span> cairo </span>(<a href="#">change</a>)
                              </p>
                              <p class="text-left small"> deliverd at </p>
                            </div>
                            <a href="#" class="btn btn-success addtocart"> ADD TO CART</a>
                            
                          </div>
                          <!--......... end right.......-->
                      </div> 
                             <!--......... end row.......-->





                    <!--................-->
                  </div>
            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
      
        </div>
      </div>
  
    <!-- end quik view modal-->
            @endforeach
        </div>
        <br>

    @endforeach
</div>
@endsection
@section('script')


<script>
jQuery('#accordion').accordion({ collapsible:true, active:false, autoHeight:         false, disabled:true});
jQuery('#accordion h3.accordion-header').click(function(){
      jQuery(this).next().slideToggle();
});
jQuery('.accordion').click(function(){
      jQuery('#accordion h3.accordion-header').next().slideDown();
});
        </script>        
   <script>
    var slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
    }
    </script>
@endsection

