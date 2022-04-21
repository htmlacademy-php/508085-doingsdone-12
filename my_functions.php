<?php
/**
 * @param array $tasks массив с задачами
 * @param string $one_project название проекта 
 * @return integer возвращает количество задач относящихся к проекту
 */

function count_tasks($tasks, $one_project)
{
     $count = 0;
     foreach ($tasks as $one) {
          if ($one['project'] == $one_project) {
               $count++;
          }
     };
     return $count;
};
