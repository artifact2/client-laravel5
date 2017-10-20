@extends('client::layouts.default')
@section('client::content')


    <section class="jumbotron text-center esb-green " style="height: 100vh;">
        <div class="container">
            <br /><br />
            <h2 class="jumbotron-heading ">{{  env('APP_NAME') }} </h2>
            <p class="lead text-muted">
                Login voor het controle paneel
            </p>

            <p>
                <form class="form-signin" action="login" method="post">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                <input type="submit">
                </form>
            </p>


            {{ dump($data) }}
            {{ dump($sbObject) }}


        </div>
    </section>

    @include('client::assets.js.auth_js')
@stop