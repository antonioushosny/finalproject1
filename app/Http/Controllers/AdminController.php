<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\User;
    use App\Seller;
    use App\Product;
    class AdminController extends Controller
    {

       
        public function getIndex(){
           
              
              //$arr=array('users'=>$users);
              
              $sellers=Seller::all();
              //$arr=array('sellers'=>$sellers);
              return view('admin.sellers',compact('users','sellers'));
            //return view('admin.admin_show',$arr);
           }

           public function sellerActive(Request $request)
           {

           }
    
           
           
           public function deleteuser($id){
        
            $users=User::find($id)->delete();
            
       
            
            return redirect('showadmin');
         }
    
    
         /////sellers
    
         public function getusers(){
           
            $users=User::all();
            
            return view('admin.users',compact('users'));
         }
    
         public function deleteseller($id){
        
            $sellers=Seller::find($id)->delete();
            
       
            
            return redirect('admin.sellers');
         }
    
    
        
    
         public function adminsetting(){
        
            $product=Product::all()->count();
            $seller=Seller::all()->count();
            $user=User::all()->count();
       
          // $arr=array('product'=>$product);
          // dd($arr);
           return view('admin.admin_setting',['product'=>$product,'user'=>$user,'seller'=>$seller]);
         }
    
         public function editseller($id){
          
              $users=Seller::find($id);
              
         
              
              return view('seller.edit');
           }
    }
    

