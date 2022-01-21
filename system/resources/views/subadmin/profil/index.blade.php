@extends('subadmin.template.base')
@section('content')
<div class="card mt-3">
	<div class="card-header">
		<div class="row">
			<div class="col-md-12">
				<h2>Profil Admin Aplikasi</h2>
			</div>
		</div>


		<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 			Buat Admin Pondok
		</button>
	-->

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{url('subadmin/profil/create')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="" class="label">Nama</label>
							<input type="text" name="nama" class="form-control">
						</div>

						<div class="form-group">
							<label for="" class="label">Email</label>
							<input type="text" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label for="" class="label">Alamat</label>
							<input type="text" name="alamat" class="form-control">
						</div>
						<div class="form-group">
							<label for="" class="label">No Hp</label>
							<input type="text" name="notlp" class="form-control">
						</div>
						<div class="form-group">
							<label for="" class="label">Foto</label>
							<input type="file" name="foto" class="form-control">
						</div>
						<div class="form-group">
							<label for="" class="label">New Password</label>
							<input type="password" name="password" class="form-control">
						</div>

						<div class="form-group">
							<button class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>		
</div>

<div class="card-body">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img src="{{url('public')}}/{{$user->foto}}" alt="" width="100%">
			</div>

			<div class="col-md-8">

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
											<form action="{{url('subadmin/update-profil',$user->id)}}" method="post">
												@csrf
												@method("PUT")
												<div class="form-group">
													<label for="" class="label">Nama</label>
													<input type="text" name="nama" class="form-control" value="{{$user->nama}}">
												</div>

												<div class="form-group">
													<label for="" class="label">Email</label>
													<input type="text" name="email" class="form-control" value="{{$user->email}}">
												</div>
												<div class="form-group">
													<label for="" class="label">Alamat</label>
													<input type="text" name="alamat" class="form-control" value="{{$user->alamat}}">
												</div>
												<div class="form-group">
													<label for="" class="label">No Hp</label>
													<input type="text" name="notlp" class="form-control" value="{{$user->notlp}}">
												</div>
												<div class="form-group">
													<label for="" class="label">Foto</label>
													<input type="file" name="foto" class="form-control">
												</div>

												<div class="form-group">
													<button class="btn btn-primary">Simpan</button>
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
											<form action="{{url('subadmin/update-password',$user->id)}}" method="post">
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
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>




						</th>
					</tr>
					<tr>
						<td>Nama</td>
						<td>: {{ucwords($user->nama)}}</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>: {{ucwords($user->email)}}</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>: {{ucwords($user->alamat)}}</td>
					</tr>
					<tr>
						<td>Nomor Telephon</td>
						<td>: {{ucwords($user->notlp)}}</td>
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
		@endsection