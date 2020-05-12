@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 mx-auto">
      <h2>Edit Question</h2>
      {{-- <hr> --}}
      <div class="card mt-4">
        <div class="card-body p-3">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif


          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="text1">Question:</label>
                <input name="title" type="text" id="text1" class="form-control" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class=" form-group">
                <label for="textarea1">Choice1:</label>
                <input name="title" type="text" id="text1" class="form-control" required>
              </div>
              <div class=" form-group">
                <label for="textarea1">Choice2:</label>
                <input name="title" type="text" id="text1" class="form-control" required>
              </div>
              <div class=" form-group">
                <label for="textarea1">Choice3:</label>
                <input name="title" type="text" id="text1" class="form-control" required>
              </div>
              <div class=" form-group">
                <label for="textarea1">Choice4:</label>
                <input name="title" type="text" id="text1" class="form-control" required>
              </div>
            </div>

            <div class="col-md-12 text-right">
              <div class="buttons">
                <button type="submit" class="btn btn-primary btn-sm px-5 py-2">Save</button>
                <a href="{{ route('admin.users') }}" name="back" role="button" class="btn btn-secondary mr-2">
                  Back
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection