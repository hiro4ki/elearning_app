@extends('layouts.app')

@section('content')

<div class="container">
  <h1 class="mb-3">Categories</h1>
  <div class=" row">
    @foreach ($categories as $category)
    <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
      <div class="card bg-dark text-white" style="position: relative;">
        <img class="card-img" src="https://assets.bwbx.io/images/users/iqjWHBFdfxIU/i0_k0YWwmxSo/v1/1000x-1.jpg"
          alt="カードの画像" style="filter: blur(3px);">
        <div class="card-img-overlay">
          <h2 class="card-title">{{ $category->title }}</h2>
          <h4 class="card-text">{{ $category->description }}</h4>
          <p class="card-text"><small>最終更新3分前</small></p>
          <div style="position: absolute; top: 82%; left: 70%;">
            <a href="#" class="btn btn-primary px-5">Start</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>

@endsection