@extends('layouts.app')

@section('content')
<div class="container">
  <h1>
    User's <span class="font-weight-bold">{{ $user->name }}</span> is following.
  </h1>
  @foreach ($followings as $follow)
  @if ($follow->id == auth()->user()->id)
  <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold p-4">
    <h1>
      <a href="{{ route('user.profile', ['id' => $follow->id]) }}">{{ $follow->id }}:{{ $follow->name }}</a>
    </h1>
  </li>
  @else
  <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold p-4">
    <h1>
      <a href="{{ route('user.profile', ['id' => $follow->id]) }}">{{ $follow->id }}:{{ $follow->name }}</a>
    </h1>
    <a class="btn btn-danger float-right" href="{{ route('user.unfollow', ['id' => $follow->id]) }}"
      role="button">Unfollow</a>
  </li>
  @endif
  @endforeach
</div>
@endsection