<?php
// показывать или нет выполненные задачи
include_once('helpers.php');
$show_complete_tasks = rand(0, 1);

$categories = ['Входящие', 'Учеба', 'Работа', 'Домашние дела', 'Авто'];
$tasks = [
    [
        'name' => 'Собеседование в IT компании',
        'date' => '2020-12-01',
        'category' => $categories[2],
        'completed' => false
    ],
    [
        'name' => 'Выполнить тестовое задание',
        'date' => '2020-12-25',
        'category' => $categories[2],
        'completed' => false
    ],
    [
        'name' => 'Сделать задание первого раздела(сделано)',
        'date' => '2020-12-21',
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
        'date' => null,
        'category' => $categories[3],
        'completed' => false
    ],
    [
        'name' => 'Заказать пиццу',
        'date' => null,
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
    'Дела в порядке' => $title,
    'Рашид' => $user_name
]);

print($layout);
?>
