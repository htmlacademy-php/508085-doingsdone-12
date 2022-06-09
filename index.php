<?php
require_once 'my_functions.php';
require_once 'helpers.php';
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);


$user = [
    'id' => 3,
    'user_name' => 'Вася',
];

$user_id = $user['id'];

// подключение
$con = mysqli_connect("localhost", "root", "mysql", "doinngsdone")
    or exit("Ошибка подключения: " . mysqli_connect_error());
mysqli_set_charset($con, 'utf8');



// получаем массив проектов
$projects = "SELECT id, project_name, user_id FROM project WHERE user_id = $user_id";
$projects_result = mysqli_query($con, $projects)
    or exit('Ошибка получения массива задач');
$projects_arr = mysqli_fetch_all($projects_result, MYSQLI_ASSOC);



$scriptname = pathinfo(__FILE__, PATHINFO_BASENAME);


// Получаем массив задач, если есть get-параметр, 
// то модифицируем запрос sql c условием, где project_id = get-параметру
$tasks = "SELECT * FROM task WHERE user_id = $user_id";
if (isset($_GET["project"])) {
  
    
   $project_id = filter_input(INPUT_GET, 'project', FILTER_SANITIZE_NUMBER_INT);
   $tasks .= " AND project_id = $project_id";
};



$tasks_result = mysqli_query($con, $tasks)
    or exit('Ошибка получения массива задач'); 
$tasks_arr = mysqli_fetch_all($tasks_result, MYSQLI_ASSOC);


$checker_get_params = array_count_values(array_column($tasks_arr, 'project_id'))[$project_id];
$checker_get_params = !$checker_get_params ? $checker_get_params = 0 : $checker_get_params = $checker_get_params;

 // шаблоны
$main = include_template(
    'main.php',
    [
        'tasks_arr' => $tasks_arr, 
        'show_complete_tasks' => $show_complete_tasks,
        'checker_get_params' => $checker_get_params,


    ]
);

$layout = include_template(
    'layout.php',
    [
        'title' => 'Дела в порядке',
        'user_name' => $user['user_name'],
        'main' => $main,
        'projects_arr' => $projects_arr, 
        'con' => $con,
        'scr_name' =>$scriptname,
    ]
);


print($layout);
