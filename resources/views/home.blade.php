@extends('layouts/app')

@section('content')

<div class="container">
    @if (auth()->user()->is_admin) {{-- admin user--}}
    @include('admin/users')
    @else {{-- normal user --}}
    @include('normal_users/user')
    @endif
</div>
@endsection