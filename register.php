<?php
require_once 'variables.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING, ['options' => ['default' => '']]);




   // ступенчатая проверка емаила
    if (!$email) { // есть ли емаил
        $errors['email'] = 'Нет email';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){ // валиден ли емаил
         $errors['email'] = 'Email не валиден';

        } elseif (check_email($mysqli, $email) == 'found_email_in_func'){
            $errors['email'] = 'Такой email уже есть'; // есть ли такой емаил в базе
    };
    



    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING, ['options' => ['default' => '']]);
    if (!$password) {
        $errors['password'] = 'Нет password';
    };

    $tname = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING, ['options' => ['default' => '']]);
    if (!$tname) {
        $errors['name'] = 'Нет name';
    };

    


    if (is_uploaded_file($_FILES['file']['tmp_name'])) { // была загрузка файла
        if ($_FILES['file']['error'] === UPLOAD_ERR_OK) { // Если загружен файл и нет ошибок, то сохраняем его в папку 
            $original_name = $_FILES['file']['name'];

            $avatar_path =  __DIR__  . '/uploads/' . $original_name;

            // сохраняем файл в папке 
            if (!move_uploaded_file($_FILES['file']['tmp_name'], $avatar_path)) {
                $errors['file'] = 'Не удалось сохранить файл.';
            }
        } else {
            $errors['file'] = 'Ошибка ' . $_FILES['file']['error'] . ' при загрузке файла. <a href="https://www.php.net/manual/ru/features.file-upload.errors.php" target="_blank">Код ошибки</a>';
        }
    };

    if ($errors == false) {

        $today = date('d.m.Y');

        // SQL
        $insert_in_task = 'INSERT INTO user (dt_registered, password_hash, avatar_path, name, email) VALUES (?, ?, ?, ?, ?)';

        // делаем подготовленное выражение
        $stmt = db_get_prepare_stmt($mysqli, $insert_in_task, [
            $today,
            password_hash($password, PASSWORD_DEFAULT),
            $avatar_path, 
            $tname,
            $email
        ]);

            // исполняем подготовленное выражение
        mysqli_stmt_execute($stmt);

        header("Location: /extra_academy/");
        exit();
    } 
 
};

$registr = include_template(
    'reg.php',
    [
        'all_projects_arr' => $all_projects_arr,
        'date' => $date,
        'errors' => $errors,
        'email' => $email,
        'password' => $password,
        'tname' => $tname
    ]
);


$layout = include_template(
    'layout.php', [
        'title' => 'Регистрация',
        'user' => $user['user_name'],
        'main' => $registr,
        'mysql' => $mysqli,
        'projects_arr' => $projects_arr,
        'project_id' => $project_id,
        'mode_view' => $mode_view['is_register']



    ]);

print($layout);
