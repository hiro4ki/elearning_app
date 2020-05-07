@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class=" row">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <img class="card-img-top" src="" alt="place image">
                <div class="card-body bg-light p-2">
                    <h6 class="card-title">
                        Prace
                    </h6>
                    <p class="card-text">
                        Describe
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <img class="card-img-top" src="" alt="place image">
                <div class="card-body bg-light p-2">
                    <h6 class="card-title">
                        Prace
                    </h6>
                    <p class="card-text">
                        Describe
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <img class="card-img-top" src="" alt="place image">
                <div class="card-body bg-light p-2">
                    <h6 class="card-title">
                        Prace
                    </h6>
                    <p class="card-text">
                        Describe
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <img class="card-img-top" src="" alt="place image">
                <div class="card-body bg-light p-2">
                    <h6 class="card-title">
                        Prace
                    </h6>
                    <p class="card-text">
                        Describe
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection