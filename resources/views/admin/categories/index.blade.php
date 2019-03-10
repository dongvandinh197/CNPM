@extends('layouts.admin')
@section('header')
	<h1>Category Lists</h1>
	@if (session()->has('notif'))
		<div class="col-sm-4 pull-right">
			<div class="alert text-primary">
				<span>Notification:{{session()->get('notif')}}</span>
			</div>
		</div>
	@endif
@endsection
@section('content')

	<table class="table table-border table-striped">
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Slug</th>
			<th><a class="btn btn-info" href="{{ route('categories.create') }}"><i class="fa fa-plus"></i>&nbsp; Thêm</a></th>
		</tr>
		<tbody>
			@foreach ($categories as $theloaigiay)
				<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$theloaigiay->name}}</td>
				<td>{{$theloaigiay->slug}}</td>
				<td>
					<a class="btn btn-warning" href="{{ route('categories.edit',['id' => $theloaigiay->id]) }}"><i class="fa fa-pencil"></i></a>
					<a class="btn btn-danger" onclick="conFirmRemove('{{ route('categories.destroy',['id' => $theloaigiay->id]) }}');" href="javascript:;"><i class="fa fa-times"></i></a>
				</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
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
