@extends('layouts.admin')
@section('header')
	<h1>Chỉnh sửa danh mục sản phẩm</h1>
@endsection

@section('content')
	<form action="{{ route('categories.update',['id'=>$categories->id])}}" method="post" id="cate-form">
		{{csrf_field()}}
		<div class="form-group" {{ $errors->has('name') ? ' has-error' : '' }}>
			<label for="">Tên Danh mục </label>
			<input type="text" name="name" class="form-control" placeholder="Nhập tên ..." value="{{$categories->name}}">
			@if ($errors->has('name'))
                <span class="help-block">
                    <strong style="color:red;">{{ $errors->first('name') }}</strong>
                </span>
            @endif
		</div>
		<div class="form-group" {{ $errors->has('slug') ? ' has-error' : '' }}>
			<label for="">Đường dẫn </label>
			<input type="text" name="slug" value="{{$categories->slug}}" class="form-control" placeholder="Nhập đường dẫn ...">
			@if ($errors->has('slug'))
                <span class="help-block">
                    <strong style="color:red;">{{ $errors->first('slug') }}</strong>
                </span>
            @endif
		</div>
		<div class="form-group">
			<button class="btn btn-success" type="submit">Sửa</button>
		</div>

	</form>
@endsection

{{-- @section('js')
	<script>
		$(document).ready(function(){
			$('#cate-form').validate({
				rules:{
					name:{
						required: true,
						minlength: 6
					},
					// slug :"required"
				},
				messages:{
					name:{
						required: "Vui lòng nhập tên danh mục.",
						minlength : "Nhập tối thiểu 6 kí tự"
					},
					// slug : {
					// 	required :"Vui lòng nhập đường dẫn."
					// }
				}
			});
		});
	</script>
<@endsection> --}}