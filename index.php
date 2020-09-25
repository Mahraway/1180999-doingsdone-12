<?php
date_default_timezone_set("Europe/Moscow");
include_once('helpers.php');
$show_complete_tasks = rand(0, 1);

$categories = ['Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];
$tasks = [
    [
        'name' => 'Собеседование в IT компании',
        'date' => '2020-09-20',
        'category' => $categories[2],
        'completed' => false
    ],
    [
        'name' => 'Выполнить тестовое задание',
        'date' => '2020-09-21',
        'category' => $categories[2],
        'completed' => false
    ],
    [
        'name' => 'Сделать задание первого раздела(сделано)',
        'date' => '2019-12-21',
        'category' => $categories[1],
        'completed' => true
    ],
    [
        'name' => 'Встреча с другом',
        'date' => '2020-12-22',
        'category' => $categories[0],
        'completed' => false
    ],
    [
        'name' => 'Купить корм для кота',
        'date' =>  '',
        'category' => $categories[3],
        'completed' => false
    ],
    [
        'name' => 'Заказать пиццу',
        'date' => '',
        'category' => $categories[3],
        'completed' => false
    ]
];

$main_page = include_template('main.php',[
    'categories' => $categories,
    'tasks' => $tasks,
    'show_complete_tasks' => $show_complete_tasks
    ]);
$layout = include_template('layout.php', [
    'main_page' => $main_page,
    'title' => 'Дела в порядке',
    'user_name' => 'Рашид' 
]);

print($layout);
?>
