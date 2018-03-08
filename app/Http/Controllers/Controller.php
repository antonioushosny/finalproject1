<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request; 
use App\Group;
use App\Contact;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getcontact(){

        $groups =Group::with('categories')->get();
        return view("contact",['groups'=>$groups]);
            }
        
        
        
        public function postcontact(Request $request){
         //dd($request);
         
         $this->validate($request,[
             'name'=>'required|regex:/^[a-zA-Z ]+$/',
            'email'=>'required|unique:contacts|email',
            'subject'=>'required|regex:/^[a-zA-Z ]+$/',
            'body'=>'required|min:8',
            
            
        ]);
        $contact=new Contact();
            $contact->name=$request->name;
            $contact->email=$request->email;
            $contact->subject=$request->subject;
            $contact->body=$request->body;
          
          
            $contact->save();
        
            return redirect('/');
            
           
          //  $contact=DB::table('contact_us')->select('id','name','email','subject','body')->get();
           // 
            }
        
            public function about(Request $request){
                $groups =Group::with('categories')->get();
                $abouts=DB::table('about_us')->select('con_type','con_value')->get();
                $arr=array('abouts'=>$abouts);
                 return view('aboutus',['abouts'=>$abouts,'groups'=>$groups]);
                  
                   }
}
