<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Session;
use Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(10);
        return view('manage.users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.users.create');
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
         ]);

        if($request->has('password') && !empty($request->password))
        {
            $password = $request->password;
        }
        else{
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $str = '';
            $max = mb_strlen($alphabet,'8bit') - 1;
            for($i=0;$i<10;$i++)
            {
                $str .= $alphabet[random_int(0,$max)];
            }
            $password = $str;
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);
        if($user->save()){
            return redirect(route('users.show',$user->id));
        }
        else
        {
            Session::flash('danger','An error occured while saving user details');
            return redirect('user.create');
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
        $user = User::findorFail($id); // return 403 error if not found
        return view("manage.users.show",["user"=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorFail($id);
        return view("manage.users.edit",["user"=>$user]);
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
            'name'=>'required|max:225',
            'email'=>'required|email|unique:users,email,'.$id //unique email but ignore the current id
        ]);
        $user = User::findorFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password_options == 'auto'){
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $str = '';
            $max = mb_strlen($alphabet,'8bit') - 1;
            for($i=0;$i<10;$i++)
            {
                $str .= $alphabet[random_int(0,$max)];
            }
            $user->password = Hash::make($str);
        }elseif($request->password_options == 'manual'){
            $user->password = Hash::make($request->password);
        }


        if($user->save()){
            return redirect()->route('users.show',$id);
        }
        else{
            Session::flash('error','There was a problem with saving these detials');
            return redirect()->route('users.edit',$id);
        }
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
