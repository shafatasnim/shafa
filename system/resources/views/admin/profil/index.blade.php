@extends('admin.template.base')
@section('content')
<div class="card mt-3">
	<div class="card-header">
		<div class="row">
			<div class="col-md-12">
				<h2>Profil</h2>
			</div>
		</div>

		
	</div>

	<div class="card-body">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<img src="{{url('public')}}/{{$user->foto}}" width="100%">
				</div>

				<div class="col-md-8">
					<table class="table table-hover">
						<tr>
							<th>Nama Pondok</th>
							<td>: {{ucwords($user->nama_pondok)}}</td>
						</tr>
						<tr>
							<th>Admin Pondok</th>
							<td>: {{ucwords($user->nama_admin_pondok)}}</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>: {{ucwords($user->email)}}</td>
						</tr>
						<tr>
							<th>No Tlp</th>
							<td>: {{ucwords($user->no_hp)}}</td>
						</tr>
						<tr>
							<th>Alamat</th>
							<td>: {{ucwords($user->alamat)}}</td>
						</tr>
						<tr>
							<th>Nomor Izin Pondok</th>
							<td>: {{ucwords($user->no_izin)}}</td>
						</tr>
					</table>

					<div class="row">
						<div class="col-md-6">
							<button type="button" class="btn btn-danger mr-2 btn-sm float-right" data-toggle="modal" data-target="#password">
							<i class="fa fa-key "></i> Ganti Password
						</button>
						<div class="modal fade" id="password" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="staticBackdropLabel">Update Profil</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="{{url('admin/update-password',$user->id)}}" method="post">
											@csrf
											@method('PUT')
											<div class="form-group">
												<input class="form-control" name="current" type="password"  required="" placeholder="Password Lama">
											</div>

											<div class="form-group">
												<input class="form-control" name="confirm" type="password"  required="" placeholder="Password Baru">
											</div>

											<div class="form-group">
												<input class="form-control" name="new" type="password"  required="" placeholder="Konfirmasi Password Baru">
											</div>
											<button class="btn btn-info float-right btn-block" onclick="return confirm('Lanjutkan Untuk Mengganti password?')"><i class="fa fa-save" ></i> Ganti Password</button>
										</form>
									</div>
							</div>
						</div>
						</div>

						<div class="col-md-6">
							<button type="button" class="btn btn-dark btn-sm float-right" data-toggle="modal" data-target="#profil">
							<i class="fa fa-pencil "></i> Update Profil
						</button>

						<div class="modal fade" id="profil" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" style="color: black">Update Profil</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="{{url('admin/update-profil',$user->id)}}" method="post">
											@csrf
											@method("PUT")
											<div class="form-group">
												<label for="" class="label">Nama Pondok</label>
												<input type="text" class="form-control" name="nama_pondok" required="" value="{{ucwords($user->nama_pondok)}}">
											</div>
											<div class="form-group">
												<label for="" class="label">Nama Admin Pondok</label>
												<input type="text" class="form-control" name="nama_admin_pondok" required="" value="{{ucwords($user->nama_admin_pondok)}}">
											</div>


											<div class="form-group">
												<label for="" class="label">Sejarah Pondok</label>
												<textarea name="sejarah" class="form-control" id="" cols="30" rows="5">{{$user->sejarah}}</textarea>
											</div>

											<div class="form-group">
												<label for="" class="label">Visi</label>
												<textarea name="visi" class="form-control" id="" cols="30" rows="5">{{$user->visi}}</textarea>
											</div>

											<div class="form-group">
												<label for="" class="label">Misi</label>
												<textarea name="misi" class="form-control" id="" cols="30" rows="5">{{$user->misi}}</textarea>
											</div>

											<div class="form-group">
												<label for="" class="label">Alamat Lenkap</label>
												<input type="text" class="form-control" name="alamat" required="" value="{{ucwords($user->alamat)}}">
											</div>
											<div class="form-group">
												<label for="" class="label">Nomor Izin</label>
												<input type="text" class="form-control" name="no_izin" required="" value="{{ucwords($user->no_izin)}}">
											</div>

											<div class="form-group">
												<label for="" class="label">Nomor Telpon</label>
												<input type="text" class="form-control" name="no_hp" required="" value="{{ucwords($user->no_hp)}}">
											</div>

											<div class="form-group">
												<label for="" class="label">Email</label>
												<input type="email" class="form-control" name="email" required="" value="{{ucwords($user->email)}}">
											</div>
											<div class="form-group">
												<label for="" class="label">Foto</label>
												<input type="file" class="form-control" name="foto"  value="{{ucwords($user->email)}}">
											</div>
											<div class="form-group">
												<button class="btn btn-info btn-block"><i class="fa fa-save"></i> Simpan</button>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card-body py-3">
	<b>Sejarah :</b>
	<p>{!!nl2br($user->sejarah)!!}</p>

	<b>Visi :</b>
	<p>{!!nl2br($user->visi)!!}</p>

	<b>Misi :</b>
	<p>{!!nl2br($user->misi)!!}</p>
</div>
@endsection