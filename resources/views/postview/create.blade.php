@extends('layouts.app')

@section('content')

  <div class="conatiner mt-5">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
      <form enctype="multipart/form-data" action="{{ route('poststore') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name">
          @if ($errors->has('name'))
          <div class="invalid-feedback">
            {{ $errors->first('name') }}
          </div>
          @endif
        </div>
        <div class="mb-3">
          <label for="desc" class="form-label">Description</label>
          <input type="text" class="form-control" id="desc" name="description">
          @if ($errors->has('description'))
          <div class="invalid-feedback">
            {{ $errors->first('description') }}
          </div>
          @endif
        </div>

        <div class="mb-3">
          <label for="desc" class="form-label">Images</label>
          <input type="file" class="form-control"  name="image">
        </div>
        <div class="mb-3">
        <label for="desc" class="form-label">Ages</label>
        <select class="form-select" aria-label="Default select example" name="age">
          <option selected>Open this select menu</option>
          <option value="One">One</option>
          <option value="Two">Two</option>
          <option value="Three">Three</option>
        </select>
       </div>
        <button type="submit" class="btn btn-primary w-100">Create Post</button>
      </form>
      </div>
    </div>
  </div>

@endsection
