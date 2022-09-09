@extends('layouts.app')

@section('content')
<div class="conatiner mt-5">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
      <form enctype="multipart/form-data" action="{{ route('postupdate', [$editpost->id, $editpost->path]) }}" method="POST">
        @csrf
        <!--  @method('PUT') -->
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{$editpost->name}}">
        </div>
        <div class="mb-3">
          <label for="desc" class="form-label">Description</label>
          <input type="text" class="form-control" id="desc" name="description" value="{{$editpost->description}}">   
        </div>
        <div class="mb-3">
          <label for="desc" class="form-label">Images</label>
          <input type="file" class="form-control"  name="image" >
          @if ($errors->has('image'))
          <div class="invalid-feedback">  
            {{ $errors->first('image') }}
          </div>
          @endif
        </div>
        <div class="mb-3">
        <img src="{{ asset('images/clients-img/'.$editpost->path) }}" alt="" height="100px" width="100px">
        </div>
        <div class="mb-3">
        <label for="desc" class="form-label">Ages</label>
        <select class="form-select" aria-label="Default select example" name="age" >
          <option value="">Open this select menu</option>
          <option {{ $editpost->age == 'One' ? 'selected':'' }}>One</option>
          <option {{ $editpost->age == 'Two' ? 'selected':'' }}>Two</option>
          <option {{ $editpost->age == 'Three' ? 'selected':'' }}>Three</option>

        </select>
       </div>
       <div class="mb-3">
          <label for="name" class="form-label">Pay:</label>
          <input type="text" class="form-control" id="paid" name="paid" value="{{ $editpost->paid }}" >
        </div>
        <button type="submit" class="btn btn-primary w-100">Update Post</button>
      </form>
      </div>
   
      </div>
    </div>
  </div>



@endsection