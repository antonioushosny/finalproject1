<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Group;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $product=array();

            $groups =Group::with('categories')->get();
            $products= Product::with('style')->get();  

            //$lastproduct=Product::find(1);
            // $product->products->get();
            return view('welcome',['groups'=>$groups,'products'=>$products]);
           
    }

    public function imagesUpload()

    {

        return view('imagesUpload');

    }



    

    public function imagesUploadPost(Request $request)

    {

        request()->validate([

            'uploadFile' => 'required',

        ]);



        foreach ($request->file('uploadFile') as $key => $value) {

            $imageName = time(). $key . '.' . $value->getClientOriginalExtension();

            $value->move(public_path('images'), $imageName);
            

        }



        return response()->json(['success'=>'Images Uploaded Successfully.']);

    }
}



