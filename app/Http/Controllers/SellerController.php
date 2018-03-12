<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use App\Color;
use App\Category;
use App\Style;
use App\Group;
use App\Product;
use App\Size;
use Auth;
use App\Product_colors;
use App\Product_color_sizes;
use DB;
//use Illuminate\Http\Response;


//use Illuminate\Database\Eloquent\Builder;

class SellerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('seller');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // SELECT SUM(order_details.order_details_price)
        // FROM order_details
        // JOIN products ON products.id=order_details.product_id
        // JOIN sellers ON sellers.id=products.comp_id
        // WHERE sellers.id=1
        
        $date = \Carbon\Carbon::now();
        $month=$date->format('F');
        $today= Carbon::today()->toDateString();
        $year=$date->format('Y');
    
        $id_seller=Auth::guard('seller')->user()->id;

        $Allsales=DB::table('order_details')
        ->join('product_color_sizes','product_color_sizes.id','=','order_details.product_color_size_id')
        
        ->join('product_colors','product_color_sizes.product_colors_id','=','product_colors.id')
        ->join('products','products.id','=','product_colors.product_id')
        ->join('sellers','sellers.id','=','products.comp_id')
        ->where('sellers.id',$id_seller)
        ->sum('order_details.order_details_price');
        
        
        
         $salesLastMonth=DB::table('order_details')
        
         ->join('product_color_sizes','product_color_sizes.id','=','order_details.product_color_size_id')
         ->join('product_colors','product_color_sizes.product_colors_id','=','product_colors.id')
         ->join('products','products.id','=','product_colors.product_id')
         ->join('sellers','sellers.id','=','products.comp_id')
         ->where('sellers.id',$id_seller)
         ->whereMonth('order_details.created_at', '=',(date('m')-1))
        // ->where('order_details.created_at', '<=', Carbon::now()->subMonth())
         ->sum('order_details.order_details_price');
       
         $salesCurrenttMonth=DB::table('order_details')
         ->join('product_color_sizes','product_color_sizes.id','=','order_details.product_color_size_id')
         
         ->join('product_colors','product_color_sizes.product_colors_id','=','product_colors.id')
         ->join('products','products.id','=','product_colors.product_id')
         ->join('sellers','sellers.id','=','products.comp_id')
         ->where('sellers.id',$id_seller)
         ->whereMonth('order_details.created_at', '=',date('m'))
        // ->where('order_details.created_at', '<=', Carbon::now()->subMonth())
         ->sum('order_details.order_details_price');

         $salesLastYear=DB::table('order_details')
         ->join('product_color_sizes','product_color_sizes.id','=','order_details.product_color_size_id')
        
         ->join('product_colors','product_color_sizes.product_colors_id','=','product_colors.id')
         ->join('products','products.id','=','product_colors.product_id')
         ->join('sellers','sellers.id','=','products.comp_id')
         ->where('sellers.id',$id_seller)
         ->whereYear('order_details.created_at', '=',(date('Y')-1))
        // ->where('order_details.created_at', '<=', Carbon::now()->subMonth())
         ->sum('order_details.order_details_price');

         $salesCurrentYear=DB::table('order_details')
         ->join('product_color_sizes','product_color_sizes.id','=','order_details.product_color_size_id')
         
         ->join('product_colors','product_color_sizes.product_colors_id','=','product_colors.id')
         ->join('products','products.id','=','product_colors.product_id')
         ->join('sellers','sellers.id','=','products.comp_id')
         ->where('sellers.id',$id_seller)
         ->whereYear('order_details.created_at', '=',date('Y'))
        // ->where('order_details.created_at', '<=', Carbon::now()->subMonth())
         ->sum('order_details.order_details_price');

         $salesToday=DB::table('order_details')
         ->join('product_color_sizes','product_color_sizes.id','=','order_details.product_color_size_id')
         
         ->join('product_colors','product_color_sizes.product_colors_id','=','product_colors.id')
         ->join('products','products.id','=','product_colors.product_id')
         ->join('sellers','sellers.id','=','products.comp_id')
         ->where('sellers.id',$id_seller) 
         ->where('order_details.created_at', '=', $today)
         //->whereDate('order_details.created_at', '=', Carbon::today()->toDateString())
        // ->where('order_details.created_at', '<=', Carbon::now()->subMonth())
         ->sum('order_details.order_details_price');
         //dd($salesToday);

         $salesToday=DB::table('order_details')
         ->join('product_color_sizes','product_color_sizes.id','=','order_details.product_color_size_id')
         
         ->join('product_colors','product_color_sizes.product_colors_id','=','product_colors.id')
         ->join('products','products.id','=','product_colors.product_id')
         ->join('sellers','sellers.id','=','products.comp_id')
         ->where('sellers.id',$id_seller)
         ->whereDay('order_details.created_at', '=',date('d'))
        // ->where('order_details.created_at', '<=', Carbon::now()->subMonth())
         ->sum('order_details.order_details_price');
         

        
/////////return users
            $users=DB::table('users')
            ->join('orders','orders.user_id','=','users.id')
            ->join('order_details','order_details.order_id','=','orders.id')
            ->join('product_color_sizes','product_color_sizes.id','=','order_details.product_color_size_id')
            ->join('product_colors','product_color_sizes.product_colors_id','=','product_colors.id')
            ->join('products','products.id','=','product_colors.product_id')
            ->select('users.name AS name','users.email AS email','users.address AS address','users.id AS id','users.phone AS phone')
            ->where('products.comp_id',$id_seller)
            ->where('order_details.created_at',$today)
            ->distinct()->get();
            //dd($users);

            
           
            

///////return order details

        
      
        // dd($order_datails);
        
            // $name=session('name');
            // $seller=Seller::where('name','=',$name)->get();
            // Product::where(['comp_id'=>1])
            // select count(*) FROM products 
            // WHERE products.comp_id=1
            $product_num=DB::table('products')
            ->where('comp_id','=', $id_seller)->count();

        return view('seller.sellerHome',compact('product_num','salesToday','salesCurrentYear',
        'salesLastYear','salesCurrenttMonth','salesLastMonth','Allsales','month','year','today',
    'users','order_datails'));
    }

    
    public function orderDetails(Request $request)
    {
        //dd('dddd');
        $id_seller=Auth::guard('seller')->user()->id;
      $order_details=DB::table('sizes')
    ->join('product_color_sizes','sizes.id','=','product_color_sizes.size_id')
    ->join('product_colors','product_colors.id','=','product_color_sizes.product_colors_id')
    ->join('products','product_colors.product_id','=','products.id')
    ->join('colors','colors.id','=','product_colors.color_id')
    ->join('order_details','order_details.product_color_size_id','=','product_color_sizes.id')
    ->join('orders','order_details.order_id','=','orders.id')
    ->select('order_details.order_details_quan AS quan','order_details.order_details_price AS price',
    'products.product_serial_num AS serial_num','colors.color_name AS color_name','sizes.size_name AS size_name')
    ->where('products.comp_id',$id_seller)
    ->where('orders.user_id','=',$request->id)
    ->get();
    // $user=DB::table('users')
    // ->select('users.name AS name')
    // ->where('users.id','=',$request->id)
    // ->get();
    //dd($order_details);
    return view('seller.orderDetails',compact('order_details'));
    //return response()->json(['order_details'=> $order_details]);
    }
    
  

}
