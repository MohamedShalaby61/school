<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth; 


class UserController extends Controller
{

	public $successStatus = 200;

       public function login(Request $request){ 
        
	        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
	            $user = Auth::user(); 
	            $success['id'] =  $user->id; 
	            $success['name'] =  $user->name; 
	            $success['email'] =  $user->email; 
	            return response()->json(['user' => $success], $this->successStatus); 
	        } 
	        else{ 
	            
	            return response()->json(['message'=>'please check your email and password'], 401); 
	        } 
       }

       public function register(Request $request){
          
          $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|unique:users', 
            'password' => 'required', 
            'c_password' => 'required|same:password',
            'role_id' => 'required|integer',
          ]);

          if ($validator->fails()) {
            return response()->json(['data'=>null,'message'=>$validator->messages()->first()], 401);            
          }else{
          	$input = $request->all();
          	$input['password'] = bcrypt($input['password']);
          	$user = User::create($input);
          	$success['name']  =  $user->name;
	          $success['id']    =  $user->id;
            $success['role_id']    =  $user->role_id;
	          $success['email'] =  $user->email;
            return response()->json([ 'data'=>$success,'message' =>'' ], $this->successStatus); 

          }




      }

      


}
