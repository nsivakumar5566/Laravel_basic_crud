@extends('layouts.app')

@section('content')

  <div class="conatiner mt-5">
    <div class="row">

       @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
      <div class="col-lg-6 offset-lg-3">
      <form enctype="multipart/form-data" action="{{ route('poststore') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name">
          @if ($errors->has('name'))
          
            <span class="error" style="color:red;">{{ $errors->first('name') }}</span>
          
          @endif
        </div>
        <div class="mb-3">
          <label for="desc" class="form-label">Description</label>
          <input type="text" class="form-control" id="desc" name="description">
          @if ($errors->has('description'))
        
          <span class="error" style="color:red;">{{ $errors->first('description') }}</span>
         
          @endif
        </div>

        <div class="mb-3">
          <label for="desc" class="form-label">Images</label>
          <input type="file" class="form-control"  name="image">
          @if ($errors->has('image'))
        
        <span class="error" style="color:red;">{{ $errors->first('image') }}</span>
       
        @endif
        </div>
        <div class="mb-3">
        <label for="desc" class="form-label">Ages</label>
        <select class="form-select" aria-label="Default select example" name="age">
          <option value="">Open this select menu</option>
          <option value="one">One</option>
          <option value="two">Two</option>
          <option value="three">Three</option>
        </select>
        @if ($errors->has('age'))
        
        <span class="error" style="color:red;">{{ $errors->first('age') }}</span>
       
        @endif
       </div>

       <div class="mb-3">
          <label for="name" class="form-label">Pay</label>
          <input type="text" class="form-control" id="paid" name="paid">
          @if ($errors->has('paid'))
          
            <span class="error" style="color:red;">{{ $errors->first('paid') }}</span>
          
          @endif
        </div>
        <button type="submit" class="btn btn-primary w-100">Create Post</button>
      </form>
      </div>
    </div>
  </div>

@endsection
