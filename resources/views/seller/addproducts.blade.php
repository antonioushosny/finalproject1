@extends('seller.index')
@section('style')
<style>
.panel-shadow {
    box-shadow: 0 8px 10px 1px rgba(0, 0, 0, .14), 0 3px 14px 2px rgba(0, 0, 0, .12), 0 5px 5px -3px rgba(0, 0, 0, .2);
}
.form-control{
      background-color: #e4e3da;
}
</style>
@endsection
@section('content')
<div id="messages"></di>
<h1 class="text-center">Add Product:</h1>
<form  action="{{ route('storeproduct') }}" id="add-form" enctype="multipart/form-data" method="POST" class="form-horizontal" onkeypress="return event.keyCode != 13;">
  
  {{ csrf_field() }}

  
 
<input type="hidden" value="{{Auth::guard('seller')->user()->id}}" name="comp_id">
  <div class="row">
  
    <div class="col-md-12">
      <div class="panel panel-success panel-shadow">
        <div class="panel-heading">Main Details About Product</div>
        <div class="panel-body">
          <div class="row">
            <!-- -->
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="control-label col-sm-2" for="style">Style:</label>
                <div class="col-sm-10">
                  <select class="form-control" id="style" name="style_id" required >
                    <option value="" >choose style:</option>
                    @foreach($styles as $style)
                      <option value={{$style->id}}>{{$style->style_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
             <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="control-label col-sm-2" for="material">Material:</label>
                <div class="col-sm-10">
                  <select class="form-control" id="material" name="mater_id" required>
                    <option value="" >choose material:</option>
                    @foreach($materials as $material)
                      <option value={{$material->id}}>{{$material->mater_name}}</option>
                    @endforeach
                    </select>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="control-label col-sm-2" for="serial">Serial:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="serial" name="product_serial_num" placeholder="Enter serial For Product">
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="control-label col-sm-2" for="price">Price:</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="price" name="product_price" placeholder="Enter price For Product" required  min="0"  step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$">
                </div>
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="control-label col-sm-3" for="desc">Descirption:</label>
                <div class="col-sm-9">
                  <textarea rows="4" cols="50" class="form-control" id="desc" name="product_desc" placeholder="Enter Descirption For Product"></textarea>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="control-label col-sm-2" for="sale">Sale:</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="sale" name="product_price_sale" placeholder="Enter sale For Product" min="0"  step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$">
                </div>
              </div>      
                <div class="form-group">
                  <div style="position:relative;">
                      <a class='btn btn-primary' href='javascript:;'>
                        Choose File...
                        <input type="file" multiple name="product_image[]" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                      </a>
                      &nbsp;
                      <span class='label label-info' id="upload-file-info"></span>
                    </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                <label class="control-label col-sm-1" for="tag">Tags:</label>
                <div class="col-sm-11">
                  <input type="text" value="" data-role="tagsinput" id="tag" name="tag_word" placeholder="Add tags" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>    
    </div>
   
  </div>
  <!-- for dresses and shirts -->
  {{--  {{$categ_name}}  --}}

  @if($categ_name == "Shirts" or $categ_name == "Dresses") 
  <div class="row" id="shirts">
    <div class="col-md-12">
      <div class="panel panel-warning panel-shadow">
        <div class="panel-heading">for dresses and shirts</div>
        <div class="panel-body">
          <div class="row">
            <!-- -->
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="control-label col-sm-2" for="sleeve">Sleeve Length:</label>
                <div class="col-sm-10">
                  <select class="form-control" id="sleeve" name="sleeve" required>
                  <option value=""></option>
                  @foreach($sleeve_values as $sleeve)
                    <option value="{{$sleeve->id}}">{{$sleeve->sleeve}}</option>
                  @endforeach
                  </select>
                </div>
              </div>
            </div>

             <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="control-label col-sm-2" for="length">Length:</label>
                <div class="col-sm-10">
                  <select class="form-control" id="length" name="length" required>
                  <option value=""></option>
                  @foreach($length_values as $length)
                    <option value="{{$length->id}}">{{$length->length}}</option>
                  @endforeach
                  </select>
                </div>
              </div>
            </div>

          </div>
          <div class="row">
            <!-- -->
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="control-label col-sm-2" for="neck">Neck Style:</label>
                <div class="col-sm-10">
                  <select class="form-control" id="neck" name="neck" required>
                  <option value=""></option>
                  @foreach($neck_values as $neck)
                    <option value="{{$neck->id}}">{{$neck->neck}}</option>
                  @endforeach
                  </select>
                </div>
              </div>
            </div>

             <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="control-label col-sm-2" for="occassion">Occasion:</label>
                <div class="col-sm-10">
                  <select class="form-control" id="occassion" name="occassion" required>
                  <option value=""></option>
                  @foreach($occassion_values as $occassion)
                    <option value="{{$occassion->id}}">{{$occassion->occassion}}</option>
                  @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div> 
    </div>   
  </div>
@endif  
  <!-- for colors and sizes -->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-warning panel-shadow">
        <div class="panel-heading">Add Featurs</div>
        <div class="panel-body">
          <div class="row">           

            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="control-label col-sm-2" for="color">Color:</label>
                <div class="col-sm-10">
                  <select class="form-control" id="color" name="color_id" required>
                    <option value="">choose color:</option>
                    @foreach($colors as $color)
                      <option value={{$color->id}} style="color:{{$color->color_name}};">{{$color->color_name}} </option><div style="background-color:{{$color->color_name}}; width:1em; heigh:1em;"></div>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label class="control-label col-sm-2" for="sizes">Sizes:</label>
                <div class="col-sm-10">
                  @foreach($sizes as $size)
                    <label class="checkbox-inline"><input type="checkbox" name="size[]" value="{{$size->id}}">{{$size->size_name}}</label>
                  @endforeach
                </div>  
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="sizes">Quantity:</label>
                <div class="col-sm-10">
                  @foreach($sizes as $size)
                   <input type="number" name="quan[]" style="width:3.3em;">
                   
                  @endforeach
                </div>
              </div>
            </div>
            <div class="pull-right ">
              <input type="submit" id="storeproduct" value="submit" class="btn btn-success csenter" width="100%">
            </div>
          </div>
            
          
        </div>
      </div> 
    </div>   
  </div>
  

</form>



@endsection

@section('script')


<script>

$("#add-form").submit(function(){
    formulario =  $("#add-form");
      url =  "http:://MyDomin/sendContacto";
        $.ajax({
            method: "POST",
            url: url,
            data: formulario.serialize()
        })
        .done(function( response ) {
            msg = ' <div class="alert alert-success" role="alert">'+arrMsgs[lang]["message_send"]+'</div>';
            $("#messages").append(msg);
        });
})


{{--  $('form').ajaxForm(function() 

   {

    alert("Uploaded SuccessFully");

   });  --}}

    {{--  $('#style').change(function() {
        if ($(this).val() === '1') {
            alert("hjgjhghjg");
             $("#shirts").append('<b>Appended text</b>')
        }
    });  --}}



</script>
</script>
@endsection
