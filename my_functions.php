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
          if ($one['project_name'] == $one_project) {
               $count++;
          }
     };
     return $count;
};


/**
 * Возвращает количество задач относящихся к проекту
 * через sql запрос
 * @param string $one_project идентификатор проекта
 * @return integer 
 */
function count_tasks2($one_project){  // циферка   
     $query_count = "SELECT COUNT(id) AS cnt_id FROM task WHERE project_id = $one_project";
     $con2 = mysqli_connect("localhost", "root", "mysql", "doinngsdone");

     $result = mysqli_query($con2,  $query_count);
     $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

     return $row[0]['cnt_id'];
};
     
     
     
 





/**
* Получаем интервал времени от текущего момента до заданной даты (в час).
 *      Результат возможен с дробной частью.
 *      Отрицательное значение говорит о том, что указанная дата уже в прошлом.
 * @param string $sample_date дата в формате 'dd.mm.yyyy'
 * @return float положительное, нулевое или отрицательное число
 */
function count_hours($sample_date) {
     if ($sample_date) {
          $ts_of_date  = strtotime($sample_date);
          $ts_current = time();
          $diff_seconds = $ts_of_date - $ts_current;
          $diff_in_hours = $diff_seconds / 3600;
     }
     else {
          $diff_in_hours = 0;
     }
     return $diff_in_hours;
}

?>