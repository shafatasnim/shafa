@extends('pengajar.template.base')
@section('content')
<div class="card mt-3">
	<div class="card-header">
		<div class="row">
			<div class="col-md-6">
				<h2>Data Absensi</h2>
			</div>
			<div class="col-md-6">
				<h3>
					<button type="button" class="btn float-right btn-info" data-toggle="modal" data-target="#staticBackdrop">
						<i class="fa fa-plus"></i> Buat Absen Hari Ini
					</button>
					<!-- 	Hari Ini : {{$sekarang}}</h3> -->
				</div>
				<!-- modal abeseb -->
				<!-- Modal -->
				<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Absensi</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<table class="table table-hover table-sm">
									<tr class="bg-light">
										<th>No</th>
										<th>Nama Santri </th>
										<th>Absensi Kehadiran</th>
									</tr>
									@foreach($list_santri as $p)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{ucwords($p->nama)}}</td>

										<td>
											<form action="{{url('pengajar/absensi/create')}}" method="post">
												@csrf

												<input type="text" value="{{$p->id}}" name="id_santri[]" hidden="">
												<select name="status_kehadiran[]" class="form-control" >
													<option value="" hidden="">--Status Kehadiran--</option>
													<option value="Hadir">Hadir</option>
													<option value="Izin">Izin</option>
													<option value="Sakit">Sakit</option>
													<option value="Alfa">Alfa</option>
												</select>


											</td>

											<tr>
												<td>

												</td>
											</tr>

											<!-- end modal -->
										</tr>
										@endforeach
										<tr>
											<td colspan="3">
												<button class="btn btn-info float-right" onclick="return confirm('Simpan Absensi Hari ini?')" >Simpan Absensi</button>
											</form>
										</td>
									</tr>

								</table>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row card-body">
			<div class="col-4">
				<div class="list-group" id="list-tab" role="tablist">
					<!-- <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#now" role="tab" aria-controls="home">Hari Ini</a>
					<a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">History</a> -->
					<a class="list-group-item list-group-item-action bg-info text-white" href="{{url('pengajar/absensi')}}">Hari Ini</a>
					<a class="list-group-item list-group-item-action" href="{{url('pengajar/absensi/history')}}">History</a>
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
							</tr>
							@foreach($list_absensi->sortByDesc('id') as $p)
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
												<div class="modal-footer">
													<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
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
							</tr>
							@endforeach

						{{$list_absensi->links()}}
						</table>

					</div>
					<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
							<table class="table table-hover table-sm">
							<tr class="bg-light">
								<th>No</th>
								<th>Aksi</th>
								<th>Nama Santri</th>
								<th>Absensi Kehadiran</th>
								<th>Tgl Absen</th>
							</tr>
							@foreach($list_history->sortByDesc('tanggal') as $p)
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
															<option value="Alfa">Alfa</option>
														</select>
														<button class="btn btn-info mt-3">Simpan</button>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
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
									@endif

								</td>
								<td>{{$p->tanggal}}</td>
							</tr>
							@endforeach
								
						</table>
						
					</div>
				</div>
			</div>
		</div>
	</card>

	

	<!-- modal buat data pondok -->

	<!-- Modal -->
<!-- 		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('pengajar/absensi/create')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label class="label">Tanggal</label>
									<input type="date" class="form-control" name="tanggal" required="" placeholder="Tanggal Kegiatan"></input>
							</div>
							<div class="form-group">
								<label class="label">Status Kehadiran</label>
								<select class="form-control" name="status_kehadiran" required="">
									<option hidden="">-- Status Kehadiran --</option>
									<option>Hadir</option>
									<option>Izin</option>
									<option>Sakit</option>
									<option>Alpa</option>
								</select>
							</div>
							<button class="btn btn-info btn-block">Simpan Data</button>
						</form>
					</div>
				</div>
			</div>
		</div> -->


		<!-- end modal -->
		
	</div>

</div>
@endsection