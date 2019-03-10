@extends('layouts.admin')

@section('content')
	<h2>Thêm mới bài viết</h2>
	@if (session()->has('notif'))
		<div class="col-sm-4 pull-right">
			<div class="alert text-primary">
				<span>Notification:{{session()->get('notif')}}</span>
			</div>
		</div>
	@endif
	<div class="col-md-8">
		<form action="{{ route('posts.store') }}" id="save-post-form" method="post" enctype="multipart/form-data" >
			{{csrf_field()}}
			<div class="form-group">
				<label for="title">Tên bài viết:</label>
				<input type="text" class="form-control" id="title" name="title" placeholder="Tên bài viết...." onkeyup="generateSlug();">
			</div>
			@if (count($errors->has('title')) >0)
				<span style="color:red;">{{$errors->first('title')}}</span>
			@endif
			<div class="form-group">
				<label for="slug">Đường dẫn:</label>
				<input type="text" class="form-control" id="slug" name="slug" placeholder="URL...">
			</div>
			@if (count($errors->has('slug')) >0)
				<span style="color:red;">{{$errors->first('slug')}}</span>
			@endif
			<div class="form-group">
				<label for="feature">Ảnh :</label>
				<input type="file" class="form-control" name="feature" >
			</div>
			@if (count($errors->has('feature')) >0)
				<span style="color:red;">{{$errors->first('feature')}}</span>
			@endif
			<div class="form-group">
				<label for="title">Nội dung bài viết:</label>
				<textarea name="content" id="" cols="30" rows="20" class="form-control"></textarea>
			</div>
			@if (count($errors->has('content')) >0)
				<span style="color:red;">{{$errors->first('content')}}</span>
			@endif
			<div class="form-group">
				<label for="feature">Danh mục :</label>
				<select name="category_id" id="">
					@foreach ($categories as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
			</div>
			<button type="submit" class="btn btn-success">Thêm</button>
		</form>
			
	</div>
@endsection
@section('js')
	<script>
			$(document).ready(function(){
				$('#save-post-form').validate({
					rules:{
						title:{
							required: true,
							minlength: 6,
						},
						slug:{
							required: true,
							minlength:6
						},
						feature:{
							required: true,
							image:true,
							maxlength:1999
						},
						content:{
							required: true,
							minlength:20
						}
						// slug :"required"
					},
					messages:{
						title:{
							required:"Vui lòng nhập tên bài viết.",
							minlength :"Tên bài viết tối thiểu 6 kí tự."
						},
						slug:{
							required:"Vui lòng nhập đường dẫn.",
							minlength :"Đường dẫn tối thiểu 6 kí tự."
						},
						feature:{
							required:"Vui lòng chọn ảnh minh họa.",
							imgae: "Ảnh không đúng định dạng.",
							maxlength:"Ảnh kích thước không quá 2 mb."
						},
						content:{
							required: "Vui lòng nhập nội dung bài viết.",
							minlength :"Nội dung tối thiểu 20 kí tự."
						}
						// slug : {
						// 	required :"Vui lòng nhập đường dẫn."
						// }
					}
				});
			});
	</script>
	<script>
		function generateSlug(){
		var title;
	    var slug;
	 
	    //Lấy text từ thẻ input title 
	    title = document.getElementById("title").value;
	 
	    //Đổi chữ hoa thành chữ thường
	    slug = title.toLowerCase();
	 
	    //Đổi ký tự có dấu thành không dấu
	    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
	    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
	    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
	    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
	    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
	    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
	    slug = slug.replace(/đ/gi, 'd');
	    //Xóa các ký tự đặt biệt
	    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*||∣|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
	    //Đổi khoảng trắng thành ký tự gạch ngang
	    slug = slug.replace(/ /gi, "-");
	    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
	    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
	    slug = slug.replace(/\-\-\-\-\-/gi, '-');
	    slug = slug.replace(/\-\-\-\-/gi, '-');
	    slug = slug.replace(/\-\-\-/gi, '-');
	    slug = slug.replace(/\-\-/gi, '-');
	    //Xóa các ký tự gạch ngang ở đầu và cuối
	    slug = '@' + slug + '@';
	    slug = slug.replace(/\@\-|\-\@|\@/gi, '')+'.html';
	    //In slug ra textbox có id “slug”
	    document.getElementById('slug').value = slug;
	}
	</script>
	<script>
		jQuery(document).ready(function ($) {
        // CKEDITOR.replace('featured');
        CKEDITOR.replace('content', {
            filebrowserBrowseUrl: '{!! asset('plugins/ckfinder/ckfinder.html') !!}',
            filebrowserImageBrowseUrl: '{!! asset('plugins/ckfinder/ckfinder.html?type=Images') !!}',
            filebrowserFlashBrowseUrl: '{!! asset('plugins/ckfinder/ckfinder.html?type=Flash') !!}',
            filebrowserUploadUrl: '{!! asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') !!}',
            filebrowserImageUploadUrl: '{!! asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') !!}',
            filebrowserFlashUploadUrl: '{!! asset('plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') !!}'
        });
    });
	</script>
@endsection
