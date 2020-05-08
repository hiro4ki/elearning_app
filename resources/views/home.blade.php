@extends('layouts/app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <table class="table table-bordered">
                <tr>
                    <td class="text-center" width="350px">
                        <img src="https://lh3.googleusercontent.com/proxy/gIcrO8QBw0l-G9O7bQFxAntRBZIwB97LlJ6YXeFpgzQYo--0bvt-Jq1AJE5UxCk7aJ0VpCtkAin0aRlo2gUwepK2TWdBb0O_vIToQHy-FskyDzF_ryQ9WDGp13H6RF2xYL0755vG5ld0"
                            alt="user img" width="50%">
                        <h3 class="card-title m-3">{{ auth()->user()->name }}</h3>
                        <h4 class="card-title m-3">{{ auth()->user()->email }}</h4>
                        <a href="#" class="btn btn-primary btn-sm">Edit
                            profile</a>
                        <hr>

                        <div class="row justify-content-center text-center">
                            <div class="col-md-6 following">
                                <div>
                                    <a href="#">
                                        100
                                    </a>
                                </div>
                                <div>following</div>
                            </div>
                            <div class="col-md-6 followers">
                                <div>
                                    <a href="#">
                                        1000
                                    </a>
                                </div>
                                <div>followers</div>
                            </div>
                        </div>
                        <hr>
                        <div class="card text-center">
                            <div class="card-header">
                                <div>0</div>
                                <div>Greetings you learned</div>
                            </div>
                        </div>
                    </td>
                    <td class="table-primary col-xs-6">
                        <h2 class="text-center">Greetings You Learned</h2>
                        <ul class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">Japanese</a>
                            <a href="#" class="list-group-item list-group-item-action">Chinese</a>
                            <a href="#" class="list-group-item list-group-item-action">Cebuano</a>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <div class="card mt-4">
                <div class="card-header">
                    <h2 class="text-center">Dashboard</h2>
                    <div class="card mt-3">
                        <div class="row no-gutters">
                            <div class="col-md-2">
                                <img src="https://lh3.googleusercontent.com/proxy/gIcrO8QBw0l-G9O7bQFxAntRBZIwB97LlJ6YXeFpgzQYo--0bvt-Jq1AJE5UxCk7aJ0VpCtkAin0aRlo2gUwepK2TWdBb0O_vIToQHy-FskyDzF_ryQ9WDGp13H6RF2xYL0755vG5ld0"
                                    class="card-img" alt="user_img">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p>You learned Cebuano!</p>
                                        <footer class="blockquote-footer">3 hours ago</cite>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="row no-gutters">
                            <div class="col-md-2">
                                <img src="https://lh3.googleusercontent.com/proxy/gIcrO8QBw0l-G9O7bQFxAntRBZIwB97LlJ6YXeFpgzQYo--0bvt-Jq1AJE5UxCk7aJ0VpCtkAin0aRlo2gUwepK2TWdBb0O_vIToQHy-FskyDzF_ryQ9WDGp13H6RF2xYL0755vG5ld0"
                                    class="card-img" alt="user_img">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p>Machio greeted you!</p>
                                        <footer class="blockquote-footer">3 hours ago</cite>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endsection