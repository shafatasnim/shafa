@extends('orangtua.template.base')
@section('content')
<div class="card mt-3">
	<div class="card-header">
		<div class="row">
			<div class="col-md-12">
				<h2>Data Hafalan Anak Anda</h2>
			</div>
			</div>
		</div>

		<div class="row card-body">
			<label for="" class="label">Data Hafalan Santri</label>
			<table class="table table-hover">
				<tr class="bg-dark text-white">
					<th>No</th>
					<th>Nama Santri</th>
					<th>Nama Surah</th>
					<th>Ayat Ke</th>
					<th>Tanggal Setor</th>
				</tr>
					@foreach($list_hafalan->sortByDesc('tanggal') as $p)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{ucwords($p->nama)}}</td>
					<td>{{ucwords($p->surah)}}</td>
					<td>Ayat {{$p->ayat1}} - {{$p->ayat2}}</td>
					<td>{{$p->tanggal}}</td>
				</tr>
					@endforeach
			</table>
		{{  $list_hafalan->links() }}

		</div>

		
	</div>

</div>
@endsection