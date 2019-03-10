<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Category;
use App\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key ="";
        if (isset($_GET['key'])) {
            $key = $_GET['key'];
        }
        $posts= Posts::where('title', 'like', '%'.$key.'%')
        ->paginate(21);
        // dd($post);
        return view('web.home',compact('posts'));
    }
    public function dang_ki(){
        return view('auth.register');
    }
    public function register(Request $request){
        $users= new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->role = 10;
        if ($request->hasFile('image')) {
            $file  = $request->file('image');
            $fileName = time().$file->getClientOriginalName();
            $file->storeAs('upload/users',$fileName);
            $users->image = 'upload/users/'.$fileName;
        }
        $users->save();
        session()->flash('notif','Thêm thành công admin.');
        return view('auth.login');
    }
}
