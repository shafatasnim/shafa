@extends('orangtua.template.base')
@section('content')
<div class="card mt-3">
	<div class="card-header">
		<div class="row">
			<div class="col-md-12">
				<h2>Data Absensi Anak Anda</h2>
			</div>
			</div>
		</div>

		<div class="row card-body contenr table-responsive" >
			<label for="" class="label">Data Kehadiran Santri</label>
			<table class="table align-items-center justify-content-center mb-0 table-hover">
				<tr class="bg-dark text-white">
					<th>No</th>
					<th>Nama Santri</th>
					<th>Nama Majelis</th>
					<th>Jenis Majelis</th>
					<th>Status Kehadiran</th>
					<th>Tanggal</th>
				</tr>
					@foreach($list_absensi->sortByDesc('tanggal') as $p)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{ucwords($p->nama)}}</td>
					<td>{{ucwords($p->nama_majelis)}}</td>
					<td>{{ucwords($p->jenis_majelis)}}</td>
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
		{{  $list_absensi->links() }}

		</div>

		
	</div>

</div>
@endsection