@extends('layouts.generic')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
			<div class="card-header"> Insert New Assets</div>
			<div class="card-body">

				<form method="post" action="{{url('ps')}}">
					@csrf
					<label for="name">Name</label>
					<input type="text" class="form-control" name="name">
					
					<label for="desc">Description</label>
					<input type="text" class="form-control" name="desc">
					
					<label for="price">Price</label>
					<input type="text" class="form-control" name="price">

					<button type="submit" class="btn btn-info">Masukkan Assets</button>

				</form>
			</div>
		</div>
		</div>
		</div>
</div>
@endsection