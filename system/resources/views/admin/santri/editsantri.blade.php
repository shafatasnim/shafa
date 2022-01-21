@extends('admin.template.base')
@section('content')

<!----- Edit Data Santri ----->
<div class="card mt-3">
	<div class="card-header bg-info text-white">
		<div class="row">
			<div class="col-md-12">
				<h2>Edit Data Santri</h2>
			</div>
		</div>

	</div>
</div>
<div class="card border-0">
	<div class="card-body">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3>Data Santri</h3> <hr>
					<form action="{{url('admin/santri/edit-santri',$santri->id)}}" method="post" enctype="multipart/form-data">
						@csrf
						@method("PUT")
						<div class="form-group">
							<label class="label">Nama Santri</label>
							<input class="form-control" name="nama" required="" value="{{ucwords($santri->nama)}}" placeholder="Nama Santri" ></input>
						</div>

						<div class="form-group">
							<label class="label">NIK</label>
							<input type="number" onKeyDown="limitText(this,16);" 
							onKeyUp="limitText(this,16);" class="form-control" name="nik" required="" value="{{ucwords($santri->nik)}}" placeholder="Nomor Induk Keluarga"></input>
						</div>

						<div class="form-group">
							<label class="label">Jenis Kelamin</label><br>
							<label><input type="radio" name="jk" value="Laki-laki" <?php if($santri['jk']=='Laki-laki') echo 'checked'?>>Laki-laki</label>
							<label><input type="radio" name="jk" value="Perempuan" <?php if($santri['jk']=='Perempuan') echo 'checked'?>>Perempuan</label>

						</div>

						<div class="form-group">
							<label class="label">Jenjang Pendidikan</label>

							<select class="form-control" name="jenjang" required="">
								<option hidden="" selected="">{{$santri->jenjang}}</option>
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
									<input class="form-control" name="tempat_lahir" value="{{ucwords($santri->tempat_lahir)}}" required="" placeholder="Tempat Lahir"></input>
								</div>
							</div>

							<div class="col-md-6">


								<div class="form-group">
									<label class="label">Tanggal Lahir</label> 
									<input type="date" class="form-control" name="tgl_lahir" value="{{ucwords($santri->tgl_lahir)}}" required="" placeholder="Tanggal Lahir"></input>
								</div>
							</div>
						</div>

						
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