<?php

$tableContent = '';
$now = date('H', time());
for ($i = 8; $i < $now; $i++) {
    $time = $i . ':00';           
    $tableContent .= "<tbody>
                      <tr><td>$time</td><td></td><td></td><td><a href=''>удалить</a></td></tr>
                      </tbody>";         
}
$tableContent .="<tnow>
                    <tr><td>$now:00</td><td></td><td></td><td><a href=''>удалить</a></td></tr>
                </tnow>";
$tableContent .= '<tfoot>';
for ($i = ++$now; $i <= 20; $i++) {
    $time = $i . ':00';           
    $tableContent .= "<tr><td>$time</td><td></td><td></td><td><a href=''>удалить</a></td></tr>";             
}
$tableContent .= '</tfoot>';
$form ="
<form action='' method='POST'>    
    <table border='1' align='center'>
        <tr>
            <th>Время</th>
            <th>Посетитель</th>
            <th>Примечание</th>
            <th>Удалить запись</th>
        </tr>
        " .        
        $tableContent
        . "
    </table>
    <br>
    <a href='/exit'>выйти</a>
</form>    
";

return $form;
?>
