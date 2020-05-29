@extends('layouts/app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <table class="table table-bordered mt-4">
        <tr>
          <td class="text-center" width="350px">
            {{-- <div class="d-flex align-items-center justify-content-center" style="height: 200px;"> --}}
            <img src="{{ auth()->user()->image }}" alt="user img" class="img-fluid rounded-circle img-thumbnail" style="width: 150px; height: 150px; object-fit: contain;">
            {{-- </div> --}}
            <h3 class="mt-2">{{ auth()->user()->name }}</h3>
            <div class="card text-center m-3">
              <div class="card-header">
                <h5>
                  <a href="{{route('user.words_learned', ['id' => auth()->user()->id])}}">
                    Learned {{ $sum }} words
                  </a>
                </h5>
                <h5>
                  Learned
                  {{ auth()->user()->lessons->where('completed', true)->groupBy('category_id')->count() }}
                  categories
                </h5>
              </div>
            </div>
          </td>
      </table>
    </div>
    <div class="col-md-7">
      <div class="card mt-4">
        <div class="card-header">
          <h2 class="text-center">Activities</h2>
          @if (count($lessons) == 0)
            @for ($j=0; $j < count($relationships); $j++)
              <div class="card mt-3">
                <div class="row no-gutters">
                  <div class="col-md-2 align-self-center">
                      <img src="{{ $relationships[$j]->follower()->image }}" class="card-img rounded-circle img-thumbnail ml-1" alt="user_img" style="width: 100px; height: 100px; object-fit: contain;">
                  </div>
                  <div class="col-md-10">
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p>
                          <a href="{{ route('user.profile', ['id' => $relationships[$j]->follower_id]) }}">
                            {{ $relationships[$j]->follower()->id == auth()->user()->id ? "You" : $relationships[$j]->follower()->name }}
                          </a> 
                          followed
                          <a href="{{ route('user.profile', ['id' => $relationships[$j]->followed_id]) }}">
                            {{ $relationships[$j]->followed()->id == auth()->user()->id ? "You" : $relationships[$j]->followed()->name }}
                          </a>!
                          @php
                          $flag = $j+1;
                          @endphp
                        </p>
                        <footer class="blockquote-footer"> {{ $relationships[$j]->updated_at }} </cite>
                        </footer>
                      </blockquote>
                    </div>
                  </div>
                </div>
              </div>
            @endfor
          @endif
          @for ($i = 0, $flag = 0; $i < count($lessons); $i++) 
            @for ($j=$flag; $j < count($relationships) && $lessons[$i]->updated_at < $relationships[$j]->updated_at; $j++)
              <div class="card mt-3">
                <div class="row no-gutters">
                  <div class="col-md-2 align-self-center">
                      <img src="{{ $relationships[$j]->follower()->image }}" class="card-img rounded-circle img-thumbnail ml-1" alt="user_img" style="width: 100px; height: 100px; object-fit: contain;">
                  </div>
                  <div class="col-md-10">
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p>
                          <a href="{{ route('user.profile', ['id' => $relationships[$j]->follower_id]) }}">
                            {{ $relationships[$j]->follower()->id == auth()->user()->id ? "You" : $relationships[$j]->follower()->name }}
                          </a> 
                          followed
                          <a href="{{ route('user.profile', ['id' => $relationships[$j]->followed_id]) }}">
                            {{ $relationships[$j]->followed()->id == auth()->user()->id ? "You" : $relationships[$j]->followed()->name }}
                          </a>!
                          @php
                          $flag = $j+1;
                          @endphp
                        </p>
                        <footer class="blockquote-footer"> {{ $relationships[$j]->updated_at }} </cite>
                        </footer>
                      </blockquote>
                    </div>
                  </div>
                </div>
              </div>
            @endfor
            <div class="card mt-3">
              <div class="row no-gutters">
                <div class="col-md-2 align-self-center">
                    <img src="{{ $lessons[$i]->user->image }}"
                      class="card-img rounded-circle img-thumbnail ml-1" alt="user_img" style="width: 100px; height: 100px; object-fit: contain;">
                </div>
                <div class="col-md-10">
                  <div class="card-body">
                    <blockquote class="blockquote mb-0">
                      <p>
                        <a href="{{ route('user.profile', ['id' => $lessons[$i]->user_id]) }}">
                          {{ $lessons[$i]->user_id == auth()->user()->id ? 'You' : $lessons[$i]->user->name }}
                        </a>
                        learned
                        {{ $lessons[$i]->category->questions->count() }} words in
                        <a href="{{ route('user.lesson_result', ['lesson' => $lessons[$i]->id]) }}">
                          {{ $lessons[$i]->category->title }}
                        </a>!
                      </p>
                      <footer class="blockquote-footer"> {{ $lessons[$i]->updated_at }} </cite>
                      </footer>
                    </blockquote>
                  </div>
                </div>
              </div>
            </div>
          @endfor

          @foreach ($lessons as $lesson)
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @endsection