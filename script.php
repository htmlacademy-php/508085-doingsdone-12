<?php 

function count_tasks($tasks, $one_project){
    $con = 0;
     foreach($tasks as $one){
          if ($one['project'] != $one_project) continue;
          if ($one['project'] == $one_project) {
              $con++; 
               }
          };
    echo $con;
     };
     


// count_tasks($tasks, 'Авто');


?>