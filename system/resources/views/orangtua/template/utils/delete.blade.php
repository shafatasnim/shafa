<form action="{{$url}}" method="post" class="btn-group"onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">
	@csrf
	@method("delete")
	<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
</form>