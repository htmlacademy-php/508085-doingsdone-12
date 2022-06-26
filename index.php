<?php
require_once 'my_functions.php';
require_once 'variables.php';
require_once 'helpers.php';


$main = include_template(
    'main.php',
    [
        'tasks_arr' => $tasks_arr, 
        'show_complete_tasks' => $show_complete_tasks,
        'checker_get_param' => $checker_get_param,
        'project_id' => $project_id,
        'logic_for_h2' => $logic_for_h2,
    ]
);

$layout = include_template(
    'layout.php',
    [
        'title' => 'Дела в порядке',
        'user' => $user['user_name'],
        'main' => $main,
        'con' => $con,
        'projects_arr'=> $projects_arr,
        'project_id' => $project_id,
        'user_id' => $user_id,
        'projects_arr_name_by_tasks' => $projects_arr_name_by_tasks
    ]
);

print($layout);





