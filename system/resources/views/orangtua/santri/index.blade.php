@extends('orangtua.template.base')
@section('content')
<div class="card shadow mt-3 border-0">
	<div class="card-header bg-info text-white border-0">
		<div class="row">
			<div class="col-md-12">
				<h2>Data Anak Anda</h2>
			</div>
		</div>


	</div>
	<div class="card border-0">
		<div class="card-body">
			<div class="container">
				<label class="label">Data Santri</label>
				@foreach($list_santri as $s)
				<div class="row shadow-lg pt-3 mb-6">
					<div class="col-md-3">
						<img src="{{url('public')}}/{{$s->foto}}" width="100%" style="border-radius: 10px" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/OOjs_UI_icon_userAvatar.svg/1200px-OOjs_UI_icon_userAvatar.svg.png';">
					</div>
					<div class="col-md-9">
						<table class="table table-hover">
							<tr class="bg-dark text-white">
								<td colspan="2">Profil Santri</td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>: {{ucwords($s->nama)}}</td>
							</tr>
							<tr>
								<td>NIK</td>
								<td>: {{$s->nik}}</td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td>: {{$s->jk}}</td>
							</tr>
							<tr>
								<td>Jenjang Pendidikan</td>
								<td>: {{ucwords($s->jenjang)}}</td>
							</tr>
							<tr>
								<td>Tempat Tgl. Lahir</td>
								<td>: {{ucwords($s->tempat_lahir)}}, {{$s->tgl_lahir}}</td>
							</tr>
							<tr>
								<td>Tanggal Daftar</td>
								<td>: {{ucwords($s->created_at)}}</td>
							</tr>
							<tr>
						</table>
					</div>
				</div> 

				@endforeach
			</div>
		</div>
	</div>
	@endsection