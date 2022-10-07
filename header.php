<?php
$weekDay = [
  1 => 'Понедельник',
  2 => 'Вторник',
  3 => 'Среда',
  4 => 'Четверг',
  5 => 'Пятница',
  6 => 'Суббота',
  7 => 'Воскресенье',  
];
$header = "
        <div class='bodyHead'>
        <div><img src='/timesheet.jpg' alt='timesheet'></div>
        <div class='text-aling:center;'><span class='today'>" . $weekDay[date('w', time())] . '  ' .  date('d.m', time()) . ' время ' . date('H:i', time()) . "</span></div>
        <div><img style='float:right;' src='/clock.jpg' alt='clock'></div>
        </div>
          ";

return $header;
?>