<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Rol;
use App\Models\Repository;
use App\Models\Rol_Repository;
use App\Models\Type_User;
use URL;
use Auth;
use AllinOne;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.main');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        return response()->json(['user' => 'user']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function auth()
    {
        return view('dashboard.login');
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function start_session(Request $request)
    {
        if(Auth::attempt(['email' => $request->input('aio_email'), 'password' => $request->input('aio_pass')])) {
            // Authentication passed...    
            //return redirect()->intended('/');
            return redirect('');
        }else{
            return redirect('/login')->with('status', '¡Cuenta no valida!');
        }
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function close_session()
    {
        Auth::logout();

        return redirect()->guest('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
