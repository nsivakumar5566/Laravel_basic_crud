@extends('layouts.app')

@section('content')

<div class="container mt-5">
  <div class="row"> 
    <div class="col-lg-8 offset-lg-2">

      <div class="row mb-5">
        <div class="col-lg-6">
          @if ($message = Session::get('success'))
          <div class="alert alert-success">
           {{ $message }}
          </div>
          @endif

        </div>
        <div class="col-lg-6 text-end">
          <a class="btn btn-primary" href="{{ route('postcreate') }}">Add new post</a> 
        </div>
      </div>


      <div class="row">
        <table class="table table-bordered">
          <thead class="text-center">
            <tr>
              <th>S.No</th>
              <th>Name</th>
              <th>Description</th>
              <th>Images</th>
              <th>Ages</th>
              <th>Pay</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($posts as $value)
        <tr>
          <td>{{++$i}}</td>
              <td>{{$value->name}}</td>
              <td>{{$value->description}}</td>
             <td><img src="{{ asset('images/clients-img/'.$value->path) }}" alt="" width="150px"></td>
             <td>{{$value->age}}</td>
             <td>{{$value->paid}}</td>
             <td class="text-center">
                    <a href="{{ route('postview', $value->id) }}" class="btn btn-primary">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('postedit', $value->id) }}" class="btn btn-success">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{ route('postdelete', [$value->id, $value->path]) }}" class="btn btn-success">
                      <i class="fa fa-trash"></i>
                    </a>
                </form>
              </td>
            </tr>
        @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
  console.log( "document loaded" );
    setTimeout(function(){

        $("div.alert").remove();

    },2000);

});

</script>
@endsection