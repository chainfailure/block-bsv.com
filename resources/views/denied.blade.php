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
                <h1 class="display-3">Whoops</h1>

                <section>
                    <div class="mt-4">
                        <h2>We were unable to access your Twitter account</h2>
                        <p>It seems you have hit "cancel" on the consent confirmation screen.</p>
                    </div>
                </section>

                <a href="{{route('block.setup')}}" class="btn btn-primary mt-4">
                    Try again
                </a>
            </div>
        </div>
    </body>
</html>
