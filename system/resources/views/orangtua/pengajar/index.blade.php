@extends('orangtua.template.base')
@section('content')
<div class="card mt-3">
	<div class="card-header">
		<div class="row">
			<div class="col-md-12">
				<h2>Profil Pengajar Pondok</h2>
			</div>
			
		</div>
	</div>

	<div class="row card-body">
		@foreach($list_pengajar as $p)
		<div class="col-md-12 mt-5 shadow">
			<div class="row">
				<div class="col-md-4">
					<img src="{{url('public')}}/{{$p->foto}}" class="pt-3" width="100%" alt="" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/OOjs_UI_icon_userAvatar.svg/1200px-OOjs_UI_icon_userAvatar.svg.png';">
				</div>
				<div class="col-md-8" style="overflow-x: scroll;">
					<table class="table table-hover">
						<tr class="bg-dark text-white">
							<th colspan="2">Profil Pengajar

							</th>
						</tr>
						<tr>
							<td>Nama</td>
							<td>: {{ucwords($p->nama_pengajar)}}</td>
						</tr>
						<tr>
							<td>Jenis Majelis</td>
							<td>: {{ucwords($p->jenis_majelis)}}</td>
						</tr>
						<tr>
							<td>Nama Majelis</td>
							<td>: {{ucwords($p->nama_majelis)}}</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>: {{ucwords($p->alamat)}}</td>
						</tr>
						<tr>
							<td>Nomor Telephon</td>
							<td>: {{ucwords($p->no_hp)}}</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>: {{ucwords($p->email)}}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		@endforeach
		

		

	</div>

	
</div>

</div>
@endsection