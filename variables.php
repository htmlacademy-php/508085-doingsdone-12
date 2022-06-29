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
$mysql = mysqli_connect("localhost", "root", "mysql", "doinngsdone")
    or exit("Ошибка подключения: " . mysqli_connect_error());
mysqli_set_charset($mysql, 'utf8');






$mysql = mysqli_connect("localhost", "root", "mysql", "doinngsdone")
    or exit("Ошибка подключения: " . mysqli_connect_error());
mysqli_set_charset($mysql, 'utf8');

$name_val = get_post_val('name');
$date_val = get_post_val('date');
$project_val = get_post_val('project');

?>