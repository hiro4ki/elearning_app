@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="mb-3">Categories</h1>
  <div class=" row">
    @foreach ($categories as $category)
    <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
      <div class="card bg-white text-white" style="position: relative;">
        <img class="card-img" src="{{ $category->image }}" alt="カードの画像" style="filter: blur(2px);">
        <div class="card-img-overlay">
          <h2 class="card-title">{{ $category->title }}</h2>
          <h4 class="card-text">{{ $category->description }}</h4>
          {{-- <p class="card-text"><small>最終更新3分前</small></p> --}}
          <div style="position: absolute; top: 82%; left: 70%;">

            <form action="{{ route('user.create_lesson') }}" method="POST">
              @csrf
              <button class="btn btn-primary px-5">Start</button>
              <input type="hidden" name="user_id" value="{{$user->id}}">
              <input type="hidden" name="category_id" value="{{$category->id}}">
              <input type="hidden" name="question_number" value=0>
            </form>

          </div>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>

@endsection