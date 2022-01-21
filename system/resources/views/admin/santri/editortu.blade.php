@extends('admin.template.base')
@section('content')

<!----- Edit Data Santri ----->
<div class="card mt-3">
	<div class="card-header bg-info text-white">
		<div class="row">
			<div class="col-md-12">
				<h2>Edit Data Orangtua</h2>
			</div>
		</div>
		
	</div>
</div>
<div class="card border-0">
	<div class="card-body">
		<div class="container">
			<div class="col-md-12">
				<form action="{{url('admin/santri/edit-orangtua',$orangtua->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					@method("PUT")
					<div class="row">
						<h3>Data Orang Tua</h3> <hr>

						<div class="form-group">
							<label class="label">No KK</label>
							<input type="number" onKeyDown="limitText(this,16);" 
							onKeyUp="limitText(this,16);" class="form-control" name="no_kk" required="" value="{{ucwords($orangtua->no_kk)}}" placeholder="Nomor Kartu Keluarga"></input>
						</div>


						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label">Nama Ayah</label>
									<input class="form-control" name="nama_ayah" value="{{ucwords($orangtua->nama_ayah)}}" required="" placeholder="Nama Ayah"></input>
								</div>
							</div>


							<div class="col-md-6">
								<div class="form-group">
									<label class="label">Nama Ibu</label>
									<input class="form-control" name="nama_ibu" value="{{ucwords($orangtua->nama_ibu)}}" required="" placeholder="Nama Ibu"></input>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label">NIK Ayah</label>
									<input type="number" onKeyDown="limitText(this,16);" 
									onKeyUp="limitText(this,16);" class="form-control" name="nik_ayah" required="" value="{{ucwords($orangtua->nik_ayah)}}" placeholder="Nomor Induk Keluarga"></input>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label">NIK Ibu</label>
									<input type="number" onKeyDown="limitText(this,16);" 
									onKeyUp="limitText(this,16);" class="form-control" name="nik_ibu" required="" value="{{ucwords($orangtua->nik_ibu)}}" placeholder="Nomor Induk Keluarga"></input>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label">Tempat Lahir Ayah</label>
									<input class="form-control" name="tpt_lhr_ayah" value="{{ucwords($orangtua->tpt_lhr_ayah)}}" required="" placeholder="Tempat Lahir"></input>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label">Tempat Lahir Ibu</label>
									<input class="form-control" name="tpt_lhr_ibu" value="{{ucwords($orangtua->tpt_lhr_ibu)}}" placeholder="Tempat Lahir"></input>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label">Tanggal Lahir Ayah</label>
									<input type="date" class="form-control" name="tgl_lhr_ayah" value="{{ucwords($orangtua->tgl_lhr_ayah)}}" required="" placeholder="Tanggal Lahir"></input>
								</div>
							</div>

							<div class="col-md-6">


								<div class="form-group">
									<label class="label">Tanggal Lahir Ibu</label>
									<input type="date" class="form-control" name="tgl_lhr_ibu" value="{{ucwords($orangtua->tgl_lhr_ibu)}}" required="" placeholder="Tanggal Lahir"></input>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label">Nomor Hp Ayah</label>
									<input class="form-control" name="no_hp_ayah" value="{{ucwords($orangtua->no_hp_ayah)}}" required="" placeholder="Nomor Hp"></input>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label">Nomor Hp Ibu</label>
									<input class="form-control" name="no_hp_ibu" value="{{ucwords($orangtua->no_hp_ibu)}}" required="" placeholder="Nomor Hp"></input>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label">Status Ayah</label>
									<select class="form-control" name="status_ayah" value="{{ucwords($orangtua->status_ayah)}}">
										<option hidden="">{{$orangtua->status_ayah}}</option>
										<option>Masih Hidup</option>
										<option>Meninggal</option>
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label">Status Ibu</label>
									<select class="form-control" name="status_ibu" value="{{ucwords($orangtua->status_ibu)}}">
										<option hidden="">{{$orangtua->status_ibu}}</option>
										<option>Masih Hidup</option>
										<option>Meninggal</option>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="label">Email Aktif</label>
							<input class="form-control" name="email" value="{{ucwords($orangtua->email)}}" required="" placeholder="Email"></input>
						</div>
					</div>	
					<button class="btn btn-info">simpan</button>
				</form>
			</div>
		</div>

	</div>
</div>
</div>
@endsection