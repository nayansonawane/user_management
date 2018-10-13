<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\RoleUserModel;

use Crypt;
use Validator;
use Session;
use DB;

class UserController extends Controller
{
    public function __construct(
                                    UserModel $user_model,
                                    RoleModel $role_model,
                                    RoleUserModel $role_user_model
                                )
    {
    	$this->UserModel = $user_model;
    	$this->RoleModel = $role_model;
    	$this->RoleUserModel = $role_user_model;

    	$this->user_profile_base_img_path   = public_path().'/uploads/';
        $this->user_profile_public_img_path = url('/').'/uploads/';

        $this->arr_view_data = [];
    }

    public function index(Request $request)
    {
    	$arr_users = [];

    	$obj_users =  $this->UserModel
			    				->with('role_user_details.role_details')
                                ->whereHas('role_user_details.role_details',function ($query) {
                                    $query->where('role_slug','!=','admin');
                                })
                                ->orderBy('id','DESC')
			    				->get();

		if(count($obj_users) > 0)
		{
			$arr_users = $obj_users->toArray();
		}

    	$this->arr_view_data['arr_users'] = $arr_users; 
    	return view('admin.users.manage',$this->arr_view_data);
    }

	public function create(Request $request)
    {	
    	$arr_roles = []; 
    	return view('admin.users.create',$this->arr_view_data);
    }

    public function store(Request $request)
    {
    	$arr_rules['name']          = "required|max:255";
        $arr_rules['email']         = "required|email";
        $arr_rules['mobile_number'] = "required|min:6|max:16";
        $arr_rules['country']       = "required";
        $arr_rules['dob']           = "required";

        $validator = Validator::make($request->all(),$arr_rules);

        if($validator->fails())
        {
            Session::flash('error','Please fill valid information.');
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        /* Check for email duplication */
        $does_exists = $this->UserModel
                            ->where('email','=',$request->input('email'))
                            ->count();   
        if($does_exists)
        {
            Session::flash('error','User with entered email already exists.');
            return redirect()->back()->withInput($request->all());
        }    

        $dob = $request->input('dob');
        $dob = str_replace('/', '-', $dob);
        $dob = date('Y-m-d', strtotime($dob));

    	$arr_insert = [];
    	$arr_insert['name'] 	    = $request->input('name');
    	$arr_insert['mobile_number']= $request->input('mobile_number');
    	$arr_insert['email'] 		= $request->input('email');
    	$arr_insert['country'] 		= $request->input('country');
        $arr_insert['dob']          = $dob;
    	$arr_insert['password']     = Crypt::encrypt('123456');

    	if($request->has('about'))
    	{
    		$arr_insert['about'] = $request->input('about');
    	}    	
	
		DB::beginTransaction();

    	$obj_status = $this->UserModel->create($arr_insert);

    	if($obj_status)
    	{	
    		$user_id = $obj_status->id;

    		$arr_role_user = [];

    		$arr_role_user['user_id'] = $user_id;
    		$arr_role_user['role_id'] = '1';

    		$obj_role_status = $this->RoleUserModel->create($arr_role_user);

    		if($obj_role_status)
    		{
    			DB::commit();
    			Session::flash('success','User created successfully.');
                return redirect('/user');
    		}
    		else
    		{		
    			DB::rollback();
    			Session::flash('error','Problem occured while creating user.');		
    		}
    	}
    	else
    	{
    		Session::flash('error','Problem occured while creating user.');
    	}

        return redirect()->back();   	
    }

    public function edit($id)
    {   
        $arr_roles = [];

        $arr_user = $this->UserModel
                            ->where('id','=',$id)
                            ->first();

        if(count($arr_user) <= 0 ) {
            Session::flash('error','User not found.');
            return redirect()->back();
        }

        $arr_user = $arr_user->toArray();
        $arr_user['dob'] = isset($arr_user['dob']) ? date('d/m/Y', strtotime($arr_user['dob'])):'';

        $this->arr_view_data['arr_user'] = $arr_user;
        return view('admin.users.edit',$this->arr_view_data);
    }

    public function update(Request $request)
    {
        $arr_rules['name']          = "required|max:255";
        $arr_rules['email']         = "required|email";
        $arr_rules['mobile_number'] = "required|min:6|max:16";
        $arr_rules['country']       = "required";
        $arr_rules['dob']           = "required";

        $validator = Validator::make($request->all(),$arr_rules);

        if($validator->fails())
        {
            Session::flash('error','Please fill valid information.');
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        /* Check for email duplication */
        $does_exists = $this->UserModel
                            ->where('email','=',$request->input('email'))
                            ->where('id','!=',$request->input('user_id'))
                            ->count();
        if($does_exists)
        {
            Session::flash('error','User with entered email already exists.');
            return redirect()->back()->withInput($request->all());
        }    

        $dob = $request->input('dob');
        $dob = str_replace('/', '-', $dob);
        $dob = date('Y-m-d', strtotime($dob));

        $arr_insert = [];
        $arr_insert['name']         = $request->input('name');
        $arr_insert['mobile_number']= $request->input('mobile_number');
        $arr_insert['email']        = $request->input('email');
        $arr_insert['country']      = $request->input('country');
        $arr_insert['dob']          = $dob;

        if($request->has('about'))
        {
            $arr_insert['about'] = $request->input('about');
        }       
    
        $obj_status = $this->UserModel
                                ->where('id','=',$request->input('user_id'))
                                ->update($arr_insert);

        if($obj_status)
        {  
            Session::flash('success','User updated successfully.');
            return redirect()->back();
        }
        else
        {
            Session::flash('error','Problem occured while updating user.');
        }

        return redirect()->back();      
    }
}