<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Request;
use Session;

use App\Category;
use App\Style;
use App\Product;
use App\Group;

//use App\Http\Request;

use App\Cart;
use App\User;
use App\Order;

//use Cart;
use Auth;
use DB;

use App\OrderDetails;

class CartController extends Controller
{
    public function getIndex(){
  // $product=array();
    $products=Product::all();
    //$lastproduct=Product::find(1);
   // $product->products->get();
    return view('welcome',['products'=>$products]);
 }
//////////////////////

function getaddtocart(Request $request,$id){
  $product=Product::find($id);
  
 $oldCartt=Session::has('cartt') ? Session::get('cartt') : null;
 $cart=new Cart($oldCartt);    
 $cart->add($product,$product->id,$product->product_price);

 $request->Session()->put('cartt',$cart);
//dd($request->Session()->get('cartt'));

 return redirect()->route('product');
}

function shoppingcart(){

  if(!Session::has('cartt')){

    $groups =Group::with('categories')->get();
      return view('user.product.shoppingcart',['products'=> null,'groups'=>$groups]);
  }
  $groups =Group::with('categories')->get();

  $oldCartt=Session::get('cartt');
  $cart=new Cart($oldCartt);
  return view('user.product.shoppingcart',['groups'=>$groups,'products'=> $cart->items,'totalPrice'=>$cart->totalPrice]);
}

public function getRemoveItem($id){

 $oldCartt=Session::has('cartt') ? Session::get('cartt') : null;
 $cart=new Cart($oldCartt);    
 $cart->removeItem($id);
 Session::put('cartt',$cart);


 return redirect()->route('shoppingcart');

}


// public function getupdateItem($id){

//   $oldCartt=Session::has('cartt') ? Session::get('cartt') : null;
//   $cart=new Cartt($oldCartt);    
//   $cart->updateItem($id);

//   Session::put('cartt',$cart);
 
  
//     return redirect()->route('shoppingcart');
 
// }




public function getcheckout(Request $request){
  //$comments = App\Post::find(1)->comments()->where('title', 'foo')->first();
 // $users=Order::find(1)->User;
 $users=User::with('orders')->get();
//dd($users);
$groups =Group::with('categories')->get();
  if(!Session::has('cartt')){
    $groups =Group::with('categories')->get();
    return view('user.product.shoppingcart',['groups'=>$groups]);
  }

  $oldCartt=Session::get('cartt');
  
  $cart=new Cart($oldCartt);
  $total=$cart->totalPrice;
  

//    $quntaty=$cart->items;
 
 
 
// foreach($quntaty as $q){
//   echo($q['qty']);
// }
   
//  // dd($quntaty);
//  $orders=Order::with('users')->select('orders.id')->get();
//  $order_user=DB::table('orders')
//  ->join('users','orders.user_id','=','users.id')
//  ->select('orders.id')
//  ->latest('orders.id')->first();
//  $a=dd($order_user->id);
 
//  //echo($orders[0]['id']);
 
  
//   foreach($quntaty as $key=>$q){
//   echo($q['item']['product_quan']);
//   echo($q['item']['product_price']);
//   echo($q['item']['id']);
  
//   echo($orders);
 

//   }
//  // $orders=Order::with('orderDetails')->get();
//    $orders=OrderDetails::with('orders')->get();
 
//echo($orders[0]['id']);

// each($orders);
  // dd($orders);
  // $neworder=new Order();

  // $neworder->order_price=$request->$total;[]
  // $neworder->user_id=1;

   return view('user.product.checkout',['groups'=>$groups,"total"=>$total,"users"=>$users]);
    
   


}
public function postcheckout(){
  if(!Session::has('cartt')){
    return view('user.product.shoppingcart');
  }

  $oldCartt=Session::get('cartt');
  $cart=new Cart($oldCartt);
  $total=$cart->totalPrice;
  $quntaty=$cart->items;

  DB::table('orders')->insert([
    ['order_price' =>$total, 'user_id' =>Auth::id()]
]);

$orders=Order::with('users')->select('orders.id')->get();
$order_user=DB::table('orders')
->join('users','orders.user_id','=','users.id')
->select('orders.id')
->latest('orders.id')->first();
$order_id= $order_user->id;


//echo($orders[0]['id']);

 
 foreach($quntaty as $key=>$q){
// $qu=($q['item']['product_quan']);
$qu=$q['qty'];
 $price=($q['item']['product_price']);
 $product_id=($q['item']['id']);

 
 DB::table('order_details')->insert([
  ['product_color_size_id' =>1, 'order_id' =>$order_id,'order_details_quan' =>$qu, 'order_details_price' =>$price]
]);


 }


 Session::forget("cartt");

 return redirect()->route("product")->with('success',"successfuly purched product");

}


//////////////////////////////////////////////////////////////////////////


// public function addtocart(Request $request){
//    $prod=$request->productid;
//    $prodbyid=Product::where('id',$prod)->first();

//  Cart::add([
//       "id"=>$prod,
//       "price"=>$prodbyid->product_price,
//       "qty"=>$prodbyid->style_id,
//       "name"=>$prodbyid->product_name,
//   ]);

//   return redirect()->route('product');
// }

// public function cartshow(){

//   $cartproducts=Cart::Content();

 

//   return view("user.product.showcart",['cartproducts'=>$cartproducts]);

// }









// // public function cartupdate(Request $request){

// //  $qty=$request->input('newQty');
// //  return $qty ; 

  
// // }






//  public function deletecart($rowId){

//   Cart::remove($rowId);

//   return  redirect('showcart.blade')->with("msg","deleted");
  


// }
////////////////////////////

}