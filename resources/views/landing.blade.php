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
                <h1 class="display-3">Block all $BSVers</h1>

                <section class="text-left">
                    <div class="mt-4">
                        <h2>What is this?</h2>
                        <p>This application adds a number of BSV related accounts to your Twitter blocklist.</p>
                    </div>

                    <div class="mt-4">
                        <h2>Why did you make this?</h2>
                        <p>I was fed up with the amount of bullshit in my timeline.</p>
                    </div>

                    <div class="mt-4">
                        <h2>How does it work?</h2>
                        <ul class="text-left">
                            <li>You click the button underneath.</li>
                            <li>Twitter will prompt you to authorize us to modify your blocklist.</li>
                            <li>Once granted access we add, what we believe, are BSV centered accounts to your blocklist.</li>
                            <li>We remind you to remove our authorization as we're not storing your access keys, thus there is no use for us to remain authorized.</li>
                        </ul>
                    </div>
                </section>
                <a class="btn btn-primary btn-lg" href="{{route('twitter.setup')}}">
                    Block them daddy
                </a>
            </div>
        </div>
    </body>
</html>
