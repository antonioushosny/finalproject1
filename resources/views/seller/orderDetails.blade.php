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
    <div class="row">
    <div class="col-md-12">
    <div class="panel panel-success panel-shadow">
      <div class="panel-heading">Order Details Of User</div>
      <div class="panel-body">
        
            <table id="customers">
                  <tr>
                    <th><h3>Quantity</h3></th>
                    <th><h3>Price</h3></th>
                    <th><h3>Serial Number</h3></th>
                    <th><h3>Color</h3></th>
                    <th><h3>Size</h3></th>
                    
                  </tr>
                  @foreach($order_details as $order_detail)
                  <tr>
                    <td>{{ $order_detail->quan }}</td>
                    <td>{{ $order_detail->price }}</td>
                    <td>{{ $order_detail->serial_num }}</td>
                    <td>{{ $order_detail->color_name }}</td>
                    <td>{{ $order_detail->size_name }}</td>
                  </tr>
                  @endforeach
                  
                
                  
            </table>

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection