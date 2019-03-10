<?php

namespace App\Http\Controllers\ADmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Models\Category;
use App\Http\Requests\SavePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::paginate(10);
        // dd($posts);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePostRequest $request)
    {
        $posts= new Posts();
        $posts->title = $request->title;
        $posts->slug = $request->slug;
        $posts->content = $request->content;
        if ($request->hasFile('feature')) {
            $file  = $request->file('feature');
            $fileName = time().$file->getClientOriginalName();
            $file->storeAs('upload/posts',$fileName);
            $posts->feature = 'upload/posts/'.$fileName;
        }

        $posts->category_id = $request->category_id;
        $posts->save();
        session()->flash('notif','Thêm thành công bài viết .');
        return redirect()->route('posts.index');

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
        $categories = Category::all();
        $posts= Posts::find($id);
        return view('admin.posts.edit',compact('categories','posts'));
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
        $posts = Posts::find($id);
        $posts->title = $request->title;
        $posts->slug = $request->slug;
        $posts->content = $request->content;
        if ($request->hasFile('feature')) {
            $file  = $request->file('feature');
            $fileName = time().$file->getClientOriginalName();
            $file->storeAs('upload/posts',$fileName);
            $posts->feature = 'upload/posts/'.$fileName;
        }

        $posts->category_id = $request->category_id;
        $posts->save();
        session()->flash('notif','Thêm thành công bài viết .');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Posts::find($id);
        if (!$posts) {
            echo "<h1>Id không tôn tại</h1>";die;
        }
        $posts->delete();
        if (file_exists($posts->feature)) {
            unlink(public_path($posts->feature));
        }
        // session()->flash('notif','Xóa danh mục thành công!');
        return redirect()->back();
    }
    public function getCateName($id){
        $category = Posts::find($id)->category;
        dd($category);
    }
}
