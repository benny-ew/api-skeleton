<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Constants\Permission  as Permit;
use Spatie\Permission\Models\Permission;


class AuthController extends BaseController
{
    
    private function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'message' => $message,
            'data'    => $result,
        ];


        return response()->json($response, 200);
    }


    private function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
    
    public function register(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), 400);       
        }

        $input = $request->all();
        $input['id'] = (string) Str::orderedUuid();
        $input['password'] = bcrypt($input['password']);


        $user = User::create($input);

        $success['name'] =  $user->name;
   
        return $this->sendResponse($success, 'User registered successfully.');

    }

    public function login(Request $request)
    {
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 

            $user = Auth::user(); 
            if (!$user->email_verified_at==null && $user->active){

                $success['token'] =  $user->createToken('ByrnApp')-> accessToken; 
                $success['name'] =  $user->name;
                $success['id'] =  $user->id;
                $success['email'] =  $user->email;

                $permissions = $user->getAllPermissions();
                $permissionsList = array();
        
                foreach ($permissions as $permission) {
                    $permissionsList[] = $permission->name;
                }

                $success['permissions'] =  $permissionsList;

                $roles = $user->getRoleNames();
                
                $rolesList = array();
                foreach ($roles as $role) {
                    $rolesList[] = $role;
                }

                $success['roles'] =  $rolesList;
                //$success['companyId'] = $user->getCompanyId();
                //$success['companyName'] = $user->getCompanyName();

                $user->last_login = now();
                $user->save();

                return $this->sendResponse($success, 'User login successfully.');
            } else {
                return $this->sendError('Unauthorised.', ['error'=>'This User does not exist, check your details'], 400);
            }
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'This User does not exist, check your details'], 400);
        }

    }

    public function logout()
    {
        $user = Auth::user()->token();
        $user->revoke();
        return 'logged out';    
    }

    /**
     * validate token
     */
    public function isValidLogin(){

        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();

            $success['id'] = $user->id;
            $success['name'] = $user->name;
            $success['email'] = $user->email;

            $permissions = $user->getAllPermissions();
            $permissionsList = array();
    
            foreach ($permissions as $permission) {
                $permissionsList[] = $permission->name;
            }
            $success['permissions'] =  $permissionsList;

            $roles = $user->getRoleNames();
                $rolesList = array();
                foreach ($roles as $role) {
                    $rolesList[] = $role;
                }

            $success['roles'] =  $rolesList;

            $success['companyId'] = $user->getCompanyId();
            $success['companyName'] = $user->getCompanyName();


            return $this->sendResponse($success, 'Token is valid');
        }

        return $this->sendError('Unauthorised.', ['error'=>'This token is not valid'], 400);
    }
}
