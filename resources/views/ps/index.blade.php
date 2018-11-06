    @extends('layouts.generic')
    @section('content')
  @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
    @endif

    <div class="container">

      <div class="row justify-content-center">

        <div class="col-md-8">
          <div align="right">

          <a href="{{ url('ps/create') }}">Insert </a> ||
          <a href="{{ url('ps') }}">Listing for Update/Delete</a>

        </div>

          <div class="card info">

            <div class="card-header">Senarai Aset (Update/Delete)

            <form method="get" action="{{url('ps')}}" class="form-inline">
              @csrf

              <input type="text" name="search" class="form-control">
              <button type="submit" class="btn">Search</button>
              <i class='fa fa-search'></i>
            </form>
          </div>


           <div class="card-body">
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            @if (session('successdelete'))
              <div class="alert alert-warning">
                {{ session('successdelete') }}
              </div>
            @endif

              <table class="table table-striped">

                <thead>

                  <tr>                    
                    <th>ID</th>                      
                    <th>Name</th>                       
                    <th>Desc</th>                       
                    <th>Price</th>

                  </tr>

                </thead>


                <tbody>
                  @foreach($ps as $p)

                  <tr>

                    <td>{{$p['id']}}</td>
                    <td>{{$p['name']}}</td>
                    <td>{{$p['desc']}}</td>             
                    <td>{{$p['price']}}</td>
                    <td><a href="{{action('PController@edit', $p['id'])}}" class="btn btn-warning"> 

                      <i class="fa fa-edit"></i></a></td>
                    <td>
                      <form method="post" 
                      action="{{action('PController@destroy', $p['id'])}}">
                      @csrf
                        
                        <input name="_method" type="hidden" value="DELETE" >
                        <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Are you sure?')"> 
                        <i class="fa fa-remove"></i>
                        </button>

                      </form>


                    <td></td>

                  </tr>

                  @endforeach

                  <tbody>
                  </table>
                  {{$ps-> links()}}


                </div>

              </div>

            </div>

          </div>

        </div>

        @endsection