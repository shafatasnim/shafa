@extends('admin.template.base')
@section('content')
<div class="card mt-3">
	<div class="card-header">
		<div class="row">
			<div class="col-md-6">
				<h2>Data Pelanggaran</h2>
			</div>
			<div class="col-md-6">
				<button class="btn btn-info float-right" style="float: right;" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data</button>
			</div>
		</div>

		<!-- modal buat data pelanggaran -->

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('admin/pelanggaran/create')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<!-- form select santri -->
								<label class="label">Nama Santri</label>
								<select name="id_santri" class="form-control js-example-basic-single">
									<option hidden="">--Nama Santri--</option>
									@foreach($list_santri->sortBy('nama') as $s)
									<option value="{{$s->id}}">{{ucwords($s->nama)}}</option>
									@endforeach
								</select>
							</div>

							<!-- form select kategori pelanggaran -->
							<div class="form-group">
								<label class="label">Kategori Pelanggaran</label>
								<select name="id_kategori" class="form-control">
									<option hidden="">--Kategori Pelanggaran--</option>
									@foreach($list_kategori as $p)
									<option value="{{$p->id}}">{{ucwords($p->kategori_pelanggaran)}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label class="label">Tanggal Pelanggaran</label> 
								<input type="date" class="form-control" name="tgl" required="" placeholder="Tanggal Pelanggaran"></input>
							</div>
							<div class="form-group">
								<label for="" class="control-label">Deskripsi</label>
								<textarea name="deskripsi" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label class="label">Foto</label>
								<input class="form-control" name="foto"  type="file" accept="image/*">
							</div>
							<button class="btn btn-info btn-block">Simpan Data</button>
						</form>
					</div>
				</div>
			</div>
		</div>


		<!-- end modal -->
		
	</div>

	<div class="card-body">
		<div class="container">
			<label class="label">Data Pelanggaran</label>
			<table class="table table-hover table-sm">
				<tr class="bg-light">
					<th>No</th>
					<th>Aksi</th>
					<th>Santri</th>
					<th>Kategori Pelanggaran</th>
					<th>Tanggal</th>
				</tr>
				@foreach($list_pelanggaran as $p)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>
						<div class="btn-group">

							<!-- tombol info -->
							<button class="btn btn-success btn-sm float-right" style="float: right;" data-toggle="modal" data-target="#info{{$p->idp}}"><i class="fa fa-info"></i></button>
							<!-- Modal Info Data-->
					<div class="modal fade" id="info{{$p->idp}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Info Data</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="card">
										<div class="card-body">
											<div class="card-header">
												<img src="{{url('public')}}/{{$p->foto}}" width="100%">
											</div>
											<div class="card-body">
												<strong>Deskripsi Pelanggaran :</strong> <br>
												<p>{{$p->deskripsi}}</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end modal -->

							<!-- tombol edit -->
							<button class="btn btn-warning btn-sm float-right" style="float: right;" data-toggle="modal" data-target="#edit{{$p->idp}}"><i class="fa fa-edit"></i></button>

							<!-- tombol hapus -->
							@include('admin.template.utils.delete', ['url' =>url('admin/pelanggaran/delete', $p->idp)])
							<!-- end tombol hapud -->
						</div>
					</td>
					<td>{{ucwords($p->nama)}} </td>
					<td>{{ucwords($p->kategori_pelanggaran)}}</td>
					<td>{{ucwords($p->tgl)}}</td>


					<!-- Modal Edit Data-->
					<div class="modal fade" id="edit{{$p->idp}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="{{url('admin/pelanggaran/update',$p->idp)}}" method="post" enctype="multipart/form-data">
										@csrf
										@method("PUT")
										<div class="form-group">
											<label class="label">Tanggal Pelanggaran</label> 
											<input type="date" class="form-control" name="tgl" value="{{$p->tgl}}" required="" placeholder="Tanggal Pelanggaran"></input>
										</div>
										<div class="form-group">
											<label class="label">Kategori Pelanggaran</label>
											<select name="id_kategori" class="form-control">
												<option hidden="" value="{{$p->idk}}">{{$p->kategori_pelanggaran}}</option>
												@foreach($list_kategori as $p)
												<option value="{{$p->id}}">{{$p->kategori_pelanggaran}}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group">
											<label for="" class="control-label">Deskripsi</label>
											<textarea name="deskripsi" class="form-control">{{$p->deskripsi}}</textarea>
										</div>
										<button class="btn btn-info btn-block">Simpan Data</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- end modal -->


					
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
@endsection