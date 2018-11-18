<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('manage.permissions.index', ['permissions'=>$permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->permission_type == 'basic')
        {
            $this->validate($request,[
                'display_name' => 'required|max:255',
                'slug' => 'required|max:255|alpha_dash|unique:permissions,name', //alphadash means alpha numeric including dashesh and underscores
                'description' => 'required|max:255'
                ]);

            $permissions = new Permission;
            $permissions->display_name = ucwords($request->display_name);
            $permissions->name = strtolower($request->slug);
            $permissions->description = ucwords($request->description);
            $permissions->save();
            
            Session::flash('success','Permission has been successfully added');
            return redirect()->route('permissions.index');
        }
        elseif($request->permission_type == 'crud')
        {
            $this->validate($request,[
                'resource' => 'required|min:3|alpha'
                ]);
            $crud = explode(',',$request->crud_selected);
            foreach($crud as $access)
            {
                $aname = strtolower($access."-".$request->resource);
                $adisplay_name =  ucwords($access." ".$request->resource); // every word uppercase
                $adescription = "Allows user to ". strtoupper($access)." a ".ucwords($request->resource);
                
                $permissions = new Permission;
                $permissions->display_name = $adisplay_name;
                $permissions->name = $aname;
                $permissions->description = $adescription;
                $permissions->save();
            }
            Session::flash('success','Permission has been successfully added');
            return redirect()->route('permissions.index');
        }
        else{
            Session::flash('failed','There was a problem with adding the permission please try again.');
            return redirect()->route('permissions.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permissions = Permission::findorFail($id);
        return view('manage.permissions.show',['permissions'=>$permissions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::findorFail($id);
        return view('manage.permissions.edit',['permissions'=>$permissions]);
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
        $this->validate($request,[
            'display_name' => 'required|max:255',
            'description' => 'required|max:255'
        ]);
        $permissions = Permission::findorFail($id);
        $permissions->display_name = ucwords($request->display_name);
        $permissions->description = ucwords($request->description);
        $permissions->save();
        return redirect()->route('permissions.index');
    }
}
