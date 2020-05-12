@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 mx-auto">
      <h2>Add Question [{{ $category->title }}]</h2>
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
          <form action="{{ route('admin.question_store', ['id' => $category->id]) }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="text1">Question:</label>
                  <input name="question" type="text" id="text1" class="form-control" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <div class="custom-control custom-checkbox mt-2">
                    <input type="checkbox" class="custom-control-input" id="custom-check-1" name="check1">
                    <label class="custom-control-label" for="custom-check-1">Choice1:</label>
                  </div>
                  <input name="choice1" type="text" id="text1" class="form-control" required>

                  <div class="custom-control custom-checkbox mt-2">
                    <input type="checkbox" class="custom-control-input" id="custom-check-2" name="check2">
                    <label class="custom-control-label" for="custom-check-2">Choice2:</label>
                  </div>
                  <input name="choice2" type="text" id="text1" class="form-control" required>

                  <div class="custom-control custom-checkbox mt-2">
                    <input type="checkbox" class="custom-control-input" id="custom-check-3" name="check3">
                    <label class="custom-control-label" for="custom-check-3">Choice3:</label>
                  </div>
                  <input name="choice3" type="text" id="text1" class="form-control" required>

                  <div class="custom-control custom-checkbox mt-2">
                    <input type="checkbox" class="custom-control-input" id="custom-check-4" name="check4">
                    <label class="custom-control-label" for="custom-check-4">Choice4:</label>
                  </div>
                  <input name="choice4" type="text" id="text1" class="form-control" required>

                </div>
              </div>
            </div>

            <div class="col-md-12 text-right">
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
</div>
@endsection