<?php
$link = include 'connect.php';
$date = $_GET['date'];
session_start();
$id = $_SESSION['id'];


if (empty($_POST['viziter']) and empty($_POST['time'])) {
$formAddClient = include 'formAddClient.php';
$formAddClient = str_replace('{{ date }}', $date, $formAddClient);
$page['content'] = $formAddClient;
} else {
    $viziter = $_POST['viziter'];
    $time = $_POST['time'] . ':00';
    if (!empty($_POST['comment'])) {
        $comment = $_POST['comment'];
    } else {
        $comment = NULL;
    }

    $timesheetName = 'timesheet_' . $id;    
    $query = "SELECT * FROM $timesheetName WHERE time='$time'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $event = mysqli_fetch_assoc($result);
    
    if (empty($event)) {    
    $query = "INSERT INTO $timesheetName (id_user, time, viziter, comment, date) VALUES ($id, '$time', '$viziter', '$comment', '$date')";
    mysqli_query($link, $query) or die(mysqli_error($link));    
    header('Location: /main');
    } else {
        $page['content'] = '<h3>на время которое вы указали уже записан клиент!</h3>' . $formAddClient;
    }
}
$page['title'] = 'Добавление новой записи';

return $page;

?>