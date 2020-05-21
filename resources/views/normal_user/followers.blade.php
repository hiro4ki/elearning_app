@extends('layouts.app')

@section('content')
<div class="container">
  <h1>
    User's following {{ $user->name }}.
  </h1>
  @foreach ($followers as $follow)
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
    @if (auth()->user()->is_following($follow->id) == true)
    <a class="btn btn-danger float-right" href="{{ route('user.unfollow', ['id' => $follow->id]) }}"
      role="button">Unfollow</a>
    @else
    <a class="btn btn-primary float-right" href="{{ route('user.follow', ['id' => $follow->id]) }}"
      role="button">Follow</a>
    @endif
  </li>
  @endif
  @endforeach
</div>
@endsection