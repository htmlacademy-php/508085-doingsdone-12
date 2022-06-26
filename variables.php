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

// все варианты проектов
$query_all_projects = "SELECT id, project_name FROM project";
$all_projects_result = mysqli_query($con, $query_all_projects);
$all_projects_arr = mysqli_fetch_all($all_projects_result, MYSQLI_ASSOC);


// изввлекаем get-параметр номера проекта
$project_id = filter_input(INPUT_GET, 'project', FILTER_SANITIZE_NUMBER_INT);

// массивы задач и проектов
$projects_arr = base_extr('project', $user_id);
$tasks_arr = base_extr('task', $user_id);
$projects_arr_name_by_tasks = merge_extr($user_id);


$checker_get_param = array_count_values(array_column($tasks_arr, 'project_id'))[$project_id];
$checker_get_param = $checker_get_param ?: 0;

$logic_for_h2 = (!$checker_get_param && $project_id) ? 0 : 1;


$con = mysqli_connect("localhost", "root", "mysql", "doinngsdone")
    or exit("Ошибка подключения: " . mysqli_connect_error());
mysqli_set_charset($con, 'utf8');

$name_val = get_post_val('name');
$date_val = get_post_val('date');
$project_val = get_post_val('project');

?>