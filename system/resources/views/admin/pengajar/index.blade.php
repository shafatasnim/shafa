@extends('admin.template.base')
@section('content')
<div class="card shadow mt-3 border-0">
	<div class="card-header bg-info text-white border-0">
		<div class="row">
			<div class="col-md-6">
				<h2>Data Pengajar</h2>
			</div>
			<div class="col-md-6">

				<button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-plus"></i> Tambah Data Pengajar</button>

				<!-- modal create -->
				<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel" style="color: black">Tambah Data</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="card-body">
									<form action="{{url('admin/pengajar/create')}}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<label class="label">Nama Pengajar</label>
											<input class="form-control" name="nama_pengajar" type="text" required="" placeholder="Nama Pengajar">
										</div>
										<div class="form-group">
											<label class="label">Nama Majelis</label>
											<input class="form-control" name="nama_majelis" type="text" required="" placeholder="Nama Majelis">
										</div>
										<div class="form-group">
											<label class="label">Jenis Majelis</label>
											<select class="form-control" name="jenis_majelis" required="">
												<option hidden="">-- Jenis Majelis --</option>
												<option>Qur'an</option>
												<option>Kitab</option>
											</select>
										</div>
										<div class="form-group">
											<label class="label">Alamat</label>
											<input class="form-control" name="alamat" type="text" required="" placeholder="Alamat">
										</div>
										<div class="form-group">
											<label class="label">Nomor Hp</label>
											<input class="form-control" name="no_hp" type="text" required="" placeholder="Nomor Hp">
										</div>
										<div class="form-group">
											<label class="label">Email</label>
											<input class="form-control" name="email" type="text" required="" placeholder="Email">
										</div>
										<div class="form-group">
											<label class="label">Foto</label>
											<input class="form-control" name="foto"  type="file" accept="image/*">
										</div>
										<button class="btn btn-primary btn-block">Simpan</button>
									</form>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>


				<!-- end modal create -->
			</div>
		</div>

	</div>
	<div class="card-body">
		<label class="label">Daftar Nama Pengajar</label>
		<table class="table table-hover table-sm">
			<tr class="bg-light">
				<th >No</th>
				<th >Aksi</th>
				<th width="20%">Nama Pengajar</th>
				<th width="20%">Nama Majelis</th>
				<th width="20%">Jenis Majelis</th>
				<th width="20%">Email</th>
			</tr>
			@foreach($list_pengajar->sortByDesc('id') as $p)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>
					<div class="btn-group">

						<!-- tombol info -->
						<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#info{{$p->id}}"><i class="fa fa-info"></i></button>


						<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit{{$p->id}}"><i class="fa fa-edit"></i></button>
						<!-- tombol hapus -->
						@include('admin.template.utils.delete', ['url' =>url('admin/pengajar/delete', $p->id)])
						<!-- end tombol hapus -->
					</div>
				</td>
				<td>{{ucwords($p->nama_pengajar)}}</td>
				<td>{{ucwords($p->nama_majelis)}}</td>
				<td>{{ucwords($p->jenis_majelis)}}</td>
				<td>{{ucwords($p->email)}}</td>


				<!-- Modal info-->
				<div class="modal fade" id="info{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Detail Pengajar</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="card">
									<div class="card-header">
										<img src="{{url('public')}}/{{$p->foto}}" width="100%">
									</div>

									<div class="card-body">
										<p>Nama Ust/Ustdz : {{ucwords($p->nama_pengajar)}} <br>
											Nama Majelis : {{ucwords($p->nama_majelis)}} <br>
											Jenis Majelis : {{ucwords($p->jenis_majelis)}} <br>
											Alamat : {{ucwords($p->alamat)}} <br>
											Nomor Handphone : {{ucwords($p->no_hp)}} <br>
											Email : {{ucwords($p->email)}} <br>

										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<!-- Modal edit-->
				<div class="modal fade" id="edit{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('admin/pengajar/update',$p->id)}}" method="post" enctype="multipart/form-data">
									@csrf
									@method('PUT')
									<div class="form-group">
										<label class="label">Nama Pengajar</label>
										<input class="form-control" name="nama_pengajar" value="{{$p->nama_pengajar}}" type="text" required="" placeholder="Nama Pengajar">
									</div>
									<div class="form-group">
										<label class="label">Nama Majelis</label>
										<input class="form-control" name="nama_majelis" value="{{$p->nama_majelis}}" type="text" required="" placeholder="Nama Majelis">
									</div>
									<div class="form-group">
										<label class="label">Jenis Majelis</label>
										<select class="form-control" name="jenis_majelis" value="{{$p->jenis_majelis}}" required="">
											<option hidden="">-- Jenis Majelis --</option>
											<option>Qur'an</option>
											<option>Kitab</option>
										</select>
									</div>
									<div class="form-group">
										<label class="label">Alamat</label>
										<input class="form-control" name="alamat" value="{{$p->alamat}}" type="text" required="" placeholder="Alamat">
									</div>
									<div class="form-group">
										<label class="label">Nomor Hp</label>
										<input class="form-control" name="no_hp" value="{{$p->no_hp}}" type="text" required="" placeholder="Nomor Hp">
									</div>
									<div class="form-group">
										<label class="label">Email</label>
										<input class="form-control" name="email" value="{{$p->email}}" type="text" required="" placeholder="Email">
									</div>
									<div class="form-group">
										<label class="label">Foto</label>
										<input class="form-control" name="foto" value="{{$p->foto}}" type="file" accept="image/*">
									</div>
									<button class="btn btn-primary btn-block">Simpan</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</tr>
			@endforeach
		</table>
	</div>
</div>
</div>
</div>

@endsection