<?php

namespace App\Controllers;

use App\Request;
use App\Models\Task;

class TaskController
{
    public function home()
    {
        $tasks = (new Task)->allTasks('todos');

        return view('index', ['tasks' => $tasks]);
    }

    public function store()
    {
        try {
            (new Task)->insert('todos', Request::values());

            return redirect('/');

        } catch(\Throwable $th) {
            die($th->getMessage());
        }
    }

    public function delete()
    {
        (new Task)->delete('todos', $_POST['id']);

        return redirect('/');
    }

    public function update()
    {
        (new Task)->update('todos', $_POST['id']);

        return redirect('/');
    }
}
