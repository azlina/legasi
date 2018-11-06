    @extends('layouts.generic')
    @section('content')
  @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
    @endif

<form method="post" action="{{action('PController@update', $id)}}">
@csrf
<input name="_method" type="hidden" value="PATCH">

        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name"
               value="{{$p->name}}">

        <label for="desc">Description:</label>
        <input type="text" class="form-control" name="desc" value="{{$p->desc}}">

        <label for="price">Price:</label>
        <input type="text" class="form-control" name="price" value="{{$p->price}}">

        <button type="submit" class="btn btn-success">Save Update</button>

</form>
@endsection