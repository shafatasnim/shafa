@extends('pengajar.template.base')
@section('content')
<div class="card mt-3">
	<div class="card-header">
		<div class="row">
			<div class="col-md-6">
				<h2>Data Hafalan</h2>
			</div>
			<div class="col-md-6">
				<h3>
					<button type="button" class="btn float-right btn-primary" data-toggle="modal" data-target="#setoran">
						<i class="fa fa-plus"></i> Setoran
					</button>
					<!-- 	Hari Ini : {{$sekarang}}</h3> -->
				</div>
				<!-- modal abeseb -->
				<!-- Modal -->
				<div class="modal fade" id="setoran" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Setoran</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('pengajar/hafalan/create')}}" method="post">
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
										<label for="" class="label">Nama Surah</label>
										<input type="text" name="surah" class="form-control" required="">
									</div>
									<div class="row">
										<div class="form-group">
											<label for="" class="label">Juz</label>
											<input type="number" name="juz" min="1" class="form-control" required="">
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="" class="label">Dari Ayat Ke</label>
												<input type="number" name="ayat1" min="1" class="form-control" required="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="" class="label">Sampai Ayat Ke</label>
												<input type="number" name="ayat2" min="1" class="form-control" required="">
											</div>
										</div>
									</div>


									<div class="form-group">
										<label for="" class="label">Tanggal Setor</label>
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
			<label for="" class="label">Data Hafalan Santri</label>
			<table class="table table-hover">
				<tr class="bg-dark text-white">
					<th>No</th>
					<th>Aksi</th>
					<th>Nama Santri</th>
					<th>Nama Surah</th>
					<th>Juz</th>
					<th>Ayat Ke</th>
					<th>Tanggal Setor</th>
				</tr>
				@foreach($list_hafalan->sortByDesc('id') as $p)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>
						<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit{{$p->idp}}"><i class="fa fa-edit"></i></button>
						@include('pengajar.template.utils.delete', ['url' =>url('pengajar/hafalan/delete', $p->idp)])

					</td>
					<td>{{ucwords($p->nama)}}</td>
					<td>{{ucwords($p->surah)}}</td>
					<td>{{$p->juz}}</td>
					<td>Ayat {{$p->ayat1}} - {{$p->ayat2}}</td>
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
								<form action="{{url('pengajar/hafalan/update',$p->idp)}}" method="post">
									@csrf
									@method("PUT")
									<div class="form-group">
										<label for="" class="label">Nama Santri</label>
										<select name="id_santri" id="" class="form-control" required="">
											<option value="{{$p->id_santri}}" hidden="">{{$p->nama}}</option>
											@foreach($list_santri as $s)
											<option value="{{$s->id}}"> {{$s->nama}}</option>
											@endforeach
										</select>
									</div>

									<div class="form-group">
										<label for="" class="label">Nama Surah</label>
										<input type="text" name="surah" class="form-control" required="" value="{{ucwords($p->surah)}}">
									</div>
									<div class="row">
										<div class="form-group">
											<label for="" class="label">Juz</label>
											<input type="number" name="juz" min="1" class="form-control" required="" value="{{ucwords($p->juz)}}">
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="" class="label">Dari Ayat Ke</label>
												<input type="number" name="ayat1" min="1" class="form-control" required="" value="{{$p->ayat1}}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="" class="label">Sampai Ayat Ke</label>
												<input type="number" name="ayat2" min="1" class="form-control" required="" value="{{$p->ayat2}}">
											</div>
										</div>
									</div>

									<div class="form-group">
										<label for="" class="label">Tanggal Setor</label>
										<input type="date" name="tanggal" class="form-control" required="" value="{{$p->date}}">
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
			{{  $list_hafalan->links() }}

		</div>


	</div>

</div>
@endsection