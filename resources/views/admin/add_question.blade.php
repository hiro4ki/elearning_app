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
                  @for ($i = 1; $i <= 4; $i++) <div class="custom-control custom-radio mt-2">
                    <input type="radio" class="custom-control-input" id="customRadio{{ $i }}" name="radio"
                      value={{ $i }}>
                    <label class="custom-control-label" for="customRadio{{ $i }}">Choice{{ $i }}:</label>
                </div>
                <input name="choice{{ $i }}" type="text" id="text{{ $i }}" class="form-control" required>
                @endfor
              </div>
            </div>
        </div>

        <div class="col-md-12 text-right">
          <div class="buttons">
            <button type="submit" class="btn btn-primary btn-sm px-5 py-2">Add</button>
            <a href="{{ route('admin.edit_category', ['id' => $category->id]) }}" name="back" role="button"
              class="btn btn-secondary mr-2">
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