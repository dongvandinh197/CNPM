@extends('layouts.admin')

@section('content')
	<h2>Danh sách bài viết</h2>
	<table class="table table-condensed table-bordered text-center align-middle">
		<tr>
			<th>#</th>
			<th>Ảnh</th>
			<th>Title</th>
			<th>Danh mục</th>
			<th><a href="{{ route('posts.create') }}" class="btn btn-info btn-sm"><i class="fa fa-plus"></i>&nbsp;Thêm</a></th>
		</tr>
		<tbody>
			@foreach ($posts as $post)
				<tr>
					<td>{{$post->id}}</td>
					<td><img src="{{asset($post->feature)}}" alt="" width=120></td>
					<td>{{str_limit($post->title,60)}}</td>
					<td>{{$post->category->name}}</td>
					<td>
						<a href="{{ route('posts.edit',$post->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
						<a onclick="conFirmRemove('{{ route('posts.destroy',$post->id) }}')" href="javascript:;" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="row">
		<div class="col-md-6 col-md-offset-3" >
			{{$posts->links()}}
		</div>
	</div>
@endsection
@section('css')
	<style>
		table td {
			  vertical-align: middle !important;
			}
	</style>
@endsection
@section('js')
	<script>
		function conFirmRemove(url){
			bootbox.confirm({
			    message: "Bạn chắc chắn muốn xóa chứ ?",
			    buttons: {
			        confirm: {
			            label: 'Có',
			            className: 'btn-success'
			        },
			        cancel: {
			            label: 'Không',
			            className: 'btn-danger'
			        }
			    },
			    callback: function (result) {
			        if(result){
			        	window.location.href = url;
			        }
			    }
});
		}
	</script>

@endsection