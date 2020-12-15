<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        <link rel="stylesheet" href="/css/app.css">

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
                                <form action="">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</button>
                                          <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Dev</a>
                                            <a class="dropdown-item" href="#">To Do</a>
                                            <a class="dropdown-item" href="#">Grocery</a>
                                          </div>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Text input with dropdown button">
                                        <div class="input-group-append">
                                            <input type="button" value="Add Task" class="btn btn-success">
                                        </div>
                                      </div>
                                </form>
                                
                                <h3>To Do</h3>
                                <div class="tasks">
                                    <div class="task-item d-flex justify-content-between">
                                        <div class="task-descr">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, hic.
                                        </div>
                                        <div class="task-actions align-self-center">
                                            <i class="fa fa-edit fa-lg green"></i>
                                            <i class="fa fa-trash fa-lg red"></i>
                                        </div>
                                    </div>
                                    <div class="task-item d-flex justify-content-between">
                                        <div class="task-descr">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed exercitationem qui officiis?
                                        </div>
                                        <div class="task-actions align-self-center">
                                            <i class="fa fa-edit fa-lg green"></i>
                                            <i class="fa fa-trash fa-lg red"></i>
                                        </div>
                                    </div>
                                </div>
                                <h3>Grocery list</h3>
                                <div class="tasks">
                                    <div class="task-item d-flex justify-content-between">
                                        <div class="task-descr">
                                            eggs
                                        </div>
                                        <div class="task-actions align-self-center">
                                            <i class="fa fa-edit fa-lg green"></i>
                                            <i class="fa fa-trash fa-lg red"></i>
                                        </div>
                                    </div>
                                    <div class="task-item d-flex justify-content-between">
                                        <div class="task-descr">
                                            milk
                                        </div>
                                        <div class="task-actions align-self-center">
                                            <i class="fa fa-edit fa-lg green"></i>
                                            <i class="fa fa-trash fa-lg red"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </section>
        </div>

        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
