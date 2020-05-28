@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row d-flex">
    <div class="h1 col-md-6">Result</div>
    <div class="h2 col-md-6 text-right">{{ $lesson->countCorrectAnswers() }} / {{ $lesson->answers->count() }}</div>
  </div>
  <table class=" table">
    <caption>{{ $category->title }}</caption>
    <tr class="text-center">
      <th>Correctness</th>
      <th>Question</th>
      <th>Your Answer</th>
      <th>Correct Answer</th>
    </tr>
    @foreach ($lesson->answers as $answer)
    <tr class="text-center {{ $answer->isCorrect() ? 'table-success' : 'table-danger' }}">
      <td>
        @if ($answer->isCorrect())
        <h3 class="text-success font-weight-bold">○</h3>
        @else
        <h3 class="text-danger font-weight-bold">×</h3>
        @endif
      </td>
      <td>{{ $answer->choice->question->question }}</td>
      <td>{{ $answer->choice->choice }}</td>
      <td>{{ $answer->choice->question->getCorrectAnswer() }}</td>
    </tr>
    @endforeach
  </table>

  <div class="col-md-12 text-right">
    <a href="{{ route('user.dashboard') }}" name="back" role="button"
      class="btn btn-outline-primary btn-sm px-5 py-2">
      <h6 class="mb-0">Dashboard</h6>
    </a>
    <a href="{{ route('user.categories', ['id' => auth()->user()->id]) }}" name="back" role="button"
      class="btn btn-outline-success btn-sm px-5 py-2">
      <h6 class="mb-0">Categories</h6>
    </a>
  </div>

</div>

@endsection