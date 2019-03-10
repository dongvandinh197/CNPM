<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Posts;
use App\User;

class DashboardController extends Controller
{
    public function index(){
    	$post = Posts::all();
    	$user = User::all();
    	$categories = Category::all();
    	return view('admin.dashboard',compact('post','user','categories'));
    }
    // public function showUsers(){
    // 	$users = DB::table('users')->count();
    // 	// $posts = DB::table('posts')->count();
    // 	return view('admin.dashboard', compact('users'));
    // }
}
