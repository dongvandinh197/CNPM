<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\SaveUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // dd(Auth::user()->role);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveUserRequest $request)
    {
        $users = new User();
        $users->fill($request->all());
        $users->password = bcrypt($request->password);
        $users->save();

        return redirect()->route('users.index');
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
        $users= User::find($id);
        if($users->role == 20){
            return view('admin.403');
        }
        else if($users->role == 50){
            return view('admin.users.edit',compact('users'));
        }
        
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
        $users = User::find($id);
        $users->fill($request->all());
        $users->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        if (!$users) {
            echo "<h1>User không tôn tại</h1>";die;
        }
        $users= User::find($id);
        if($users->role == 20){
            return view('admin.403');
        }
        else if($users->role == 50){
            $users->delete();
            session()->flash('notif','Xóa danh mục thành công!');
            return redirect()->route('users.index');
        }
        
    }
    public function getProfile($id){
        $profile = User::find($id)->profile;
        $user = User::find($id);
        // dd($user);
        return view('admin.users.profiles.index',compact('profile','user'));
    }
}
