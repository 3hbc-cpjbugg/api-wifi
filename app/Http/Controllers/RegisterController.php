<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\ConfigSite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\JsonResponse;
   
class RegisterController extends BaseController
{
    
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request): JsonResponse
    {   

    
      
      


        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
            $success['name'] =  $user->name;
            $success['user'] =  $user;
            $success['roles'] = $user->roles->pluck('name');
            $success['configuration'] = ConfigSite::find(1);
   
            return $this->sendResponse($success, 'Inicio de sesión correcto');
        } 
        else{ 



            return $this->sendError('Unauthorised.', ['error'=>$request->all()]);
        } 
    }
}