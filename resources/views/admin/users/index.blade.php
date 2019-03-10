@extends('layouts.admin')
@section('header')
	<h2>Danh sách quản trị viên</h2>
@endsection
@section('content')
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Tên</th>
				<th>E-Mail</th>
				<th>Quyền</th>
				<th><a href="{{ route('users.create') }}" class="btn btn-info">Thêm &nbsp;<i class="fa fa-plus"></i></a></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td><a href="{{ route('users.getProfile',$user->id)}}">{{$user->name}}</a></td>
				<td>{{$user->email}}</td>
				<td>{{$user->getUserName()}}</td>
				<td>
					<a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
					<a href="javascript:;" onclick="conFirmRemove('{{ route('users.destroy',$user->id) }}')" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
				</td>
			</tr>
				{{-- expr --}}
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