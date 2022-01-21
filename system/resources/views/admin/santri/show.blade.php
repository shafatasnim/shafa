@extends('admin.template.base')
@section('content')
<div class="card mt-3">
	<div class="card-header">
		<div class="row">
			<div class="col-md-12">
				<h2>Detail Data Santri
					<div class="btn-group float-right">
					
					
					</div>
				</h2>
			</div>
		</div>
		

		
	</div>

	<div class="card-body">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<img src="{{url('public')}}/{{$santri->foto}}" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/OOjs_UI_icon_userAvatar.svg/1200px-OOjs_UI_icon_userAvatar.svg.png';"
    class="posting-logo-img" width="100%">
				</div>

				<div class="col-md-8">
					<table class="table table-hover">
						<tr class="bg-dark">
							<th colspan="2" style="color: white"> Profil Santri <a href="{{url('admin/santri/edit-santri',$santri->id)}}" class="btn btn-warning float-right"><i class="fa fa-pencil"></i></a></th>
						</tr>
						<tr>
							<th>Nama Santri</th>
							<td>: {{ucwords($santri->nama)}}</td>
						</tr>
						<tr>
							<th>NIK</th>
							<td>: {{ucwords($santri->nik)}}</td>
						</tr>
						<tr>
							<th>Jenis Kelamin</th>
							<td>: {{ucwords($santri->jk)}}</td>
						</tr>
						<tr>
							<th>Jenjang Pendidikan</th>
							<td>: {{ucwords($santri->jenjang)}}</td>
						</tr>
						<tr>
							<th>Tempat Lahir</th>
							<td>: {{ucwords($santri->tempat_lahir)}}</td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td>: {{ucwords($santri->tgl_lahir)}}</td> 
						</tr>
					</table>
				</div>
			</div>

			<div class="row">
				@foreach($list_ortu as $o)
				<div class="col-md-6">
					<table class="table table-hover">
						<tr class="bg-dark">
							<th colspan="2" style="color: white"> Profil Ayah <a href="{{url('admin/santri/edit-orangtua',$o->id)}}" class="btn btn-warning float-right"><i class="fa fa-pencil"></i></a></th>
						</tr>
						<tr>
							<th>Nama Ayah</th>
							<td>: {{ucwords($o->nama_ayah)}}</td>
						</tr>
						<tr>
							<th>NIK</th>
							<td>: {{ucwords($o->nik_ayah)}}</td>
						</tr>
						<tr>
							<th>Nomor Handphone</th>
							<td>: {{ucwords($o->no_hp_ayah)}}</td>
						</tr>
						<tr>
							<th>Tempat Lahir</th>
							<td>: {{ucwords($o->tpt_lhr_ayah)}}</td>
						</tr>
						<tr>
							<th>Tanggal Lahir</th>
							<td>: {{ucwords($o->tgl_lhr_ayah)}}</td>
						</tr>
						<tr>
							<td>Status</td>
							<td>: {{ucwords($o->status_ayah)}}</td> 
						</tr>
					</table>
				</div>

				<div class="col-md-6">
					<table class="table table-hover">
						<tr class="bg-dark">
							<th colspan="2" style="color: white"> Profil Ibu <a href="{{url('admin/santri/edit-orangtua',$o->id)}}" class="btn btn-warning float-right"><i class="fa fa-pencil"></i></a></th>
						</tr>
						<tr>
							<th>Nama Ibu</th>
							<td>: {{ucwords($o->nama_ibu)}}</td>
						</tr>
						<tr>
							<th>NIK</th>
							<td>: {{ucwords($o->nik_ibu)}}</td>
						</tr>
						<tr>
							<th>Nomor Handphone</th>
							<td>: {{ucwords($o->no_hp_ayah)}}</td>
						</tr>
						<tr>
							<th>Tempat Lahir</th>
							<td>: {{ucwords($o->tpt_lhr_ibu)}}</td>
						</tr>
						<tr>
							<th>Tanggal Lahir</th>
							<td>: {{ucwords($o->tgl_lhr_ibu)}}</td>
						</tr>
						<tr>
							<td>Status</td>
							<td>: {{ucwords($o->status_ibu)}}</td> 
						</tr>
						<tr>
							<td>Email Aktif</td>
							<td>: {{ucwords($o->email)}}</td> 
						</tr>
					</table>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection