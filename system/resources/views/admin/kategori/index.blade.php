@extends('admin.template.base')
@section('content')
<div class="card mt-3">
	<div class="card-header">
		<div class="row">
			<div class="col-md-6">
				<h2>Data Kategori Pelanggaran</h2>
			</div>
			<div class="col-md-6">
				<button class="btn btn-info float-right" style="float: right;" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data</button>
			</div>
		</div>

		<!-- modal buat data pondok -->

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('admin/kategori/create')}}" method="post" enctype="multipart/form-data">
							@csrf 
							<div class="form-group">
								<label class="label">Kategori Pelanggaran</label>
								<input class="form-control" name="kategori_pelanggaran" type="text" required="" placeholder="Kategori Pelanggaran">
							</div>
							<button class="btn btn-info btn-block">Simpan Data</button>
						</form>
					</div>
				</div>
			</div>
		</div>


		<!-- end modal -->
		
	</div>

	<div class="card-body">
		<div class="container">
			<label class="label">Data Kategori Pelanggaran</label>
			<table class="table table-hover table-sm">
				<tr class="bg-light">
					<th>No</th>
					<th>Aksi</th>
					<th>Kategori Pelanggaran</th>
				</tr>
				@foreach($list_kategori->sortByDesc('id') as $p)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>
						<div class="btn-group">

							<!-- tombol info -->

							<!-- tombol edit -->

							<!-- tombol hapus -->
							@include('admin.template.utils.delete', ['url' =>url('admin/kategori/delete', $p->id)])
							<!-- end tombol hapud -->
						</div>
					</td>
					<td>{{ucwords($p->kategori_pelanggaran)}}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
</div>
@endsection
