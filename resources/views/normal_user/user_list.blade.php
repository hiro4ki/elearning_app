@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 800px">
  <h1>All users</h1>
  <ul class="list-group list-group-flush" style="max-width: 1000px;">
    @foreach ($users as $user)
    <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold">
      <h3 class="col-md-9 d-flex mt-2">
        <div>{{ $user->id }}: </div>
        <div>{{ $user->name }}</div>
      </h3>

      <div class="col-md-3 d-flex justify-content-end">
        <a class="btn btn-danger float-right" href="#" role="button">Unfollow</a>
        <a class="btn btn-primary float-right" href="#" role="button">Follow</a>
      </div>
    </li>
    @endforeach
  </ul>

</div>

@endsection