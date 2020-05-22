@extends('layouts/app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-3">
      <table class="table table-bordered mt-4">
        <tr>
          <td class="text-center" width="350px">
            <img src="https://blog-imgs-32.fc2.com/s/c/h/schizoid21/oyurusi.jpg" alt="user img" width="50%"
              class="rounded-circle img-thumbnail">
            <h3 class="card-title m-3">{{ auth()->user()->name }}</h3>
            <h4 class="card-title m-3">{{ auth()->user()->email }}</h4>

            <div class="card text-center">
              <div class="card-header">
                You learned {{ $sum }} words
              </div>
            </div>
          </td>
        </tr>
      </table>
    </div>
    <div class="col-md-9">
      <div class="card mt-4">
        <div class="card-body">
          <h2 class="card-title">Words learned</h2>

          <table class="table mt-2">
            <tr class="text-center">
              <th>Category</th>
              <th>Word</th>
              <th>Answer</th>
            </tr>
            @foreach ($lessons as $key => $lesson)
            <tr>
              <td rowspan={{ $lesson->answers->count()+1 }}> {{ $lesson->category->title }} </td>
            </tr>
            @foreach ($lesson->answers as $answer)
            <tr class="text-center {{ $answer->isCorrect() ? 'table-success' : 'table-danger' }}">
              <td>{{ $answer->choice->question->question }}</td>
              <td>{{ $answer->choice->question->getCorrectAnswer() }}</td>
            </tr>
            @endforeach
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection