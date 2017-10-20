@extends('client::layouts.default')
@section('client::content')


    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide" src="/img/goldenrecord.jpg" alt="Slide 1">
                <div class="container">
                    <div class="carousel-caption  text-left">
                        <h1>Artifact 2.0 API server</h1>
                        <p>Er is een fout opgetreden</p>
                        <div class="alert alert-danger" role="alert">
                            {{ $data['errors'] }}
                        </div>
                        <p><small>Ga terug naar de <a href="/">home pagina</a> om opnieuw in te loggen.</small></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="first-slide" src="/img/goldenrecord.jpg" alt="Slide 2">
                <div class="container">
                    <div class="carousel-caption  text-left">
                        <h1>Artifact 2.0 API server</h1>
                        <p>Mogelijk is je API key verlopen</p>
                        <div class="alert alert-danger" role="alert">
                            {{ $data['errors'] }}
                        </div>
                        <p><small>Ga terug naar de <a href="/home">home pagina</a> om opnieuw in te loggen.</small></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="first-slide" src="/img/goldenrecord.jpg" alt="Slide 3">
                <div class="container">
                    <div class="carousel-caption  text-left">
                        <h1>Artifact 2.0 API server</h1>
                        <p>Mogelijk ben je ingelogd op een ander apparaat</p>
                        <div class="alert alert-danger" role="alert">
                            {{ $data['errors'] }}
                        </div>
                        <p><small>Ga terug naar de <a href="/home">home pagina</a> om opnieuw in te loggen.</small></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="first-slide" src="/img/goldenrecord.jpg" alt="Slide 4">
                <div class="container">
                    <div class="carousel-caption  text-left">
                        <h1>Artifact 2.0 API server</h1>
                        <p>Mogelijk is je IP adres veranderd</p>
                        <div class="alert alert-danger" role="alert">
                            {{ $data['errors'] }}
                        </div>
                        <p><small>Ga terug naar de <a href="/home">home pagina</a> om opnieuw in te loggen.</small></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



@stop