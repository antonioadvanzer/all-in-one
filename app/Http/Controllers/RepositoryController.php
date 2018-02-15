<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Rol;
use App\Models\Repository;
use App\Models\Rol_Repository;
use App\Models\Type_User;
use DB;
use URL;
use File;
use Auth;
use AllinOne;

class RepositoryController extends Controller
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
    public function get_listRepositoryTable()
    {
        $repositories = Repository::all();

        return view('repository.list_repositories', ["repositories" => $repositories]);
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
    public function get_newRepositoryForm()
    {
        $roles = Rol::all();
        return view('repository.new_repository', ["roles" => $roles]);
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
    public function store_newRepository(Request $request)
    {   
        DB::beginTransaction();
        
        try{
            
            /*if ($request->hasFile('re-icon')) {
                dd("No");
            }*/
            
            $icon = $request->file('re-icon');
            $filename = $icon->getClientOriginalName();
            
            $data = [
                'name' => $request->input('re-name'),
                'icon' => $filename,
                'path' => AllinOne::createFolderName($request->input('re-name'))
            ];

            $nr = Repository::create($data);

            $upload_success = $icon->move(AllinOne::$path_icons_repositories, $filename);

            $path = AllinOne::$path_name_repositories."/".$data['path'];

            $directory = File::makeDirectory($path, 0777);

            Rol_Repository::create([
                'rol' => $request->input('re-rol'),
                'repository' => $nr->id
            ]);

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
