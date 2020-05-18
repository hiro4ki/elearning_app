@extends('layouts/app')

@section('content')

<div class="container">
    <h1>Loged in as normal user!</h1>
    <a href="{{ route('user.categories', ['id' => auth()->user()->id]) }}" class="btn btn-primary px-5">Categories</a>
</div>
@endsection