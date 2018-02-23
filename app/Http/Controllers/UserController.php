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
use DB;
use AllinOne;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_listUserTable()
    {
        $users = User::all();

        return view('user.list_users', ["users" => $users]);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_newUserForm()
    {
        $type_users = Type_User::orderBy('id','desc')->get();
        $roles = Rol::all();

        return view('user.new_user', 
                    ["type_users" => $type_users,
                    "roles" => $roles]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_newUser(Request $request)
    {
        DB::beginTransaction();

        try{
            
            $photo = $request->file('nu-photo');
            $filename = $photo->getClientOriginalName();

            $tu = $request->input('nu-typeUser') == 1;

            $data = [
                'name' => $request->input('nu-name'),
                'photo' => $filename,
                'email' => $request->input('nu-email'),
                'password' => bcrypt($request->input('nu-password')),
                'type_user' => $request->input('nu-typeUser'),
                'employed' => $tu ? 1 : $request->input('nu-isEmployed'),
                'rol' => $tu ? 1 : $request->input('nu-rol')
            ];

            User::create($data);

            $photo->move(AllinOne::$path_profile_photos, $filename);

        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
        }

        DB::commit();

        return 'success';
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
