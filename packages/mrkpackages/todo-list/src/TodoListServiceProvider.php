<?php


namespace MrkPackages\TodoList;

use Illuminate\Support\ServiceProvider;

class TodoListServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/todo-config.php' => config_path('todo-config.php')
        ], 'config');
    }

    public function register()
    {

    }

}
