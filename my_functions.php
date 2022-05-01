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
 * Считает количество часов оставшихся до срока истечения задачи
 * @param $date принимает дату 
 * @return integer 
 */


function count_hours($date)
{
     if (is_null($date)) {
          $diff_in_hours = 100;
     } elseif ($date) {
          $sample_date  = strtotime($date);
          $today = time();
          $diff_total = $sample_date - $today;
          $diff_in_hours = ($diff_total / 60) / 60;
     };
     return $diff_in_hours;
}

?>
