@extends('layouts.app')

@section('content')

  <div class="conatiner mt-5">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $viewpost->name }}" disabled>
        </div>
        <div class="mb-3">
          <label for="desc" class="form-label">Description:</label>
          <input type="text" class="form-control" id="desc" name="description" value="{{ $viewpost->description }}" disabled>
        </div>
        <div class="mb-3">
        <label for="desc" class="form-label">Images:</label>
      <img src="{{ asset('images/clients-img/'.$viewpost->path) }}" alt="" width="150px">
     </div>
     <div class="mb-3">
        <label for="desc" class="form-label">Ages:</label>
        <select class="form-select" aria-label="Default select example" name="age"  disabled>
          <option value="">Open this select menu</option>
          <option value="one" {{ $viewpost->age == 'one' ? 'selected':'' }}>One</option>
          <option value="two" {{ $viewpost->age == 'two' ? 'selected':'' }}>Two</option>
          <option value="three" {{ $viewpost->age == 'three' ? 'selected':'' }}>Three</option>

        </select>
       </div>
       <div class="mb-3">
          <label for="name" class="form-label">Pay:</label>
          <input type="text" class="form-control" id="paid" name="paid" value="{{ $viewpost->paid }}" disabled>
        </div>
      </div>
     
    </div>
  </div>

@endsection
