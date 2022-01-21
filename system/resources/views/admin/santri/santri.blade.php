@extends('admin.template.base')
@section('content')


<div class="card mt-3">
	<div class="card-header bg-info text-white">
		<div class="row">
			<div class="col-md-12">
				<h2>Buat Data Santri</h2>
			</div>
		</div>
	</div>
</div>
<div class="card border-0">
	<div class="card-body">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h3>Data Santri</h3> <hr>
					<form action="{{url('admin/santri/santri/create')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="label">Nama Santri</label>
							<input class="form-control" name="nama" required="" placeholder="Nama Santri" ></input>
						</div>

						<div class="form-group">
							<label class="label">NIK</label>
							<input type="number" onKeyDown="limitText(this,16);" 
							onKeyUp="limitText(this,16);" class="form-control" name="nik" required="" placeholder="Nomor Induk Keluarga"></input>
						</div>

						<div class="form-group">
							<label class="label">Jenis Kelamin</label><br>
							<input type="radio" name="jk" value="Laki-laki"><label>Laki-Laki</label>
							<input type="radio" name="jk" value="Perempuan"><label>Perempuan</label>
						</div>

						<div class="form-group">
							<label class="label">Jenjang Pendidikan</label>

							<select class="form-control" name="jenjang" required="">
								<option hidden="">-- Pilih Jenjang --</option>
								<option>SD</option>
								<option>SMP</option>
								<option>SMA</option>
								<option>Perguruan Tinggi</option>
							</select>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label">Tempat Lahir</label>
									<input class="form-control" name="tempat_lahir" required="" placeholder="Tempat Lahir"></input>
								</div>
							</div>

							<div class="col-md-6">


								<div class="form-group">
									<label class="label">Tanggal Lahir</label> 
									<input type="date" class="form-control" name="tgl_lahir" required="" placeholder="Tanggal Lahir"></input>
								</div>
							</div>

							<div class="form-group">
								<label class="label">Foto</label>
								<input class="form-control" name="foto"  type="file" accept="image/*">
							</div>
						</div>

						
					</div>


					<div class="col-md-6">
						<h3>Data Orang Tua</h3> <hr>
						<div class="form-group">
							<label class="label">Nama Ayah</label>
							<input class="form-control" name="nama_ayah" required="" placeholder="Nama Ayah"></input>
						</div>

						<div class="form-group">
							<label class="label">Nama Ibu</label>
							<input class="form-control" name="nama_ibu" required="" placeholder="Nama Ibu"></input>
						</div>

						<div class="form-group">
							<label class="label">No KK</label>
							<input type="number" onKeyDown="limitText(this,16);" 
							onKeyUp="limitText(this,16);" class="form-control" name="no_kk" required="" placeholder="Nomor Kartu Keluarga"></input>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label class="label">NIK Ayah</label>
								<input type="number" onKeyDown="limitText(this,16);" 
								onKeyUp="limitText(this,16);" class="form-control" name="nik_ayah" required="" placeholder="Nomor Induk Keluarga"></input>
							</div>

							<div class="col-md-6">
								<label class="label">NIK Ibu</label>
								<input type="number" onKeyDown="limitText(this,16);" 
								onKeyUp="limitText(this,16);" class="form-control" name="nik_ibu" required="" placeholder="Nomor Induk Keluarga"></input>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label">Tempat Lahir Ayah</label>
									<input class="form-control" name="tpt_lhr_ayah" required="" placeholder="Tempat Lahir"></input>
								</div>
							</div>

							<div class="col-md-6">


								<div class="form-group">
									<label class="label">Tempat Lahir Ibu</label>
									<input class="form-control" name="tpt_lhr_ibu" placeholder="Tempat Lahir"></input>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label">Tanggal Lahir Ayah</label>
									<input type="date" class="form-control" name="tgl_lhr_ayah" required="" placeholder="Tanggal Lahir"></input>
								</div>
							</div>

							<div class="col-md-6">


								<div class="form-group">
									<label class="label">Tanggal Lahir Ibu</label>
									<input type="date" class="form-control" name="tgl_lhr_ibu" required="" placeholder="Tanggal Lahir"></input>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label">Nomor Hp Ayah</label>
									<input class="form-control" name="no_hp_ayah" required="" placeholder="Nomor Hp"></input>
								</div>
							</div>

							<div class="col-md-6">


								<div class="form-group">
									<label class="label">Nomor Hp Ibu</label>
									<input class="form-control" name="no_hp_ibu" required="" placeholder="Nomor Hp"></input>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="label">Status Ayah</label>
									<select class="form-control" name="status_ayah">
										<option hidden="">-- Status Ayah --</option>
										<option>Masih Hidup</option>
										<option>Meninggal</option>
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label class="label">Status Ibu</label>
									<select class="form-control" name="status_ibu">
										<option hidden="">-- Status Ibu --</option>
										<option>Masih Hidup</option>
										<option>Meninggal</option>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="label">Email Aktif</label>
							<input class="form-control" name="email" required="" placeholder="Email"></input>
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