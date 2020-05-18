@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12 mx-auto">
      <h1 class="mb-3">{{ $category->title }}</h1>
      <div class="card mt-4">
        <div class="card-body p-3">
          <div class="row">

            <div class="col-md-6 align-self-center">
              <h2 class="ml-3">{{ $questions[0]->question }}</h2>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                @foreach ($questions[0]->choices as $n => $choice)
                <form
                  action="{{ route('user.store_answer', ['choice' => $choice->id, 'page' => $questions->currentPage()]) }}"
                  method="POST">
                  @csrf
                  <label class="" for="">Choice{{ $n+1 }}:</label>
                  <button class="btn btn-primary form-control mb-3"> {{ $choice->choice }} </button>
                  {{-- <input type="hidden" name="" value="{{  }}"> --}}
                </form>
                @endforeach
              </div>
            </div>

            <div class="col-md-6 text-left">
              <a href="#" name="stop" role="button" class="btn btn-secondary mr-2">
                Stop
              </a>
            </div>
            <div class="col-md-6 text-right">
              {{-- @if ($question_number > 0)
              <a href="{{ route('user.lesson_answer', ['user_id' => $lesson->user_id, 'category_id' => $category->id, 'question_number' => $question_number - 1]) }}"
              name="back" role="button" class="btn btn-outline-info px-3 mr-2">
              Back
              </a>
              @endif --}}

              {{-- @if ($category->questions->count() > $question_number+1)
              <a href="{{ route('user.lesson_answer', ['user_id' => $lesson->user_id, 'category_id' => $category->id, 'question_number' => $question_number + 1]) }}"
              name="next" role="button" class="btn btn-outline-success px-5 mr-2">
              Next
              </a>
              @else
              <a href="#" name="next" role="button" class="btn btn-outline-success px-5 mr-2">
                Finish
              </a>
              @endif --}}

            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>
@endsection