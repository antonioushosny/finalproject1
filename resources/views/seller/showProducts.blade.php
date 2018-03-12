@extends('seller.index')
@section('style')
<style>
    .panel-heading {
        padding: 0;
    }
    .panel-heading ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }
    .panel-heading li {
        float: left;
        border-right:1px solid #bbb;
        display: block;
        padding: 14px 16px;
        text-align: center;
    }
    .panel-heading li:last-child:hover {
        background-color: #ccc;
    }
    .panel-heading li:last-child {
        border-right: none;
    }
    .panel-heading li a:hover {
        text-decoration: none;
    }

    .table.table-bordered tbody td {
        vertical-align: baseline;
    }

    .panel-shadow {
        box-shadow: 0 8px 10px 1px rgba(0, 0, 0, .14), 0 3px 14px 2px rgba(0, 0, 0, .12), 0 5px 5px -3px rgba(0, 0, 0, .2);
    }
</style>
@endsection
@section('content')

<h2 class="text-center">Manage products</h2>
<br />
<div class="panel panel-default panel-shadow">
    <div class="panel-heading">
        <ul>
            <li><i class="fa fa-file-text-o"></i> All the current products</li>
            <a href="{{ route('addproduct',array('categ_name'=>$categ_name,
            'group_name'=>$group_name)) }}"
                class="btn btn-info">Add a prroduct</a>
        </ul>
    </div>

    <div class="panel-body">

        <table class="table table-striped table-bordered table-hover table-responsive" id="productTable">
            <thead>
                <tr>
                    <th valign="middle">#</th>
                    <th>Serial Num</th>
                    <th>Style </th>
                    <th>Description </th>
                    <th>Material</th>
                    <th>Product Price</th>
                    <th>Price after sale</th>  
                    <th>Last updated</th>
                    <th>Actions</th>
                </tr>
                {{ csrf_field() }}
            </thead>
            <tbody>
                @foreach($products as $indexKey => $product)
               @if($product->style->category->categ_name == $categ_name)
                        <tr class="item">
                            <td class="col1">{{ $indexKey+1 }}</td>
                            <td>{{$product->product_serial_num}}{</td>
                            <td>{{$product->style->style_name}}</td>
                            <td>{{$product->product_desc}}</td>
                            <td>{{$product->material->mater_name}}</td>
                            <td>{{$product->product_price}}</td>
                            <td>{{$product->product_price_sale}}</td>
                            
                            
                                <td></td>
                            <td>
                                <button class="show-modal btn btn-success">
                                <span class="glyphicon glyphicon-eye-open"></span> </button>

                                
                                <a href="{{ route('editproduct',array('id'=>$product->id,'categ_name'=>$categ_name,'group_name'=>$group_name)) }}"class="btn btn-info glyphicon glyphicon-edit"></a>

                                

                                <button class="delete-modal btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span> </button>
                            </td> 
                        </tr>
                @endif
                @endforeach
                
            </tbody>
        </table>

    </div>
</div>
@endsection

@section('script')

@endsection
