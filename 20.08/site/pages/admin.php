<link rel="stylesheet" type="text/css" href="style/formalign.css">
<div id="content">
    <?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    $styles = array(
        'Style1' => './style/style1.css',
        'Style2' => './style/style2.css',
        'Style3' => './style/style3.css',
        'Style4' => './style/style4.css',
        'Style5' => './style/style5.css',);

    if (isset($_POST['action']) && $_POST['action'] == 'changePassword') {
        if (checkCredentials($_POST['login'], $_POST['password'])) {
            if ($_POST['newpassword'] == $_POST['newpassword2']) {
                changePassword($_POST['newpassword']);
                echo 'Your Password has been changed!';
            } else $errorMessage = 'Пароль не совпадает с подтверждением!';
        } else $errorMessage = 'Wrong login or password!';
    }
    ?>
    <h1>Admin page</h1>
    <h3>Choose your style:</h3>
    <form action="index.php?page=admin" method="post">
        <input type="hidden" name="action" value="saveStyle">
        <label for="style"></label>
        <select name="style" id="style">
            <?php foreach ($styles as $title => $style) { ?>
                <option <?php if ($style == getUserStyle()) echo 'selected'; ?>
                    value="<?php echo $style; ?>"><?php echo $title; ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Change style">
    </form>
    <h3>Change your password:</h3>
    <div class="red"><?php if (isset($errorMessage)) {
            echo $errorMessage;
        } ?> </div>

    <form action="index.php?page=admin" method="post">
        <div class="position">
            <input type="hidden" name="action" value="changePassword">
            <label for="login">Логин:</label>
            <input type="text" name="login" id="login" required>
        </div>
        <div class="position"><label for="password">Пароль:</label>
            <input type="password" name="password" id="password" required></div>
        <div class="position"><label for="newpassword">Новый пароль:</label>
            <input type="password" name="newpassword" id="newpassword" required></div>
        <div class="position"><label for="newpassword2">Подтверждение пароля:</label>
            <input type="password" name="newpassword2" id="newpassword2" required></div>
        <div class="position"><input type="submit" value="Change password"></div>
    </form>

    <h3>Create page:</h3>
    <form action="" method="post">
        <input type="hidden" name="action" value="create">
        <label for="create">Page name:</label>
        <input type="text" name="create" id="create">
        <input type="submit" value="create">
    </form>
    <?php if(isset($_POST['create']) && $_POST['action']== 'create'){
        $path = './user_pages/' . $_POST['create'] . '.html';
        $file = fopen('./users_pages/' . $_POST['create'] . '.html', "a");
        fclose($file);
        header("Location: index.php?page=admin");
        die();
    }
    ?>

    <h3>Delete page:</h3>
    <form action="" method="post">
        <input type="hidden" name="action" value="delete">
        <label for="delete">Выберите страницу для удаления:</label>
        <select name="delete" id="delete">
            <?php
            $search = array('./users_pages/', '.html');
            foreach (glob("./users_pages/*.html") as $filename) { ?>
                <option
                    value="<?php echo $filename; ?>" <?php if (isset($_POST['choose']) && $_POST['choose'] == $filename) {
                    echo 'selected';
                } ?>><?php echo str_replace($search, '', $filename); ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="delete">
    </form>
    <?php  if (isset($_POST['action']) && $_POST['action'] == 'delete') {
        echo (unlink($_POST['delete'])) ? 'Страница удалена' : 'ошибка';
        header("Location: index.php?page=admin");
    }?>

    <h3>Edit page:</h3>
    <form action="" method="post">
        <input type="hidden" name="action" value="choose">
        <label for="choose">Выберите страницу для редактирования:</label>
        <select name="choose" id="choose">
            <?php
            $search = array('./users_pages/', '.html');
            foreach (glob("./users_pages/*.html") as $filename) { ?>
                <option value="<?php echo $filename; ?>" <?php if (isset($_POST['choose']) && $_POST['choose'] == $filename) {
                    echo 'selected';  } ?>><?php echo str_replace($search, '', $filename); ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Choose">
    </form>

    <form action="" method="post">
        <input type="hidden" name="action" value="edit">
        <input type="submit" value="edit">
        <label for="edit"></label>
    <textarea name="edit" id="edit" cols="100" rows="20">
        <?php
        if (isset($_POST['action']) && $_POST['action'] == 'choose') {
            $_SESSION['choose']=$_POST['choose'];
            echo htmlentities(file_get_contents($_POST['choose']));
        }
        ?>
    </textarea>
    </form>


    <?php if (isset($_POST['action']) && $_POST['action'] == 'edit') {
        file_put_contents($_SESSION['choose'], html_entity_decode($_POST['edit']));
    } ?>


</div>




