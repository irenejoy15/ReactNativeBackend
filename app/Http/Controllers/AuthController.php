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

    public function register(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $hash_password = Hash::make($password);
        $checkEmail = User::where('email', $email)->first();
        if($checkEmail){
            return Response::json([
                'msg'=>'Email already exists',
                'errors' => 'Email already exists' ,
                'status' => false
            ], 401);
        }
        
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $hash_password
        ]);

        return Response::json([
            'msg'=>'User created successfully',
            'user'=>$user,
            'status' => true
        ], 200);
    }
}
