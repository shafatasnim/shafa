@extends('pengajar.template.base')
@section('content')
<div class="card mt-3">
	<div class="card-header">
		<div class="row">
			<div class="col-md-12">
				<h2>Profil</h2>
			</div>
			
		</div>
	</div>

	<div class="row card-body">
		<div class="col-md-4">
			<img src="{{url('public')}}/{{$user->foto}}" width="100%" alt="" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/OOjs_UI_icon_userAvatar.svg/1200px-OOjs_UI_icon_userAvatar.svg.png';">
		</div>

		<div class="col-md-8" style="overflow-x: scroll;">
			<table class="table table-hover">
				<tr class="bg-dark text-white">
					<th colspan="2">Profil Akun
						

						<!-- profil -->
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
										<form action="{{url('pengajar/update-profil',$user->id)}}" method="post">
											@csrf
											@method("PUT")
											<div class="form-group">
												<label for="" class="label">Nama Lengkap</label>
												<input type="text" class="form-control" name="nama_pengajar" required="" value="{{ucwords($user->nama_pengajar)}}">
											</div>
											<div class="form-group">
												<label for="" class="label">Jenis Majelis</label>
												<select name="jenis_majelis" id="" class="form-control">
													<option value="{{$user->jenis_majelis}}" hidden="">{{ucwords($user->jenis_majelis)}}</option>
													<option value="Qur'an">Qur'an</option>
													<option value="Kitab">Kitab</option>
												</select>
											</div>


											<div class="form-group">
												<label for="" class="label">Nama Majelis</label>
												<input type="text" class="form-control" name="nama_majelis" required="" value="{{ucwords($user->nama_majelis)}}">
											</div>

											<div class="form-group">
												<label for="" class="label">Alamat Lenkap</label>
												<input type="text" class="form-control" name="alamat" required="" value="{{ucwords($user->alamat)}}">
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
												<button class="btn btn-info btn-block" onclick="return confirm('Yakin Update Profil?')"><i class="fa fa-save"></i> Simpan</button>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>

						


						<!-- password -->
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
										<form action="{{url('pengajar/update-password',$user->id)}}" method="post">
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
											<button class="btn btn-info float-right btn-block"><i class="fa fa-save" onclick="return confirm('Lanjutkan Untuk Mengganti password?')"></i> Ganti Password</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</th>
				</tr>
				<tr>
					<td>Nama</td>
					<td>: {{ucwords($user->nama_pengajar)}}</td>
				</tr>
				<tr>
					<td>Jenis Majelis</td>
					<td>: {{ucwords($user->jenis_majelis)}}</td>
				</tr>
				<tr>
					<td>Nama Majelis</td>
					<td>: {{ucwords($user->nama_majelis)}}</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>: {{ucwords($user->alamat)}}</td>
				</tr>
				<tr>
					<td>Nomor Telephon</td>
					<td>: {{ucwords($user->no_hp)}}</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>: {{ucwords($user->email)}}</td>
				</tr>
				<tr>
					<td><button type="button" class="btn btn-danger mr-2 btn-sm float-right" data-toggle="modal" data-target="#password">
							<i class="fa fa-key "></i> Ganti Password
						</button>

						
					</td>
					<td>
						<button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#profil">
							<i class="fa fa-pencil "></i> Update Profil
						</button>
					</td>
				</tr>
			</table>
		</div>

	</div>

	
</div>

</div>
@endsection