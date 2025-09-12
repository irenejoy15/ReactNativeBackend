<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Response;
use Carbon\Carbon;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        $password = $request->input('password');
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if (Hash::check($password, $user->password)):
            $token =  $user->createToken(
                'ReactNative'.'_'.Carbon::now(),
                ['*'],
                Carbon::now()->addDays(1)
            )->plainTextToken; 
            $cookie = cookie('token', $token, 60 * 24); // 1 day
            $response = Response::json([
                'user'=>$user,
                'userId'=>$user->id,
                'idNumber'=>$user->idNumber,
                'token'=>$token,
                'authorization' => 'Bearer '.$token,
            ], 200)->withCookie(cookie('token',$token));
            return $response;
        else:
            return Response::json([
                'msg'=>'Password does not match',
                'errors' => 'Password does not match' ,
                'status' => true
            ], 401);
        endif;
    }
}
