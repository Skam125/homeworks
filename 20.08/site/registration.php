<link rel="stylesheet" type="text/css" href="style/formalign.css">
<?php
session_start();
include_once 'functions.php';
if(isset($_POST['action']) && $_POST['action'] == 'login'){
    if(userRegistration($_POST['login'], $_POST['password'])){
        $_SESSION['isLogged'] = true;
        $_SESSION['login'] = $_POST['login'];
        header('Location: index.php');
        die;
    } else $errorMessage = 'Попробуйте другой логин';
}

?>
<div class="global">
<h1>Registration</h1>
<?php if(isset($errorMessage)) {
    echo $errorMessage;
} ?>
<form action="" method="post">
    <div class="position">
    <input type="hidden" name="action" value="login">
    <label for="login">Имя пользователя:</label>
    <input type="text" name="login" id="login" required>
    </div>
    <div class="position">
        
    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password" required>
    </div>
    <div class="position">
    <input type="submit" value="Зарегистрироваться">
    </div>
</form>
</div>