@extends('admin.template.base')
@section('content')
<div class="card shadow mt-3 border-0">
	<div class="card-body">
		<div class="container">
			<label class="label">Data Orangtua</label>
			<table class="table table-hover table-sm">
				<tr class="bg-light">
					<th>No</th>
					<th>Aksi</th>
					<th>Nomor Kartu Keluarga</th>
					<th>Nama Ayah</th>
					<th>Nama Ibu</th>
					<th>Nama Anak</th>
				</tr>
				@foreach($list_orangtua->sortByDesc('id') as $p)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>
						<div class="btn-group">

							<!-- tombol info -->
							<a href="{{url('admin/orangtua/show',$p->id)}}" class="btn btn-success btn-sm float-right"><i class="fa fa-info"></i></a>

							<!-- tombol edit -->
							<a href="{{url('admin/orangtua/edit',$p->id)}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-edit"></i></a>

							<!-- tombol hapus -->
							@include('admin.template.utils.delete', ['url' =>url('admin/orangtua/delete', $p->id)])
							<!-- end tombol hapus -->
						</div>
					</td>
					<td>{{ucwords($p->no_kk)}}</td>
					<td>{{ucwords($p->nama_ayah)}}</td>
					<td>{{ucwords($p->nama_ibu)}}</td>
					<td>{{ucwords($p->nama)}}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection