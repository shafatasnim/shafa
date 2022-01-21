@foreach(['success', 'danger', 'warning',] as $status)
	@if(session($status))
		<div class="alert alert-{{$status}} alert-dismissable custom-{{$status}}-box">
			<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		</div>
	@endif
@endforeach