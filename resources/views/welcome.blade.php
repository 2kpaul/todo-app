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
                    <div class="col mt-4">
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-primary ">
                                    <span class="fa fa-list pull-left" data-toggle="modal" data-target="#createList"> Create list</span> 
                                </button>

                                <button class="btn btn-success" onClick="window.livewire.emit('toggleTaskModal')">
                                    <span class="fa fa-tasks pull-left"> Create task</span> 
                                </button>
                                @livewire('task-form')
                                @livewire('task-list-form')
                            </div>
                        </div>
                        <div class="row justify-content-around">
                            <div class="col">
                                @livewire('task-lists')
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script type="text/javascript" src="/js/app.js"></script>
        @livewireScripts
        <script type="text/javascript">
            window.livewire.on('hideCreateTask', () => {
                $('#createTask').modal('hide');
            });
            window.livewire.on('hideCreateList', () => {
                $('#createList').modal('hide');
            });
            window.livewire.on('toggleTaskModal', () => {
                $('#createTask').modal('show');
            });
        </script>
    </body>
</html>
