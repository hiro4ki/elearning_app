@extends('layouts/app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <table class="table table-bordered mt-4">
        <tr>
          <td class="text-center" width="350px">
            <img src="{{ $user->image }}" alt="user img" class="rounded-circle img-thumbnail" style="width: 150px; height: 150px; object-fit: contain;">
            <h3 class="card-title m-3">{{ $user->name }}</h3>
            <h4 class="card-title m-3">{{ $user->email }}</h4>
            <hr>

            <div class="row justify-content-center text-center">
              <div class="col-md-6 following">
                <div>
                  <a href="{{ route('user.followings', ['id' => $user->id]) }}">
                    {{ $user->followings()->count() }}
                  </a>
                </div>
                <div>following</div>
              </div>
              <div class="col-md-6 followers">
                <div>
                  <a href="{{ route('user.followers', ['id' => $user->id]) }}">
                    {{ $user->followers()->count() }}
                  </a>
                </div>
                <div>followers</div>
              </div>
            </div>
            <hr>
            <div class="card text-center">
              <div class="card-header">
                <h5>
                  <a href="{{route('user.words_learned', ['id' => $user->id])}}">
                    Learned {{ $sum }} words
                  </a>
                </h5>
                <h5>
                  Learned
                  {{ $user->lessons->where('completed', true)->groupBy('category_id')->count() }}
                  categories
                </h5>
              </div>
            </div>
          </td>
        </tr>
      </table>
    </div>
    <div class="col-md-7">
      <div class="card mt-4">
        <div class="card-header">
          <h2 class="text-center">Dashboard</h2>

          @foreach ($user->lessons as $lesson)
          @if ($lesson->completed)
          <div class="card mt-3">
            <div class="row no-gutters">
              <div class="col-md-2 align-self-center">
                <img src="{{ $user->image }}" alt="user img" class="card-img rounded-circle img-thumbnail ml-1" style="width: 100px; height: 100px; object-fit: contain;">
              </div>
              <div class="col-md-10">
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <p>{{ $user->name }} learned <a href="{{ route('user.lesson_result', ['lesson' => $lesson->id]) }}">{{ $lesson->category->title }}</a>!</p>
                    <footer class="blockquote-footer"> {{ $lesson->updated_at }} </cite>
                    </footer>
                  </blockquote>
                </div>
              </div>
            </div>
          </div>
          @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @endsection