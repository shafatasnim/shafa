@extends('orangtua.template.base')
@section('content')
<div class="card">
	<div class="card-header">
		<h2>Profil Pondok</h2>
	</div>

	<div class="card-body">
		@foreach($list_pondok->take('1') as $p)
		<div class="row shadow pb-3 ">	
				<div class="col-md-6">
				<img src="{{url('public')}}/{{$p->foto}}" class="shadow" width="100%" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/OOjs_UI_icon_userAvatar.svg/1200px-OOjs_UI_icon_userAvatar.svg.png';">	
				</div>
				<div class="col-md-6">
						<h3 class="label">Kontak Pondok</h3>
					<div class="card border-0 shadow" style="overflow-y: scroll;">
						<table class="table table-hover">	
							<tr>	
									<th>Nama Pondok</th>
									<td>: {{ucwords($p->nama_pondok)}}</td>
							</tr>
							<tr>	
									<th>Nama Admin Pondok</th>
									<td>: {{ucwords($p->nama_admin_pondok)}}</td>
							</tr>
							<tr>	
									<th>Nomor Tlp</th>
									<td>: {{$p->no_hp}}</td>
							</tr>
							<tr>	
									<th>Email</th>
									<td>: {{ucwords($p->email)}}</td>
							</tr>
							<tr>	
									<th>Alamat</th>
									<td>: {{ucwords($p->alamat)}}</td>
							</tr>
							<tr>	
									<th>No Izin Pondok</th>
									<td>: {{ucwords($p->no_izin)}}</td>
							</tr>
							<tr>	
									<td colspan="2">
											<a href="https://api.whatsapp.com/send?phone={{$p->no_hp}}" target="_blank" class="btn btn-success"><i class="fa fa-whatsapp"></i> Hubungi Via Whatsapp</a>

									</td>
							</tr>
						</table>	
					</div>	
				</div>
		</div>
		<div class="mt-5  shadow">
			<div class="col-md-12">
				<div class="card-header">	
					<h3>Sejarah</h3>
				</div>			
				<div class="card-body">	
							<p>{!!nl2br($p->sejarah)!!}</p>
				</div>	
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-6">
				<div class="card-body shadow">
					<div class="card-header">
						<h3>Visi Pondok</h3>
					</div>
					<div class="card-body">	

							{!!nl2br($p->visi)!!}	

					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card-body shadow">
					<div class="card-header">
						<h3>Misi Pondok</h3>
					</div>
					<div class="card-body">	

							{!!nl2br($p->misi)!!}	

					</div>	
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection