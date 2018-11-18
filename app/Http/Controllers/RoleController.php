<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('manage.roles.index',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('manage.roles.create',['permissions'=>$permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:100|alpha_dash|unique:roles,name', // unique in roles database in name column
            'display_name' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        $roles = new Role();
        $roles->name = $request->name;
        $roles->display_name = $request->display_name;
        $roles->description = $request->description;
        $roles->save();

        if($request->permissions){
            $roles->permissions()->sync(explode(',',$request->permissions));
        }

        Session::flash('success', 'successfully added the '.$request->display_name.' role');
        return redirect()->route('roles.show',$roles->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   // find or fail doesn't work with "WITH" hence we use a with statement
        $roles = Role::where('id',$id)->with('permissions')->first(); // we need to use get in with to get an object collection instead of a query builder object
        return view('manage.roles.show',['roles'=>$roles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   // find or fail doesn't work with "WITH" hence we use a with statement
        $roles = Role::where('id',$id)->with('permissions')->first(); // we need to use get or first in with to get an object collection instead of a query builder object
        $permissions = Permission::all();
        //dd([$roles,$permissions]); // For debugging use DieDump
        return view('manage.roles.edit',['roles'=>$roles,'permissions'=>$permissions]);
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
            'display_name' => 'required|max:225',
            'description' => 'required|max:225'
        ]);

        $role = Role::findorfail($id);
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        if($request->permissions){
            $role->permissions()->sync(explode(',',$request->permissions)); // sync setups the given id's in array with the table if id exists it is pushed if not then removed
        }

        Session::flash('success', 'successfully updated the '.$request->display_name.' role');
        return redirect()->route('roles.show',$id);
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
