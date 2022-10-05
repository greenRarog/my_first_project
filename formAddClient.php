<?php
$selector = "<option selected value='8:00'>выберите время</option>";
for ($i = 8; $i <= 20; $i++) {
    $time = $i . ':00';
    $selector .= "<option value='$time'>$time</option>";
}

$form = "
<form action='' method='POST'>
    <h2>Добавить клиента</h2>
    <table>
    <thead>
    <tr>
    <td>дата:</td> <td>{{ date }}</td>
    </tr>
    <tr>
    <td>время:</td>  
    <td><select name='time'>" .    
      $selector . 
   "</select></td>
    </tr>
    <tr>
    <td>клиент:</td>
    <td><input name='viziter'></td>
    </tr>
    <tr>
    <td>заметка:</td>
    <td><input name='comment'></td>
    </tr>
    <tr>
    <td></td><td><input type='submit' value='добавить!'></td>
    </tr>
    </thead>
    </table
</form>>    
";
return $form;
?>        