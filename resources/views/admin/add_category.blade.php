@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <h2>Add Category</h2>
      {{-- <hr> --}}
      <div class="card mt-4">
        <div class="card-header p-3">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form action="{{ route('admin.category_store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="text1">Title:</label>
              <input name="title" type="text" id="text1" class="form-control" value="{{ old('title') }}">
            </div>
            <div class=" form-group">
              <label for="textarea1">Description:</label>
              <textarea name="description" id="textarea1" class="form-control"
                value="{{ old('description') }}"></textarea>
            </div>
            <div class=" col-md-12 text-right">
              <div class="buttons">
                <button type="submit" class="btn btn-primary btn-sm px-5 py-2">Add</button>
                <a href="{{ route('admin.users') }}" name="back" role="button" class="btn btn-secondary mr-2">
                  Back
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection