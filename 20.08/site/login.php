<link rel="stylesheet" type="text/css" href="style/formalign.css">
<?php session_start();

require_once 'settings.php';
require_once 'functions.php';

if (!isset($_COOKIE['count'])) {
    setcookie('count', 0);
    header('Location: login.php');
} ?>
<div class="banned">
    <?php
    if ($_COOKIE['count'] >= 2) {
    if (!($_COOKIE['count'] == 5)) {
        setcookie('count', 5, time() + 60*10);
        echo '<h1>You have been banned for 10 minutes!</h1>';
        header("refresh:30; url=login.php");
        die();
    } else {
        echo '<h1>You have been banned for 10 minutes!</h1>';
        header("refresh:30; url=login.php");
        die();}
} ?>
</div>


<?php
if (isset($_POST['action']) && $_POST['action'] == 'login') {
    if (checkCredentials($_POST['login'], $_POST['password'])) {
        $_SESSION['isLogged'] = true;
        $_SESSION['login'] = $_POST['login'];
        header('Location: index.php');
        die;
    } else {
        $errorMessage = 'You have provided wrong credentials!';

        $count = $_COOKIE['count'];
        $count++;
        setcookie('count', $count);
    }
}
?>
<div class="global">
    <h1>Login</h1>
    <div class="red">
        <?php if (isset($errorMessage)) {
            echo $errorMessage;
        } ?>
    </div>

    <form action="login.php" method="post">
        <input type="hidden" name="action" value="login">
        <div class="position">
            <label for="login">Login</label>
            <input type="text" id="login" name="login">
        </div>

        <div class="position">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>

        <div class="position">
            <input type="submit" value="login">
        </div>
    </form>
    <a href="registration.php">Регистрация</a>
</div>