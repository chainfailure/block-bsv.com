<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" />
    </head>
    <body>
        <div class="container text-center" style="max-width: 800px">
            <div class="p-5">
                <h1 class="display-3">Blocked {{$count}} accounts.</h1>

                <section class="text-left">
                    <div class="mt-4">
                        <h2>Congratulations!</h2>
                        <p>No more nasty twetch banners or flat earth theories for you!</p>
                    </div>

                    <div class="mt-4">
                        <h2>Make sure to:</h2>
                        <p>Make sure to remove our app from your authorized apps list. We're not storing the authorized keys so it doesn't make sense leaving them authorized. Make sure to come back once in a while as we're adding new entries often.</p>
                    </div>
                </section>

                <a href="https://twitter.com/settings/applications" class="btn btn-primary">
                    Remove our app
                </a>
            </div>
        </div>
    </body>
</html>
