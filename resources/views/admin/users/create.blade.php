@extends('layouts.admin')
@section('header')
	<h2>Thêm mới quản trị viên</h2>
@endsection
@section('content')
	<div class="col-md-6">
		<form action="{{ route('users.store') }}" method="post" id="save-user-form">
			{{csrf_field()}}
			  <div class="form-group">
		    		<label for="">Tên:</label>
			    	<input type="text"  class="form-control mx-sm-3" value="{{ old('name')}}" name="name" placeholder="Must be 8-20 characters long...">
			   
			  </div>
	  @if (count($errors) > 0)
	  	<span style="color: red;">{{$errors->first('name')}}</span>
	  @endif
			  <div class="form-group">
		    	<label for="">Email:</label>
			    	<input type="text"  class="form-control mx-sm-3"value="{{ old('email')}}" name="email" placeholder="Please enter valid email...">
			    	
			  </div>
	  @if (count($errors) > 0)
	  	<span style="color: red;">{{$errors->first('email')}}</span>
	  @endif
			  <div class="form-group">
		    	<label for="">Password:</label>
			    	<input type="password"  class="form-control mx-sm-3"  name="password" id="password">
			    	<small  class="text-muted">
			     		 
			    	</small>
			  </div>
	  @if (count($errors) > 0)
	  	<span style="color: red;">{{$errors->first('password')}}</span>
	  @endif
			  <div class="form-group">
		    	<label for="">Confirm Password:</label>
			    	<input type="password"  class="form-control mx-sm-3"  name="password_confirm">
			    	<small  class="text-muted">
			     		 
			    	</small>
			  </div>
		@if (count($errors) > 0)
		  	<span style="color: red;">{{$errors->first('password_confirm')}}</span>
		@endif
			  <div class="form-group">
		    	<label for="">Role:</label>
			    	<select name="role" id="" class="form-control">
			    		<option value="10">Author</option>
			    		<option value="20">Admin</option>
			    		@if (Auth::User()->role == 50)
			    			<option value="50">Super Admin</option>
			    		@endif
			    		
			    	</select>
			  </div>
			  <button class="btn btn-success" type="submit"><i class="fa fa-user-plus">&nbsp;Thêm</i></button>

		</form>
	</div>
@endsection
@section('js')
	<script>
		$(document).ready(function(){
			$('#save-user-form').validate({
				rules:{
					name:{
						required: true,
						minlength: 8,
					},
					email:{
						required: true,
						email:true
					},
					password:{
						required: true,
						minlength:6,
					},
					password_confirm:{
						required: true,
						equalTo : "#password"
					}
					// slug :"required"
				},
				messages:{
					name:{
						required: "Vui lòng nhập tên danh mục.",
						minlength : "Nhập tối thiểu 8 kí tự."
					},
					email:{
						required:"Vui lòng nhập email.",
						email:"Vui lòng nhập đúng email."
					},
					password:{
						required: "Vui lòng nhập password.",
						minlength : "Nhập password tối thiểu 6 kí tự."
					},
					password_confirm:{
						required: "Vui lòng xác nhận password",
						equalTo: "Password không khớp."
					}
					// slug : {
					// 	required :"Vui lòng nhập đường dẫn."
					// }
				}
			});
		});
	</script>
@endsection