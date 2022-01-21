@include('pengajar.template.section.assets')

<div class="comtainer">
	<div class="mb-4">
		<h5>
		Nama Pengajar : {{ucwords($user->nama_pengajar)}} <br>
		Nama Majelis : {{ucwords($user->nama_majelis)}} <br>
		Jenis Majelis : {{ucwords($user->jenis_majelis)}}
		</h5>
	</div>
	<p>
		Catatan absensi kehadiran pada majelis <b> {{ucwords($user->nama_majelis)}}</b> dan jenis majelis <b>{{ucwords($user->jenis_majelis)}}</b>
		yang diampu oleh <b>{{ucwords($user->nama_pengajar)}}</b>
	</p>
	<table class="table">
	<tr>
		<th>No</th>
		<th>Tanggal</th>
		<th>Nama Santri</th>
		<th>Satus Kehadiran</th>
	</tr>

	@foreach($list_absensi->sortBy('tanggal') as $a)
<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$a->tanggal}}</td>
	<td>{{ucwords($a->nama)}}</td>
	<td>{{$a->status_kehadiran}}</td>
</tr>
	@endforeach
</table>
</div>

<script>
	window.print();
</script>