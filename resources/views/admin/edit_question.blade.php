@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 mx-auto">
      <h2>Edit Question</h2>
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
          <form action="{{ route('admin.question_update', ['id' => $question->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="text1">Question:</label>
                  <input name="question" type="text" id="text1" class="form-control" value="{{ $question->question }}"
                    required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  @foreach ($question->choices as $n => $choice)
                  <div class="custom-control custom-checkbox mt-2">
                    <input type="checkbox" class="custom-control-input" id="custom-check-{{ $n+1 }}"
                      name="check{{ $n+1 }}" {{ $choice->is_correct ? 'checked': "" }}>
                    <label class="custom-control-label" for="custom-check-{{ $n+1 }}">Choice{{ $n+1 }}:</label>
                  </div>
                  <input name="choice{{ $n+1 }}" type="text" id="text{{ $n+1 }}" class="form-control"
                    value="{{ $choice->choice }}" required>
                  @endforeach
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
          </form>
        </div>
      </div>
    </div>

  </div>
  @endsection