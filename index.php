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

// получаем и подключаем массив проектов
$projects = "SELECT id, project_name FROM project";
$projects_result = mysqli_query($con, $projects);
$projects_arr = mysqli_fetch_all($projects_result, MYSQLI_ASSOC)
    or exit('Ошибка получения массива проектов');


// получаем и подключаем массив задач
$tasks = "SELECT * FROM task";
$tasks_result = mysqli_query($con, $tasks);
$tasks_arr = mysqli_fetch_all($tasks_result, MYSQLI_ASSOC)
    or exit('Ошибка получения массива задач');



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


    ]
);

print($layout);
