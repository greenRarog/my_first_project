<?php
$form = "

<form action='' method='POST''>
<div class='box'>
    <h3>Доброго времени суток!</h3>
       <h4>Войдите на сайт:</h4>

        Логин:<br>
       <input name='login'><br>
       Пароль:<br>
       <input name='password' type='password'><br>
       <input type='submit'>    

    <h5>нет учетной записи? <a href='/createUser'>Зарегистрируйтесь!</a></h5>
</div>
</form>    

";
return $form;
?>
