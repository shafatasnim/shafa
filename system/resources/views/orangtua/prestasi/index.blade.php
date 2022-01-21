@extends('orangtua.template.base')
@section('content')
<div class="card mt-3">
	<div class="card-header">
		<div class="row">
			<div class="col-md-12">
				<h2>Data Prestasi</h2>
			</div>
			</div>
		</div>

		<div class="row card-body">
			<label for="" class="label">Data Prestasi Santri</label>
			<table class="table table-hover">
				<tr class="bg-dark text-white">
					<th>No</th>
					<th>Nama Santri</th>
					<th>Nama Prestasi</th>
					<th>Tanggal</th>
				</tr>
				@foreach($list_prestasi->sortByDesc('id') as $p)
				<tr>
					<td>{{$loop->iteration}}</td>
				
					<td>{{ucwords($p->nama)}}</td>
					<td>{{ucwords($p->nama_prestasi)}}</td>
					<td>{{$p->tanggal}}</td>
				</tr>
				@endforeach
			</table>
			{{  $list_prestasi->links() }}

		</div>


	</div>

</div>
@endsection