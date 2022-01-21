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
				<div class="col-md-12">
					<h3>Data Santri</h3> <hr>
					<form action="{{url('admin/santri/saudara/create')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="label" >Nomor KK</label>
							<select name="no_kk" required="" class="form-control">
								<option value="">Pilih No KK</option>
								@foreach($list_orangtua as $o)
								<option value="{{$o->no_kk}}">{{$o->no_kk}} | {{ucwords($o->nama_ayah)}} | {{ucwords($o->nama_ibu)}} </option>
								@endforeach
							</select>
						</div>
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
				</div>	
				<button class="btn btn-info">simpan</button>
			</form>
		</div>
	</div>

</div>
</div>
</div>
@endsection
