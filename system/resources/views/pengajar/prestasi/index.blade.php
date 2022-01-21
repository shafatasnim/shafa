@extends('pengajar.template.base')
@section('content')
<div class="card mt-3">
	<div class="card-header">
		<div class="row">
			<div class="col-md-6">
				<h2>Data Prestasi</h2>
			</div>
			<div class="col-md-6">
				<h3>
					<button type="button" class="btn float-right btn-info" data-toggle="modal" data-target="#setoran">
						<i class="fa fa-plus"></i> Prestasi
					</button>
					<!-- 	Hari Ini : {{$sekarang}}</h3> -->
				</div>
				<!-- modal abeseb -->
				<!-- Modal -->
				<div class="modal fade" id="setoran" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Prestasi</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('pengajar/prestasi/create')}}" method="post">
									@csrf
									<div class="form-group">
										<label for="" class="label">Nama Santri</label>
										<select name="id_santri" id="" class="form-control" required="">
											<option value="" hidden="">-- Nama Santri--</option>
											@foreach($list_santri as $s)
											<option value="{{$s->id}}">{{ucwords($s->nama)}}</option>
											@endforeach
										</select>
									</div>

									<div class="form-group">
										<label for="" class="label">Nama Prestasi</label>
										<input type="text" name="nama_prestasi" class="form-control" required="">
									</div>


									<div class="form-group">
										<label for="" class="label">Tanggal</label>
										<input type="date" name="tanggal" class="form-control" required="">
									</div>
									<div class="form-group">
										<button class="btn btn-info btn-block">Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row card-body">
			<label for="" class="label">Data Prestasi Santri</label>
			<table class="table table-hover">
				<tr class="bg-dark text-white">
					<th>No</th>
					<th>Aksi</th>
					<th>Nama Santri</th>
					<th>Nama Prestasi</th>
					<th>Tanggal</th>
				</tr>
				@foreach($list_prestasi->sortByDesc('id') as $p)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>
						<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit{{$p->idp}}"><i class="fa fa-edit"></i></button>
						@include('pengajar.template.utils.delete', ['url' =>url('pengajar/prestasi/delete', $p->idp)])

					</td>
					<td>{{ucwords($p->nama)}}</td>
					<td>{{ucwords($p->nama_prestasi)}}</td>
					<td>{{$p->tanggal}}</td>
				</tr>

				<!-- modal edit -->
				<div class="modal fade" id="edit{{$p->idp}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="edit{{$p->idp}}">Setoran</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('pengajar/prestasi/update',$p->idp)}}" method="post">
									@csrf
									@method("PUT")
									<div class="form-group">
										<label for="" class="label">Nama Santri</label>
										<select name="id_santri" id="" class="form-control" required="">
											<option value="{{$p->id_santri}}" hidden="">{{ucwords($p->nama)}}</option>
											@foreach($list_santri as $s)
											<option value="{{$s->id}}">{{ucwords($s->nama)}}</option>
											@endforeach
										</select>
									</div>

									<div class="form-group">
										<label for="" class="label">Nama Prestasi</label>
										<input type="text" name="nama_prestasi" class="form-control" required="" value="{{ucwords($p->nama_prestasi)}}">
									</div>


									<div class="form-group">
										<label for="" class="label">Tanggal</label>
										<input type="date" name="tanggal" class="form-control" required="" value="{{$p->tanggal}}">
									</div>
									<div class="form-group">
										<button class="btn btn-info btn-block">Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</table>
			{{  $list_prestasi->links() }}

		</div>


	</div>

</div>
@endsection