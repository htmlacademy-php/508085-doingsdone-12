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

// 1-ый виртуальный модуль
$projects = "SELECT id, project_name FROM project";
$projects_result = mysqli_query($con, $projects);

if ($projects_result) {
    $projects_arr = mysqli_fetch_all($projects_result, MYSQLI_ASSOC);
};

// 2-ой виртуальный модуль 
$tasks = "SELECT * FROM task";
// LEFT JOIN project on project.id = task.project_id";
$tasks_result = mysqli_query($con, $tasks);
if ($tasks_result) {
    $tasks_arr = mysqli_fetch_all($tasks_result, MYSQLI_ASSOC);
};




$count_tasks23 = "SELECT count(id) as foor FROM task WHERE project_id = 4";
$count_tasks2_result = mysqli_query($con, $count_tasks23);
if ($count_tasks2_result ){
    $sql_projects_result_else = mysqli_fetch_all($count_tasks2_result, MYSQLI_ASSOC);
    //print($sql_projects_result_else[0]['foor']);
    //print($sql_projects_arr[0]['id']);
}
// else {print('нет');
// };


$count_tasks23 = "SELECT count(id) as rar FROM task WHERE project_id = 4";
$count_tasks2_result = mysqli_query($con, $count_tasks23);

$sql_projects_result_else = mysqli_fetch_all($count_tasks2_result, MYSQLI_ASSOC);

print($sql_projects_result_else[0]['rar']);


// if ($con == false) {
//    print("Ошибка подключения: " . mysqli_connect_error());
// }
// else {
//    #print("Соединение установлено");
//    $sql_projects = "SELECT project_name FROM project";

//    $sql_tasks = "SELECT task.task_name,
//    task.status_ready,
//    task.dt_deadline, 
//    project.project_name FROM task
//    LEFT JOIN project on project.id = task.project_id"; # "SELECT task_name, status_ready, dt_deadline FROM task"

//    $sql_projects_result = mysqli_query($con, $sql_projects);
//    $sql_tasks_result = mysqli_query($con, $sql_tasks);

//    if ($sql_projects_result){
//         $sql_projects_arr = mysqli_fetch_all($sql_projects_result, MYSQLI_ASSOC);
//    };

//    if ($sql_tasks_result){
//         $sql_tasks_arr = mysqli_fetch_all($sql_tasks_result, MYSQLI_ASSOC);
//         print($sql_tasks_arr[0]['dt_deadline']);


//    }
// }




// $projects = [
//     'Входящие',
//     'Учеба',
//     'Работа',
//     'Домашние дела',
//     'Авто',
// ];

//  $tasks = [
//     [
//         'task_name' => 'Собеседование в IT компании',
//         'deadline' => '01.12.2019', 
//         'project' => 'Работа',
//         'ready' => false
//     ],
//     [
//         'task_name' => 'Выполнить тестовое задание',
//         'deadline' => '25.12.2019', 
//         'project' => 'Работа',
//         'ready' => false
//     ],
//     [
//         'task_name' => 'Сделать задание первого раздела',
//         'deadline' => '21.12.2019', 
//         'project' => 'Учеба',
//         'ready' => true
//     ],
//     [
//         'task_name' => 'Встреча с другом',
//         'deadline' => '22.12.2019',
//         'project' => 'Входящие',
//         'ready' => false
//     ],
//     [
//         'task_name' => 'Купить корм для кота',
//         'deadline' => null,
//         'project' => 'Домашние дела',
//         'ready' => false
//     ],
//     [
//         'task_name' => 'Заказать пиццу',
//         'deadline' => null,
//         'project' => 'Домашние дела',
//         'ready' => false
//     ],

// ];


$main = include_template(
    'main.php',
    [
        'tasks' => $tasks_arr, #tasks,
        'show_complete_tasks' => $show_complete_tasks,

    ]
);

$layout = include_template(
    'layout.php',
    [
        'title' => 'Дела в порядке',
        'user_name' => 'Дмитрий',
        'main' => $main,
        'projects' => $projects_arr, #$projects,
        'tasks' => $tasks_arr, #tasks

    ]
);

print($layout);
