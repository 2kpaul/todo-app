<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        <link rel="stylesheet" href="/css/app.css">
        @livewireStyles

    </head>
    <body class="bg-light">
        <div id="app">
            <section class="container">
                <div class="row justify-content-around text-center">
                    <div class="col-8 mt-4">
                        <h1>ToDo App</h1>
                    </div>
                </div>
    
                <div class="row justify-content-around">
                    <div class="col-10 mt-4">
                        <div class="row justify-content-around">
                            <div class="col-9">
                                @livewire('task-form')
                                @livewire('task-list')
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script type="text/javascript" src="/js/app.js"></script>
        @livewireScripts
    </body>
</html>
