<?php
$link = include 'connect.php';
session_start();
if ($_SESSION['auth']) {
    $id = $_SESSION['id'];
    $form = include 'mainForm.php';
    $today = date('Y-m-d', time());
    $timesheetName = 'timesheet_' . $id;
    $query = "SELECT * FROM $timesheetName WHERE date='$today'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));    
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    foreach ($data as $todayTimesheet) {        
    $correctTime = substr($todayTimesheet['time'], 0, 2) . ':00';   
    $keyTime = '<tr><td>' . $correctTime . '</td><td></td><td></td>';    
    $event = "<tr><td>$correctTime</td><td>{$todayTimesheet['viziter']}</td><td>{$todayTimesheet['comment']}</td>";                                   
    $form = str_replace($keyTime, $event, $form);
    }
    $linkUpdateTable = "<td><a href='/addClient?date=$today'>добавить клиента</a></td><td></td>";
    $form = str_replace("<td></td><td></td>", $linkUpdateTable, $form);
    $page['content'] = $form;
} else {
    header('Location: /login');
}
$page['title'] = 'расписание трудового дня';

return $page;
?>