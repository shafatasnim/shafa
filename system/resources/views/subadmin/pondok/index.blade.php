@extends('subadmin.template.base')
@section('content')
<div class="card mt-3">
	<div class="card-header">
		<div class="row">
			<div class="col-md-6">
				<h2>Data Pondok</h2>
			</div>
			<div class="col-md-6">
				<button class="btn btn-dark float-right" style="float: right;" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data</button>
			</div>
		</div>

		<!-- modal buat data pondok -->

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
			       <form action="{{url('subadmin/pondok/create')}}" method="post" enctype="multipart/form-data">
			       	@csrf
			       		<div class="form-group">
			       			<label class="label">Nama Pondok</label>
			       			<input class="form-control" name="nama_pondok" type="text" required="" placeholder="Nama Pondok">
			       		</div>
			       		<div class="form-group">
			       			<label class="label">Nomor Izin</label>
			       			<input class="form-control" name="no_izin" type="text" required="" placeholder="Nomor Izin Pondok">
			       		</div>
			       		<div class="form-group">
			       			<label class="label">Nama Admin Pondok</label>
			       			<input class="form-control" name="nama_admin_pondok" type="text" required="" placeholder="Nama Admin Pondok">
			       		</div>
			       		<div class="form-group">
			       			<label class="label">Alamat</label>
			       			<input class="form-control" name="alamat" type="text" required="" placeholder="Alamat">
			       		</div>
			       		<div class="form-group">
			       			<label class="label">No Hp</label>
			       			<input class="form-control" name="no_hp" type="text" required="" placeholder="No Hp">
			       		</div>
			       		<div class="form-group">
			       			<label class="label">Email</label>
			       			<input class="form-control" name="email" type="email" required="" placeholder="Email">
			       		</div>
			       		<div class="form-group">
			       			<label class="label">Foto</label>
			       			<input class="form-control" name="foto" required="" type="file" accept="image/*">
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
		<label class="label">Data Seluruh Pondok</label>
		<table class="table table-hover table-sm">
			<tr class="bg-light">
				<th>No</th>
				<th>Aksi</th>
				<th>Nama Pondok</th>
				<th>Nama Admin Pondok</th>
				<th>No Hp</th>
				<th>Email</th>
			</tr>
			@foreach($list_pondok->sortByDesc('id') as $p)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>
					<div class="btn-group">

					<!-- tombol info -->
					<button class="btn btn-success btn-sm float-right" style="float: right;" data-toggle="modal" data-target="#info{{$p->id}}"><i class="fa fa-info"></i></button>

					<!-- tombol edit -->
					<button class="btn btn-warning btn-sm float-right" style="float: right;" data-toggle="modal" data-target="#edit{{$p->id}}"><i class="fa fa-edit"></i></button>

					<!-- tombol hapus -->
					@include('subadmin.template.utils.delete', ['url' =>url('subadmin/pondok/delete', $p->id)])
					<!-- end tombol hapus -->
					</div>
				</td>
				<td>{{ucwords($p->nama_pondok)}}</td>
				<td>{{ucwords($p->nama_admin_pondok)}}</td>
				<td>{{ucwords($p->no_hp)}}</td>
				<td>{{ucwords($p->email)}}</td>


		<!-- Modal Edit Data-->
			<div class="modal fade" id="edit{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			       <form action="{{url('subadmin/pondok/update',$p->id)}}" method="post" enctype="multipart/form-data">
			       	@csrf
			       	@method("PUT")
			       		<div class="form-group">
			       			<label class="label">Nama Pondok</label>
			       			<input class="form-control" name="nama_pondok" type="text" value="{{ucwords($p->nama_pondok)}}" required="" placeholder="Nama Pondok">
			       		</div>
			       		<div class="form-group">
			       			<label class="label">Nomor Izin Pondok</label>
			       			<input class="form-control" name="no_izin" type="text" value="{{ucwords($p->no_izin)}}" required="" placeholder="Nomor Izin Pondok">
			       		</div>
			       		<div class="form-group">
			       			<label class="label">Nama Admin Pondok</label>
			       			<input class="form-control" name="nama_admin_pondok" type="text" value="{{ucwords($p->nama_admin_pondok)}}" required="" placeholder="Nama Admin Pondok">
			       		</div>
			       		<div class="form-group">
			       			<label class="label">Alamat</label>
			       			<input class="form-control" name="alamat" type="text" required="" value="{{ucwords($p->alamat)}}" placeholder="Alamat">
			       		</div>
			       		<div class="form-group">
			       			<label class="label">No Hp</label>
			       			<input class="form-control" name="no_hp" type="text" required="" value="{{$p->no_hp}}" placeholder="No Hp">
			       		</div>
			       		<div class="form-group">
			       			<label class="label">Email</label>
			       			<input class="form-control" name="email" type="email" required="" value="{{ucwords($p->email)}}" placeholder="Email">
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


		<!-- Modal Info Data-->
			<div class="modal fade" id="info{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
			      			
			      			<h3>{{ucwords($p->nama_pondok)}} </h3>
			      			<p>
			      				Nama Admin Pondok : {{ucwords($p->nama_admin_pondok)}} <br>
			      				Nomor Izin : {{strtoupper($p->no_izin)}}<br>
			      				No Hp : {{$p->no_hp}} <br>
			      				Email : {{ucwords($p->email)}}

			      			</p>
			      		</div>
			      	</div>
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