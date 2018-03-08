@extends('admin.index')
@section('content')
<style>

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
</style>

    <div class="row col-xs-12 custyle">
    <div class="row">
    <div class="col-md-12">
    <div class="panel panel-success panel-shadow">
      <div class="panel-heading">All Sellers</div>
      <div class="panel-body">
            <table id="customers">
            <tr>
            
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Active</th>
            <th class="text-center">Delete</th>
            <th class="text-center">Edit</th>
        </tr>
        @foreach ($sellers as $seller)
        
   
            <tr>
               
                <td>{{$seller->name}}</td>
                <td>{{$seller->email}}</td>
                <td>{{$seller->address}}</td>
                <td>{{$seller->phone}}</td>
                <td>{{$seller->is_active}}</td>
                <td class="text-center"> <a href="{{route('deleteseller',['id'=>$seller->id])}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
                <td class="text-center"> <a href="{{route('editseller',['id'=>$seller->id])}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
            <!-- <td>
        
                    <form action="{{ route('sellerActive') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="checkbox">
                    <label><input type="checkbox" value="{{$seller->id}}">active </label>
                    </div>
                    <!-- <input  type="hidden" value= "" id="seller_id" name="id"> -->
                    <!-- <button type="submit" class="btn btn-info btn-lg" style="margin-left: 40px"></button>
                    </form>
                    </td> --> 

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