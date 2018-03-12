<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use App\Seller;
use Hash;
use Auth;
use Redirect;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;

class MainController extends Controller {

	use AuthenticatesUsers;
public function login(Request $request) {
	if($request->get('choices')=='user')
	{
		
		$rules = array (
				
				'username' => 'required',
				'password' => 'required' 
		);
		$validator = Validator::make ( Input::all (), $rules );
		if ($validator->fails ()) {
			return Redirect::back ()->withErrors ( $validator, 'login' )->withInput ();
		} else {
			if (Auth::attempt ( array (
					
					'name' => $request->get ( 'username' ),
					'password' => $request->get ( 'password' ) 
			) )) {
				session ( [ 
						
						'name' => $request->get ( 'username' ) 
				] );
				if(Auth::user()->is_admin==1)
				{
					return redirect('/admin');
				}
				return Redirect::back ();
			} else {
				Session::flash ( 'message', "Invalid Credentials , Please try again." );
				return Redirect::back ();
			}
		}
	}
		if($request->get('choices')=='seller')
		{
			//dd('seller');
				$rules = array (
					
					'username' => 'required',
					'password' => 'required'
			);
			$validator = Validator::make ( Input::all (), $rules );
			if ($validator->fails ()) {
				return Redirect::back ()->withErrors ( $validator, 'login' )->withInput ();
			} else {
				if (Auth::guard('seller')->attempt(['name' => $request->username, 'password' => $request->password])) {
					// if successful, then redirect to their intended location redirect()->intended(route('seller'));
					//add col is_active
					return redirect('seller')->with('name', $request->username);
				  }
				  else {
					Session::flash ( 'message', "Invalid Credentials , Please try again." );
					return Redirect::back ();
				}
				}

				
			
			
				
			
		}
		
	}
	public function register(Request $request) {
		if($request->get('choices')=='user')
		{
			$rules = array (
					'email' => 'required|unique:users|email',
					'name' => 'required|unique:users|alpha_num|min:4',
					'password' => 'required|min:6|confirmed' ,
					'phone'=>'required|min:11|numeric|min:11',
					'address'=>'required|string|max::200'
			);
			$validator = Validator::make ( Input::all (), $rules );
			if ($validator->fails ()) {
				return Redirect::back ()->withErrors ( $validator, 'register' )->withInput ();
			} else {
				$user = new User ();
				$user->name = $request->get ( 'name' );
				$user->email = $request->get ( 'email' );
				$user->address = $request->get ( 'address' );
				$user->phone = $request->get ( 'phone' );
				$user->password = Hash::make ( $request->get ( 'password' ) );
				$user->remember_token = $request->get ( '_token' );
				
				$user->save ();
				return Redirect::back ();
			}
		}


		/////register seller
		if($request->get('choices')=='seller')
		{

		$rules = array (
			'email' => 'required|unique:sellers|email',
			'name' => 'required|unique:sellers|alpha_num|min:4|max:255',
			'password' => 'required|min:6|confirmed' 
		);
		$validator = Validator::make ( Input::all (), $rules );
		if ($validator->fails ()) {
			return Redirect::back ()->withErrors ( $validator, 'register' )->withInput ();
		} else {
			// $comp=new Company();
			// $comp->company_name=$request->get ( 'name' );
			// $comp->save();
			//$comp = Company::create(request(['company_name']));

			$seller = new Seller ();
			$seller->name = $request->get ( 'name' );
			$seller->email = $request->get ( 'email' );
			$seller->address = $request->get ( 'address' );
			$seller->phone = $request->get ( 'phone' );
<<<<<<< HEAD
			//$seller->comp_id=1;
=======
<<<<<<< HEAD
			//$seller->comp_id=1;
=======
>>>>>>> af756aadcad135af9a5829ba4c6aa7757f8258e3
>>>>>>> d27ebbfe66574657bc3b17df458d0ad9e5eaab21
			$seller->password = Hash::make ( $request->get ( 'password' ) );
			$seller->remember_token = $request->get ( '_token' );
			
			$seller->save();

			//auth()->login($seller);
			return Redirect::back ();
		}
		}
	}
	public function logout() {
		Session::flush ();
		Auth::logout ();
		return Redirect::back ();
	}
	
    /*public function getUserLogin()
    {
        return view('userLogin');
    }
    public function userAuth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->user();
            dd($user);
        }else{
            dd('your username and password are wrong.');            
        }
    }*/
}
