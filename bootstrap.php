<?php

use App\{Router, Request};

CreateTasksTable::tasksTable(connect());
Router::load('routes.php')
    ->show(Request::uri(), Request::method());
