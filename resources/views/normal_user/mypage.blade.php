@extends('layouts/app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <table class="table table-bordered mt-4">
        <tr>
          <td class="text-center" width="350px">
            <img src="https://blog-imgs-32.fc2.com/s/c/h/schizoid21/oyurusi.jpg" alt="user img" width="50%"
              class="rounded-circle img-thumbnail">
            <h3 class="card-title m-3">{{ auth()->user()->name }}</h3>
            <h4 class="card-title m-3">{{ auth()->user()->email }}</h4>
            <a href="{{ route('user.edit_profile') }}" class="btn btn-primary btn-sm">Edit
              profile</a>
            <hr>

            <div class="row justify-content-center text-center">
              <div class="col-md-6 following">
                <div>
                  <a href="{{ route('user.followings', ['id' => auth()->user()->id]) }}">
                    {{ auth()->user()->followings()->count() }}
                  </a>
                </div>
                <div>following</div>
              </div>
              <div class="col-md-6 followers">
                <div>
                  <a href="{{ route('user.followers', ['id' => auth()->user()->id]) }}">
                    {{ auth()->user()->followers()->count() }}
                  </a>
                </div>
                <div>followers</div>
              </div>
            </div>
            <hr>
            <div class="card text-center">
              <div class="card-header">
                <div><a
                    href="#">{{ auth()->user()->lessons->where('completed', true)->groupBy('category_id')->count() }}</a>
                </div>
                <div>Categories you learned</div>
                <div class="card-header mt-2">
                  <div><a href="{{route('user.words_learned')}}">Words you learned</a>
                  </div>
                </div>
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

          @foreach (auth()->user()->lessons as $lesson)
          @if ($lesson->completed)
          <div class="card mt-3">
            <div class="row no-gutters">
              <div class="col-md-2 align-self-center">
                <img src="https://blog-imgs-32.fc2.com/s/c/h/schizoid21/oyurusi.jpg"
                  class="card-img rounded-circle img-thumbnail" alt="user_img">
              </div>
              <div class="col-md-10">
                <div class="card-body">
                  <blockquote class="blockquote mb-0">
                    <p>You learned <a
                        href="{{ route('user.lesson_result', ['lesson' => $lesson->id]) }}">{{ $lesson->category->title }}</a>!
                    </p>
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