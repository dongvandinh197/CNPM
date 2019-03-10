<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\SaveCategoryRequest;
class CategoryController extends Controller
{
    public function index(){
    	$categories= Category::all();
    	return view('admin.categories.index',compact('categories'));
    }
    public function create(){
    	return view('admin.categories.create');
    }
    public function store(SaveCategoryRequest $request){
    	$model = new Category();
    	$model->name = $request->name;
    	$model->slug = str_slug($request->name).'.html';
    	session()->flash('notif','Thêm danh mục thành công!');
    	$model->save();
    	return redirect()->route('categories.index');
    	
    }
    public function edit($id){
    	$categories = Category::find($id);

    	return view('admin.categories.edit',compact('categories'));
    }
    public function update(Request $request,$id){
    	$model =Category::find($id);


    	$model->name = $request->name;
    	$model->slug= $request->slug;
    	session()->flash('notif','Sửa danh mục thành công!');
    	$model->save();

    	return redirect()->route('categories.index');
    }
    public function destroy($id){
        if (Auth::user()->role < 50) {
            return view('admin.403');
        }
    	$model = Category::find($id);
    	if (!$model) {
    		echo "<h1>Id không tôn tại</h1>";die;
    	}
    	$model->delete();
    	session()->flash('notif','Xóa danh mục thành công!');
    	return redirect()->route('categories.index');
    }
    public function getpost($id){
        $posts = Category::find($id)->posts;
        dd($posts);
    }
}
