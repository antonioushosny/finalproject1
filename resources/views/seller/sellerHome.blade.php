@extends('seller.index')
@section('content')
<style>
h2{
        padding-left: 20px
      }

      table {
        margin-bottom: 20px;
        margin-top: 20px;
      }
      #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

      #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #FFB6C1;
                color: white;
            }
            .hg{
              color:SlateBlue;
            }
    </style>

    <div class="container">
    <div class="row" style="margin-top: 40px;margin-bottom: 30px">
        <h1 class="hg wow bounceIn text-center"> welcome {{ Auth::guard('seller')->user()->name }}</h1> 
  <button type="button" class="c btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="margin-left: 40px">Your Statistics</button>
                      
        
    </div>
    <div class="row">
    <div class="col-md-12">
    <div class="panel panel-success panel-shadow">
      <div class="panel-heading">Users Of Orders Today</div>
      <div class="panel-body">
            <table id="customers">
                  <tr>
                    <th><h3>Email</h3></th>
                    <th><h3>Name</h3></th>
                    <th><h3>Address</h3></th>
                    <th><h3>Phone</h3></th>
                    <th><h3>Order Details</h3></th>
                    
                  </tr>
                  @foreach($users as $user)
                  <tr>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->phone }}</td>
                   
                  
                    <td>
                    <form action="{{ route('orderDetails') }}" method="POST">
                    {{ csrf_field() }}
                    <input  type="hidden" value= "{{$user->id}}" id="user_id" name="id">
                    <button type="submit" class="btn btn-info btn-lg" style="margin-left: 40px">Order Details</button>
                    </form>
                    </td>

                  </tr>
                  @endforeach
                  
                
                  
            </table>

    </div>
    </div>
    </div>
    </div>
  <!-- Trigger the modal with a button -->
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <h3 style="color:#31b0d5">Numbers Of Products &nbsp; :&nbsp; 
              <span style="color:black; font-size:22px ">{{$product_num}} &nbsp; EGP</span></h3>
              <h3 style="color:#31b0d5">Statistics Of Today ({{$today}}) &nbsp; :&nbsp; 
              <span style="color:black; font-size:22px ">{{$salesToday}} &nbsp; EGP</span></h3>
              <h3 style="color:#31b0d5">Statistics Of Current Year ({{$year}}) &nbsp; :&nbsp; 
              <span style="color:black; font-size:22px ">{{$salesCurrentYear}}&nbsp; EGP</span></h3>
              <h3 style="color:#31b0d5">Statistics Of Last Year &nbsp; :&nbsp; 
              <span style="color:black; font-size:22px ">{{$salesLastYear}}&nbsp; EGP</span></h3>
              <h3 style="color:#31b0d5">Statistics Of Current Month ({{$month}}) &nbsp; :&nbsp; 
              <span style="color:black; font-size:22px ">{{$salesCurrenttMonth}}&nbsp; EGP</span></h3>
              <h3 style="color:#31b0d5">Statistics Of Last Month &nbsp; :&nbsp; 
              <span style="color:black; font-size:22px ">{{$salesLastMonth}}&nbsp; EGP</span></h3>
              <h3 style="color:#31b0d5">All Statistics &nbsp; :&nbsp; 
              <span style="color:black; font-size:22px ">{{$Allsales}}&nbsp; EGP</span></h3>
              
            </div>
            <div class="modal-footer">
              <button type="button" id="submit" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
  </div> 
</div>


@endsection
@section('script')
<!-- <script>
        $(document).ready(function() {
    $('#submit').on('submit', function (e) {
        e.preventDefault();
       var user_id=$('#user_id').val();(
       alert(user_id);
        $.ajax({
            type: "POST",
            url:  '/orderDetails',
            data: user_id,
            success: function( data ) {
                $("#ajaxResponse").append("<div>"++data.msg+"</div>");
            }
        });
    });
}); 
      </script> -->
@endsection
