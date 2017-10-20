@extends('client::layouts.default')
@section('client::content')


    <section class="jumbotron text-center esb-green " style="height: 100vh;">
        <div class="container">
            <br /><br />
            <h2 class="jumbotron-heading ">{{  env('APP_NAME') }} </h2>
            <p class="lead text-muted">
                Welkom bij Artisan2
            </p>

            <p>

<script>
    var converter = new showdown.Converter(),
            text      = 'MArkdown is leuk: ![foo](foo.jpg =100x80)',
            html      = converter.makeHtml(text);
    console.log(html);
</script>

            <div class="flex-center position-ref full-height">
                <div class="content">
                    <div class="title m-b-md">

                    </div>
                    <div>
                        <h3>Collection</h3>
                        <?php  dump($collection) ?>
                    </div>
                    <div>
                        <h3>Messages</h3>
                        <?php dump($messages) ?>
                    </div>
                    <div>
                        <h3>Errors</h3>
                        <?php dump($errors) ?>
                    </div>
                    <div>
                        <h3>Data from Service Bus</h3>
                        <?php dump($sbObject) ?>
                    </div>



                </div>
            </div>


        </div>
    </section>

    @include('client::assets.js.auth_js')
@stop

