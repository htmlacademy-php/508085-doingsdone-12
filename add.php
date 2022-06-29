<?php

require_once 'variables.php';
require_once 'my_functions.php';
require_once 'helpers.php';

// получение и размещение в папку uploads загруженного файла
if (isset($_FILES['file'])) {
  $file_name = $_FILES['file']['name'];
  $file_path = __DIR__ . '/uploads/';
  $file_url = 'uploads/' . $file_name;

  move_uploaded_file($_FILES['file']['tmp_name'], $file_path . $file_name);

};


// проверка на пустоты
$form_arr = ['name', 'date'];
$errors = [];
$errors_counter = 0;

foreach ($form_arr as $one_form) {
  if (empty($_POST[$one_form])){

   $_POST[$one_form] = $one_form . ' not field';
   $errors_counter ++ ;
 };
 
};



// проверка на количество ошибок при переходе с метода post
// и переадресация на главную
if ($_SERVER['REQUEST_METHOD'] == 'POST' and $errors_counter == 0) {
  
  $insert_in_task = "INSERT INTO task (task_name, dt_deadline, status_ready, user_id, project_id, file_path) VALUES ('$name_val', '$date_val', false, '$user_id', '$project_val', '$file_url')";
  mysqli_query($mysql, $insert_in_task);
  header("Location: /508085-doingsdone-12/");
} else {

$add_temp = include_template(
  'add_temp.php', [
    'all_projects_arr' => $all_projects_arr,
    'errors' => $errors,
    'name_val' => $name_val,
    'date_val' => $date_val,
  ]
);


$layout = include_template(
  'layout.php',
  [
      'title' => 'Дела в порядке',
      'user' => $user['user_name'],
      'main' => $add_temp,
      'mysql' => $mysql,
      'projects_arr'=> $projects_arr,
      'project_id' => $project_id,
      'user_id' => $user_id,
  ]
);

print($layout);
};
?>




