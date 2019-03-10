@extends('layouts.admin')
@section('header')
	<h2>Thêm mới quản trị viên</h2>
@endsection
@section('content')
	<div class="col-md-6">
		<form action="{{ route('users.update',$users->id) }}" method="post" id="save-user-form">
			{{csrf_field()}}
			  <div class="form-group">
		    		<label for="">Tên:</label>
			    	<input type="text"  class="form-control mx-sm-3" value="{{ $users->name }}" name="name" placeholder="Must be 8-20 characters long...">
			   
			  </div>
	  @if (count($errors) > 0)
	  	<span style="color: red;">{{$errors->first('name')}}</span>
	  @endif
			  <div class="form-group">
		    	<label for="">Email:</label>
			    	<input type="text"  class="form-control mx-sm-3" value="{{ $users->email }}" name="email" placeholder="Please enter valid email...">
			    	
			  </div>
	  @if (count($errors) > 0)
	  	<span style="color: red;">{{$errors->first('email')}}</span>
	  @endif
		
			  <div class="form-group">
		    	<label for="">Role:</label>
			    	<select name="role" id="" class="form-control">
			    		<option {{$users->role == 10 ? 'selected' : '' }} value="10">Author</option>
			    		<option {{$users->role == 20 ? 'selected' : '' }} value="20">Admin</option>
			    		@if (Auth::User()->role == 50)
			    			<option {{$users->role >= 50 ? 'selected' : '' }} value="50">Super Admin</option>
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
						minlength: 6,
					},
					email:{
						required: true,
						email:true
					},
					
					// slug :"required"
				},
				messages:{
					name:{
						required: "Vui lòng nhập tên danh mục.",
						minlength : "Nhập tối thiểu 6 kí tự."
					},
					email:{
						required:"Vui lòng nhập email.",
						email:"Vui lòng nhập đúng email."
					}
					
				}
			});
		});
	</script>
@endsection
