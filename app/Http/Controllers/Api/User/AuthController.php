<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use GeneralTrait;

    public function login(Request $request)
    {

        try {
            $rules = [
                "email" => "required|exists:users,email",
                "password" => "required"

            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }

            //login

            $credentials = $request->only(['email', 'password']);

            $token = Auth::guard('user-api')->attempt($credentials);//Generate Token

            if (!$token)
                return $this->returnError('E001', 'بيانات الدخول غير صحيحة');

            $user = Auth::guard('user-api')->user();
            $user->api_token = $token;//return user +el Token
            return $this->returnData('user', $user);//return json response

        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function logout(Request $request)
    {
        $token = $request->header('auth-token');

        if($token){
            try{
            JWTAuth::setToken($token)->invalidate(); //logout
            } 
            catch(\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
             return $this->returnError('','some thing went wrong');
            }

         return $this ->returnSuccessMassage('loged out successfully');

        }
        else{
           $this ->returnError('','some thing went wrong');
        }
    }
}
