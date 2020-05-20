@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 800px">
  <h1>All users</h1>
  <ul class="list-group list-group-flush" style="max-width: 1000px;">
    @foreach ($users as $user)
    <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
      <a href="#" class="col-md-9 h3 d-flex mt-2">
        <div>{{ $user->id }}: </div>
        <div>{{ $user->name }}</div>
      </a>
      @if ($user != auth()->user())
      <div class="col-md-3 d-flex justify-content-end">
        @if (auth()->user()->is_following($user->id))
        <a class="btn btn-danger float-right" href="{{ route('user.unfollow', ['id' => $user->id]) }}"
          role="button">Unfollow</a>
        @else
        <a class="btn btn-primary float-right" href="{{ route('user.follow', ['id' => $user->id]) }}"
          role="button">Follow</a>
        @endif
      </div>
      @endif
    </li>
    @endforeach
  </ul>

</div>

@endsection