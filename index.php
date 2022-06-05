<?php
require_once 'my_functions.php';
require_once 'helpers.php';
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);


$user = [
    'id' => 3,
    'user_name' => 'Вася',
];

$user_id_current = $user['id'];

// подключение
$con = mysqli_connect("localhost", "root", "mysql", "doinngsdone")
    or exit("Ошибка подключения: " . mysqli_connect_error());
mysqli_set_charset($con, 'utf8');



// получаем массив проектов
$projects = "SELECT id, project_name, user_id FROM project WHERE user_id = $user_id_current";
$projects_result = mysqli_query($con, $projects)
    or exit('Ошибка получения массива задач');
$projects_arr = mysqli_fetch_all($projects_result, MYSQLI_ASSOC);



$scriptname = pathinfo(__FILE__, PATHINFO_BASENAME);


// Получаем массив задач, если есть get-параметр, 
// то модифицируем запрос sql c условием, где project_id = get-параметру
$tasks = "SELECT * FROM task WHERE user_id = $user_id_current";
if (isset($_GET["project"])) {
    $get_param_project_id = intval($_GET['project']);
    $tasks  = $tasks . " AND project_id = $get_param_project_id";
};
$tasks_result = mysqli_query($con, $tasks)
    or exit('Ошибка получения массива задач'); 
$tasks_arr = mysqli_fetch_all($tasks_result, MYSQLI_ASSOC);





// Делаем ОБЩИЙ список задач для проверки совпадений get-параметров с ОБЩИМ списком id
$tasks_total = "SELECT * FROM task";
$tasks_result_total = mysqli_query($con, $tasks_total)
    or exit('Ошибка получения общего массива задач'); 
$tasks_arr_total = mysqli_fetch_all($tasks_result_total, MYSQLI_ASSOC);


$checker_get_params = 0;
foreach ($tasks_arr as $arr => $elem) {
    if($elem['project_id'] == $get_param_project_id){
        $checker_get_params++;
    };
};

 // шаблоны
$main = include_template(
    'main.php',
    [
        'tasks' => $tasks_arr, 
        'show_complete_tasks' => $show_complete_tasks,
        'checker' => $checker_get_params,
        'error' => 'Ошибка 404, такая страница отсутствует',
        'params' => $_GET

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
        'params' => $_GET,



    ]
);


print($layout);
