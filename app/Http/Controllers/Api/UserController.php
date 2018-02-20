<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->content = array();
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){
        //var_dump(['email' => $request->input('aio_email'), 'password' => $request->input('aio_password')]);exit;
        if(Auth::attempt(['email' => request('aio_email'), 'password' => request('aio_password')])){
        
            $user = Auth::user();
            $this->content['token'] =  $user->createToken('AllinOne')->accessToken;
            $status = 200;
        
        }else{
            
            $this->content['error'] = "Unauthorised";
            $status = 401;

        }

        return response()->json($this->content, $status);    
    }

        /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        $this->content['exit'] = "Success";
        $status = 200;

        return response()->json($this->content, $status);
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function get_currentUserDetails()
    {
        return response()->json(['user' => Auth::user()]);
    }
}
