@extends('orangtua.template.base')
@section('content')
<div class="card mt-3">
	<div class="card-header">
		<div class="row">
			<div class="col-md-12">
				<h2>Data Pelanggaran Anak Anda</h2>
			</div>
			</div>
		</div>

		<div class="row card-body">
			<label for="" class="label">Data Hafalan Santri</label>
			<table class="table table-hover">
				<tr class="bg-dark text-white">
					<th>No</th>
					<th>Aksi</th>
					<th>Nama Santri</th>
					<th>Kategori Pelanggaran</th>
					<th>Tanggal Pelanggaran</th>
					
				</tr>
				@foreach($list_pelanggaran as $p)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>
						<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#info{{$p->idp}}">
						<i class="fa fa-info"></i></button>
					</td>
					<td>{{ucwords($p->nama)}}</td>
					<td>{{ucwords($p->kategori_pelanggaran)}}</td>
					<td>{{$p->tgl}}</td>
				</tr>

				<!-- Modal -->
<div class="modal fade" id="info{{$p->idp}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
        	<div class="card-header">
        		<img src="{{url('public')}}/{{$p->buktinya}}" alt="" width="100%">
        	</div>
        	<div class="card-header">
        		<b>Deskripsi Pelanggaran :</b> 
        		<p>{{$p->deskripsi}}</p>
        	</div>
        </div>
      </div>
    </div>
  </div>
</div>
				@endforeach
			</table>
		{{  $list_pelanggaran->links() }}

		</div>

		
	</div>

</div>
@endsection