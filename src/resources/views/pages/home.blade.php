@extends('client::layouts.default')
@section('client::content')



    <div id="API_quick_info" class="carousel slide  " data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#API_quick_info" data-slide-to="0" class="active"></li>
            <!--
            <li data-target="#API_quick_info" data-slide-to="1"></li>
            <li data-target="#API_quick_info" data-slide-to="2"></li>
            <li data-target="#API_quick_info" data-slide-to="3"></li>
            -->
        </ol>

        <!--

            https://eoimages.gsfc.nasa.gov/images/imagerecords/77000/77360/ISS030-E-099324_lrg.jpg
            https://www.nasa.gov/sites/default/files/thumbnails/image/india-2016.jpg
            https://www.nasa.gov/images/content/708708main_iss033e021464_1600_946-710.jpg
            https://www.nasa.gov/mission_pages/station/multimedia/gallery/iss033e021464.html

            https://i.pinimg.com/736x/e1/ff/59/e1ff594c94d2303f5f11785c19f1a487--city-lights-night-lights.jpg
            https://www.nasa.gov/sites/default/files/images/371244main_road2apollo-23_full.jpg

            https://www.nasa.gov/sites/default/files/thumbnails/image/potw1706a.jpg


            https://www.nasa.gov/sites/default/files/thumbnails/image/pia21377-1041.jpg

            http://blog.hmns.org/wp-content/uploads/2016/12/december-2016.jpg

            https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Plasma_globe_60th.jpg/1200px-Plasma_globe_60th.jpg

        -->
        <?php $marketing_name = env('APP_NAME') .  " API" ?>

        <div class="carousel-inner">
            <div class="carousel-item carousel-item-full-screen active">
                <img class="first-slide" src="http://www.plasmakraft.com/images/slides/blue.jpg" alt="Slide 1">
                <div class="container">
                    <div class="carousel-caption  text-left">
                        <h1>{{ $marketing_name   }}</h1>
                        <p>De {{ env('APP_NAME') }} API server is het centrale orgaan van al je data.</p>
                        <p>
                            <small>Lees meer over hoe je {{ env('APP_NAME')  }} inzet als centrale dienst voor al je projecten. Van eerste idee tot back-up van grote projecten.</small>
                        </p>
                        <p><br /><small><button class="btn btn-sm btn-primary" onclick="docs();">Lees de documentatie</button></small></p>
                        <p><br /><small><button class="btn btn-sm btn-primary" onclick="login();">Login als super admin</button></small></p>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <a class="carousel-control-prev" href="#API_quick_info" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#API_quick_info" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        -->
    </div>
    @include('client::assets.js.auth_js')


@stop