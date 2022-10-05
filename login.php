<?php
$link = include 'connect.php';
$form = include 'formLogin.php';
session_start();
if (empty($_SESSION['auth']) and empty($_SESSION['id'])) {

if (!empty($_POST['login']) and !empty($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE login = '$login' and password = '$password'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $user = mysqli_fetch_assoc($result);
    if (empty($user)) {
        $page['content'] = 'не верный логин или пароль<br>' . $form;
    } else {
        session_start();
        $_SESSION['auth'] = true;
        $_SESSION['id'] = $user['id'];
        header('Location: /main');
    }    
} else {
    $page['content'] = $form;
}
$page['title'] = 'Войдите на сайт';
return $page;
} else {
    header('Location: /main');
}
?>