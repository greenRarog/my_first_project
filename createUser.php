<?php
$link = include 'connect.php';
$form = include 'createUserForm.php';        
if (!empty($_POST['login']) and
    !empty($_POST['password']) and
    !empty($_POST['name']) and
    !empty($_POST['surname']) and
    !empty($_POST['email'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['surname'];
    if (!empty($_POST['phone_number'])) {
        $phone_number = $_POST['phone_number'];
    }
    if (!empty($_POST['specialization'])) {
        $specialization = $_POST['specialization'];
    }
    
    if ($password != $_POST['confirm']) {
        $page['content'] = 'пароль и подтверждение пароля не совпали! попробуйте еще раз<br>' . $form;     
    } else {
    if (!empty($phone_number) and !is_numeric($phone_number)){
        $page['content'] = 'телефон должен состоять только из цифр<br>' . $form;
    } else {
                
        if (!empty($phone_number) and !empty($specialization)) {
        $query = "INSERT INTO users(login, password, name, surname, rating, phone_number, specialization) 
                  VALUES
                  ('$login', '$password', '$name', '$surname', 0, $phone_number, '$specialization')";
            } else {
            if (!empty($phone_number)) {
            $query = "INSERT INTO users(login, password, name, surname, rating, phone_number) 
                      VALUES
                      ('$login', '$password', '$name', '$surname', 0, $phone_number)";
            } else {
                if (!empty($specialization)) {
                $query = "INSERT INTO users(login, password, name, surname, rating, specialization) 
                          VALUES
                          ('$login', '$password', '$name', '$surname', 0, '$specialization')";
                } else {
                  $query = "INSERT INTO users(login, password, name, surname, rating) 
                            VALUES
                            ('$login', '$password', '$name', '$surname', 0)";                    
                }
            }
        }
        
        mysqli_query($link, $query) or die(mysqli_error($link));
        
        $query = "SELECT id FROM USERS WHERE login = '$login'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $id = mysqli_fetch_assoc($result)['id'];
        
        $newTimesheetName = 'timesheet_' . $id;
        $query = "CREATE TABLE $newTimesheetName (id INT PRIMARY KEY AUTO_INCREMENT, id_user INT, time TIME, viziter VARCHAR(60), comment VARCHAR(60), date DATE)";
        mysqli_query($link, $query) or die(mysqli_error($link));
        
        session_start();
        $_SESSION['auth'] = true;        
        $_SESSION['id'] = $id;
        header('Location: /main');
    }    
    }
    } else {
    $page['content'] = $form;
}
$page['title'] = 'Создание нового пользователя';

return $page;

?>