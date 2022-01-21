@extends('admin.template.base')
@section('content')
<div class="card shadow mt-3 border-0">
	<div class="card-header bg-info text-white border-0">
		<div class="row">
			<div class="col-md-6">
				<h2>Data Santri</h2>
			</div>
			<div class="col-md-6">
				<a class="btn btn-warning float-right ml-3" href="{{url('admin/santri/santri/create')}}" style="float: right;"><i class="fa fa-user"></i> Tambah Data Santri</a>

				<a class="btn btn-danger float-right" style="float: right;" href="{{url('admin/santri/saudara/create')}}"><i class="fa fa-users"></i> Tambah Data Saudara Santri</a>
			</div>
		</div>


	</div>
	<div class="card border-0">
		<div class="card-body">
			<div class="container">
				<label class="label">Data Santri</label>
				<table class="table table-hover table-sm">
					<tr class="bg-light">
						<th>No</th>
						<th>Aksi</th>
						<th>Nama Santri</th>
						<th>NIK</th>
						<th>Jenis Kelamin</th>
						<th>Jenjang Pendidikan</th>
						<th>Tempat/Tanggal Lahir</th>
					</tr>
					@foreach($list_santri->sortByDesc('id') as $p)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>
							<div class="btn-group">

								<!-- tombol info -->
								<a href="{{url('admin/santri/show',$p->id)}}" class="btn btn-success btn-sm float-right"><i class="fa fa-info"></i></a>


								<!-- tombol hapus -->
								@include('admin.template.utils.delete', ['url' =>url('admin/santri/delete', $p->id)])
								<!-- end tombol hapus -->
							</div>
						</td>
						<td>{{ucwords($p->nama)}}</td>
						<td>{{ucwords($p->nik)}}</td>
						<td>{{ucwords($p->jk)}}</td>
						<td>{{ucwords($p->jenjang)}}</td>
						<td>
							{{ucwords($p->tempat_lahir)}}, 
							{{ucwords($p->tgl_lahir)}}
						</td>
					</tr>
					@endforeach
				</table>
			</div>
			{{$list_santri->links()}}
		</div>
	</div>
	@endsection