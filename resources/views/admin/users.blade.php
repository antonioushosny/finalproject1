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
      <div class="panel-heading">All Users</div>
      <div class="panel-body">
            <table id="customers">
            <tr>
            
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
           
            <th class="text-center">Action</th>
        </tr>
        @foreach ($users as $user)
        
   
            <tr>
               
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->phone}}</td>
                
                <td class="text-center"> <a href="{{route('deleteuser',['id'=>$user->id])}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
           
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