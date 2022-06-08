<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function sendSms(Request $request){
        $_code = rand(000000,999999);
        error_log($_code);
        $this->send($request->number);
        return response([
            'message' => 'success',
            'number' => $request->number,
            'code' => $_code,
        ]);

    }

    private function send($number)
    {
        //Code
    }
    public function checkSms(Request $request){
        if($request->userCode == $request->originCode){
            
            $user = User::where('email', $request->number)->first();
            if($user){
                //dd($user->password);
                return $this->login($user->email,'123');

            }
            return $this->register($request->number,'123');
        }

        return response([
            'message' => 'false'
        ]);

    }

    public function register($email, $password){
        $user = User::create([
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        return response([
            'message' => 'true',
            'user' => $user,
            'token' => $user->createToken('secret')->plainTextToken
        ]);
    }

    public function login($email, $password){

        if(!Auth::attempt(['email' => $email, 'password' => $password])){
            return response([
                'message' => 'Invalid credentials'
            ]);
        }

        return response([
            'message' => 'true',
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ]);

    }
}
