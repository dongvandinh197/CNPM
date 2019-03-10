@extends('layouts.massive')
@section('content')
@foreach ($posts as $post)
    <div class="col-md-4">
    <div class="post-single">
        <ul class="post-cat">
            <li><a href="#">Shop</a>
            </li>
            <li><a href="#">Orders</a>
            </li>
        </ul>
        <div class="post-img">
            <a href="#">
                <img width="230px" src="{{asset($post->feature)}}" alt="">
            </a>
        </div>
        <div class="post-desk">
            <h4 class="text-uppercase">
                <a href="blog-single.html">{{$post->category->name}}</a>
            </h4>
            <div class="date">
                <a href="#" class="author">martin smith {{$post->id}}</a> july 29, 2015
            </div>
            <p>
                {{str_limit($post->title,60)}}
            </p>
            <a href="blog-single.html" class="p-read-more">Read More <i class="icon-arrows_slim_right"></i></a>
        </div>
    </div>
</div>
@endforeach

<div class="col-md-12 ">
    <!--pagination-->
    <div style="margin: auto;width:400px;">
        {{$posts->links()}}
    </div>
    <!--pagination-->
</div>
@endsection