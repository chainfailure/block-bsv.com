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
                <h1 class="display-3">Blocklist entries</h1>

                <section class="text-left">
                    <div class="mt-4">
                        <h2>I'm on this list and I don't agree</h2>
                        <p>Send an email to <a href="mailto:info@block-bsv.com">info@block-bsv.com</a> and we'll see if you're eligible for removal.</p>
                    </div>

                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Handle</th>
                                <th>Reason</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($entries as $entry)
                                <tr>
                                    <td>
                                        <a href="https://twitter.com/{{$entry->handle}}">{{$entry->handle}}</a>
                                    </td>
                                    <td>{{$entry->reason}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                    <div class="float-right">
                                        {{$entries->links()}}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </section>
            </div>
        </div>
    </body>
</html>
