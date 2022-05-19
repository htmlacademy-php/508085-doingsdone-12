<?php
require_once 'my_functions.php';
require_once 'helpers.php';
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);




$user = [
    'id' => 1,
    'user_name' => 'Вася',
    ];

    

$projects = [
    'Входящие',
    'Учеба',
    'Работа',
    'Домашние дела',
    'Авто',
];

 $tasks = [
    [
        'task_name' => 'Собеседование в IT компании',
        'deadline' => '01.12.2019', 
        'project' => 'Работа',
        'ready' => false
    ],
    [
        'task_name' => 'Выполнить тестовое задание',
        'deadline' => '25.12.2019', 
        'project' => 'Работа',
        'ready' => false
    ],
    [
        'task_name' => 'Сделать задание первого раздела',
        'deadline' => '21.12.2019', 
        'project' => 'Учеба',
        'ready' => true
    ],
    [
        'task_name' => 'Встреча с другом',
        'deadline' => '22.12.2019',
        'project' => 'Входящие',
        'ready' => false
    ],
    [
        'task_name' => 'Купить корм для кота',
        'deadline' => null,
        'project' => 'Домашние дела',
        'ready' => false
    ],
    [
        'task_name' => 'Заказать пиццу',
        'deadline' => null,
        'project' => 'Домашние дела',
        'ready' => false
    ],

];


$main = include_template(
    'main.php',
    [
        'tasks' => $tasks,
        'show_complete_tasks' => $show_complete_tasks,
    ]
);

$layout = include_template(
    'layout.php',
    [
        'title' => 'Дела в порядке',
        'user_name' => 'Дмитрий',
        'main' => $main,
        'projects' => $projects,
        'tasks' => $tasks,
    ]
);

print($layout);


