<?php

/**
 * Возвращает количество задач относящихся к проекту
 * @param array $tasks массив с задачами
 * @param string $one_project название проекта 
 * @return integer 
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




/**
 * Если дата известна, считает количество часов оставшихся до срока задачи от настоящего момента
 * @param $sample_date принимает дату и от этой даты вычитается настоящий момент времени, 
 * отрицательное значение показывает, что срок уже прошел
 * @return integer целочисленный выводится количество часов, возможны дробные числа
 */
function count_hours($sample_date)
{    $diff_in_hours = 25;
     if (isset($sample_date)) {
          $sample_date  = strtotime($sample_date);
          $this_moment = time();
          $diff_seconds = $sample_date - $this_moment;
          $diff_in_hours = ($diff_seconds / 60) / 60;
     };
     return $diff_in_hours;
}

?>