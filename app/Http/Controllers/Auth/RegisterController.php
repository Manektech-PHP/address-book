<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use \Redirect;
use App\AdminPrivileges;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }
	
	public function index(){
		$title = "Register";
		return View::make('auth.register',['title'=>$title]);
	}
	public function store(Request $request){
		 $r = $request->all();
		 print_r($r);exit;
		 $user = new User();
		$user_res = $user->where('email',$r['email'])->get()->toArray();
		if(!empty($user_res)):
			$message = 'Already Admin';
			return Redirect::back()->withErrors([$message]);
		endif;
			
			$user = User::create([
            'name' => $r['name'],
            'email' => $r['email'],
            'password' => Hash::make($r['password']),
			'role' => $r['role'],
            'status' => 'Active',
        ]); 
		$lastid = $user->id;
		$created_by = Auth::user()->id;
			if($user->role == 'SuperAdmin'){
				$prv =  AdminPrivileges::create([
				'admin_id' => $lastid,
				'addData' => 1,
				'editData' => 1,
				'deleteData' => 1,
				'viewData' => 1,
				'status' => 'Active',
				'created_by' => $created_by,
			]);
			}
			else if($user->role == 'Admin'){
				$prv =  AdminPrivileges::create([
				'admin_id' => $lastid,
				'addData' => 1,
				'editData' => 0,
				'deleteData' => 0,
				'viewData' => 1,
				'status' => 'Active',
				'created_by' => $created_by,
			]);
			}
	    $arr = array("msg"=>"Admin Created","status"=>200); 
		return \Response::json($arr);
	}

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
		return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
		 return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]); 
		
    }
	
}
