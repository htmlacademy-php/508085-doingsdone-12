<?php
require_once 'my_functions.php';
require_once 'helpers.php';
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);


$user = [
    'id' => 1,
    'user_name' => 'Вася',
];

// подключение
$con = mysqli_connect("localhost", "root", "mysql", "doinngsdone")
    or exit("Ошибка подключения: " . mysqli_connect_error());
mysqli_set_charset($con, 'utf8');

// получаем массив проектов
$projects = "SELECT id, project_name FROM project";
$projects_result = mysqli_query($con, $projects)
    or exit('Ошибка получения массива задач');
$projects_arr = mysqli_fetch_all($projects_result, MYSQLI_ASSOC);
 




$params = $_GET;
$scriptname = pathinfo(__FILE__, PATHINFO_BASENAME);


// Получаем массив задач, но сначала
// проверяем наличие get-параметра, если есть, 
// то делаем запрос sql c условием, где project_id = get-параметру,
// если нет, то берем все строки
if (isset($params['project'])){
    $get_param_project_id = $params['project'];
    $tasks = "SELECT * FROM task WHERE project_id = $get_param_project_id";
} else {
    $tasks = "SELECT * FROM task";
};
$tasks_result = mysqli_query($con, $tasks)
    or exit('Ошибка получения массива задач'); 
$tasks_arr = mysqli_fetch_all($tasks_result, MYSQLI_ASSOC);




// Проверяем наличие совпадений в get-параметре и массиве задач
$checker_get_params = 0;
$error = "Ошибка 404, такая страница отсутвует";
foreach ($tasks_arr as $arr => $elem) {
    if ($elem['project_id'] == $get_param_project_id) {
        $checker_get_params++;
    }   
};


if ($checker_get_params == 0 && $get_param_project_id) {
    $layout = include_template(
        'error.php',
        [
            'error' => $error,
        ]
    );
} else {

$main = include_template(
    'main.php',
    [
        'tasks' => $tasks_arr, 
        'show_complete_tasks' => $show_complete_tasks,

    ]
);

$layout = include_template(
    'layout.php',
    [
        'title' => 'Дела в порядке',
        'user_name' => $user['user_name'],
        'main' => $main,
        'projects' => $projects_arr, 
        'tasks' => $tasks_arr, 
        'con' => $con,
        'scr_name' =>$scriptname,
        'params' => $params,


    ]
);
}

print($layout);
