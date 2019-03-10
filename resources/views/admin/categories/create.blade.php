@extends('layouts.admin')
@section('header')
	<h1>Thêm mới danh mục sản phẩm</h1>
@endsection

@section('content')
	<form action="{{ route('categories.store') }}" method="post" id="cate-form">
		{{csrf_field()}}
		<div class="form-group" {{ $errors->has('name') ? ' has-error' : '' }}>
			<label for="">Tên Danh mục </label>
			<input type="text" name="name" class="form-control" placeholder="Nhập tên ..." value="{{old('name')}}">
			@if ($errors->has('name'))
                <span class="help-block">
                    <strong style="color:red;">{{ $errors->first('name') }}</strong>
                </span>
            @endif
		</div>
		{{-- <div class="form-group">
			<label for="">Tên Danh mục </label>
			<input type="text" name="slug" value="{{old('slug')}}" class="form-control" placeholder="Nhập đường dẫn ...">
			@if ($errors->has('slug'))
                <span class="help-block">
                    <strong style="color:red;">{{ $errors->first('slug') }}</strong>
                </span>
            @endif
		</div> --}}
		<div class="form-group">
			<button class="btn btn-success" type="submit">Thêm</button>
		</div>

	</form>
@endsection
@section('js')
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
@endsection