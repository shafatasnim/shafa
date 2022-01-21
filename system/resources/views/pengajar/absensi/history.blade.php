@extends('pengajar.template.base')
@section('content')
<div class="card mt-3">
	<div class="card-header">
		<div class="row">
			<div class="col-md-12">
				<h2>Data Absensi</h2>
			</div>
		</div>

		<div class="row card-body">
			<div class="col-4">
				<div class="list-group" id="list-tab" role="tablist">
					<!-- <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#now" role="tab" aria-controls="home">Hari Ini</a>
					<a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">History</a> -->
					<a class="list-group-item list-group-item-action " href="{{url('pengajar/absensi')}}">Hari Ini</a>
					<a class="list-group-item list-group-item-action bg-info text-white" href="{{url('pengajar/absensi/history')}}">History</a>

					<div class="card">
						<div class="card-header border-0">
							<h3>Cetak Absensi</h3>
						</div>

						<div class="card-body border-0">
							<form action="{{url('pengajar/absensi/cetak')}}" method="post" target="_blank">
								@csrf
							<div class="form-group">
								<label for="" class="label">Tanggal Awal</label>
								<input type="date" name="tgl1" class="form-cotnrol" required="">
							</div>
							<div class="form-group">
								<label for="" class="label">Tanggal Akhir</label>
								<input type="date" name="tgl2" class="form-cotnrol" required="">
							</div>

							<button class="btn btn-info btn-block"><i class="fa fa-print"></i> Cetak</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-8">
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="now" role="tabpanel" aria-labelledby="list-home-list">
						<!-- absensi now -->
						<table class="table table-hover table-sm">
							<tr class="bg-light">
								<th>No</th>
								<th>Aksi</th>
								<th>Nama Santri</th>
								<th>Absensi Kehadiran</th>
								<th>Tanggal</th>
							</tr>
							@foreach($list_history->sortByDesc('id') as $p)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>
									<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit{{$p->idp}}"><i class="fa fa-edit"></i></button>
									@include('pengajar.template.utils.delete', ['url' =>url('pengajar/absensi/delete', $p->idp)])


									<!-- Modal edit-->
									<div class="modal fade" id="edit{{$p->idp}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													{{$p->nama_santri}} :
													<form action="{{url('pengajar/absensi/update',$p->idp)}}" method="post">
														@csrf
														@method("PUT")
														<select name="status_kehadiran" class="form-control" required="">
															<option value="" hidden="">{{$p->status_kehadiran}}</option>
															<option value="Hadir">Hadir</option>
															<option value="Izin">Izin</option>
															<option value="Sakit">Sakit</option>
															<option value="Alfa">Alfa</option>
														</select>
														<button class="btn btn-info mt-3">Simpan</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</td>
								<td>{{ucwords($p->nama_santri)}}</td>
								<td>
									@if($p->status_kehadiran == "Alfa")
									<button class="btn btn-sm btn-danger">{{$p->status_kehadiran}}</button>
									@elseif ($p->status_kehadiran == "Hadir")
									<button class="btn btn-sm btn-success">{{$p->status_kehadiran}}</button>
									@elseif ($p->status_kehadiran == "Izin")
									<button class="btn btn-sm btn-warning">{{$p->status_kehadiran}}</button>
									@elseif ($p->status_kehadiran == "Sakit")
									<button class="btn btn-sm btn-light">{{$p->status_kehadiran}}</button>
									@endif

								</td>
								<td>{{$p->tanggal}}</td>
							</tr>
							@endforeach

						</table>

					</div>
						{{$list_history->links()}}
				</div>
			</div>
		</div>
	</card>

	

		
	</div>

</div>
@endsection