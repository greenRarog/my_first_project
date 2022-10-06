<?php
$url = $_SERVER['REQUEST_URI'];
//echo $url . '<br>';


$route = '/createUser';
if (preg_match("#$route#", $url)) {
    $page = include 'createUser.php';
}
$route = '/login';
if (preg_match("#$route#", $url)) {
    $page = include 'login.php';
}
$route = '/main';
if (preg_match("#$route#", $url)) {
    $page = include 'main.php';
}

$route = '/exit';
if ($url === $route) {
    $page = include 'exit.php';
}

$route = '/addClient\?date=\d{4}-\d{2}-\d{2}';
if (preg_match("#$route#", $url)) {
    $page = include 'addClient.php';
}

$layout = file_get_contents('layout.php');
$layout = str_replace('{{ title }}', $page['title'], $layout);
$layout = str_replace('{{ content }}', $page['content'], $layout);

echo $layout;
?>