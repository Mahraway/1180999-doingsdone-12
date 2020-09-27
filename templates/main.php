<section class="content__side">
                <h2 class="content__side-heading">Проекты</h2>

                <nav class="main-navigation">
                    <ul class="main-navigation__list">
                        <?php foreach ($categories as $category): ?>
                        <li class="main-navigation__list-item">
                            <a class="main-navigation__list-item-link" href="#"><?= htmlspecialchars($category)?></a>
                            <span class="main-navigation__list-item-count"><?= task_amount($category, $tasks);?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>

                <a class="button button--transparent button--plus content__side-button"
                   href="pages/form-project.html" target="project_add">Добавить проект</a>
            </section>

            <main class="content__main">
                <h2 class="content__main-heading">Список задач</h2>

                <form class="search-form" action="index.php" method="post" autocomplete="off">
                    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

                    <input class="search-form__submit" type="submit" name="" value="Искать">
                </form>

                <div class="tasks-controls">
                    <nav class="tasks-switch">
                        <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
                        <a href="/" class="tasks-switch__item">Повестка дня</a>
                        <a href="/" class="tasks-switch__item">Завтра</a>
                        <a href="/" class="tasks-switch__item">Просроченные</a>
                    </nav>

                    <label class="checkbox">
                        <!--добавить сюда атрибут "checked", если переменная $show_complete_tasks равна единице-->
                        <?php 
                        if ($show_complete_tasks === 1) {
                            $checked_ = 'checked';
                        }
                        ?>
                        <input class="checkbox__input visually-hidden show_completed" type="checkbox" <?=$checked_?>>
                        <span class="checkbox__text">Показывать выполненные</span>
                    </label>
                </div>

                <?php foreach ($tasks as $task):
                    if ($task['completed'] === true) $completed_class = 'task--completed'; // стиль выполненных задач
                    else $completed_class = '';

                    if (task_time($task['date']) <= 24) $task_class = 'task--important'; // стиль задач, срок которых либо закончился,
                    else $task_class = '';                                              // либо осталось менее 24 часов    

                    if ($show_complete_tasks === 0 && $task['completed'] === true) continue;
                ?>

                <table class="tasks">
                    <tr class="tasks__item task <?=$task_class?>">
                        <td class="task__select <?=$completed_class?>">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1">
                                <span class="checkbox__text"><?=htmlspecialchars($task['name'])?></span>
                            </label>
                        </td>

                        <td class="task__file">
                            <a class="download-link" href="#" >Home.psd</a>
                        </td>

                        <td class="task__date"><?=htmlspecialchars($task['date'])?></td>
                        
                    </tr>
                    <!--показывать следующий тег <tr/>, если переменная $show_complete_tasks равна единице-->
                </table>
                <?php endforeach; ?>
            </main>