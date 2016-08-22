<?php

include 'include\settings.php';
include 'include\functions.php';
$message = '';
if (isset($_GET['performedAction']) && $_GET['performedAction'] == 'remove') {
    $message = 'Image was removed!';
}
$errorMessage = '';

/* adding file */
if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $file = $_FILES['image'];
    $destination = $_POST['category'] . '/' . $file['name'];
    checkAndUploadFile($_FILES['image'], $destination, $message, $errorMessage);
}
/* remove file */
if (isset($_POST['action']) && $_POST['action'] == 'remove') {
    if (removeFile($_POST['filename'])) {
        header('Location: gallery.php?performedAction=remove');
    }
}

/* adding directory */
if (isset($_POST['action']) && $_POST['action'] == 'add_dir') {
    mkdir(PICTURES_DIR . $_POST['dir_name']);
    $message = "Категория {$_POST['dir_name']} создана!";
}

/* deleting directory */
if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    removeDir($_POST['chosenOne']);
    $cat = str_replace(PICTURES_DIR, '', $_POST['chosenOne']);
    $message = "Категория {$cat} удалена";
}

/* rename directory */
if (isset($_POST['action']) && $_POST['action'] == 'rename') {
    rename($_POST['chosenOne'], PICTURES_DIR . $_POST['new_name']);
    $cat = str_replace(PICTURES_DIR, '', $_POST['chosenOne']);
    $message = "Категория {$cat} переименована в {$_POST['new_name']}";
}

/* gallery */
$categories = glob(PICTURES_DIR . '*', GLOB_ONLYDIR);

?>


<h1>Our gallery</h1>
<?php if (isset($message)) { ?>
    <div style="color:green"><?php echo $message ?></div>
<?php } ?>

<?php if (isset($errorMessage)) { ?>
    <div style="color:red"><?php echo $errorMessage ?></div>
<?php } ?>

<h3>Add category</h3>
<form action="" method="post">
    <label for="dir name">Название категории:</label>
    <input type="hidden" name="action" value="add_dir">
    <input type="text" name="dir name" id="dir name">
    <input type="submit" value="Создать категорию">
</form>

<h3>Add your image</h3>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="add">
    <input type="file" name="image">
    <label for="category">И категорию</label>
    <select name="category" id="category">
        <?php foreach ($categories as $value) { ?>
            <option value="<?php echo $value; ?>"> <?php echo str_replace(PICTURES_DIR, '', $value); ?></option>
        <?php } ?>
    </select>
    <input type="submit">
</form>


<h3>Тип сортировки:</h3>
    <form method="post">
        <label for="sort alphabetically">по имени:</label>
        <input type="radio" name="sort type" value="alphabetically" id="sort alphabetically" checked>
        <label for="sort size">по размеру:</label>
        <input type="radio" name="sort type" value="size" id="sort size"
            <?php if (isset($_POST['sort_type']) && $_POST['sort_type'] == 'size') echo 'checked' ?>>
        <input type="submit"/>
    </form>

    <form action="" method="post">
        <input type="hidden" name="action" id="delete" value="delete">
        <select name="chosenOne">
            <?php foreach ($categories as $value) { ?>
                <option value="<?php echo $value; ?>"><?php echo str_replace(PICTURES_DIR, '', $value); ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Удалить!">
    </form>

    <form action="" method="post">
        <label for="rename">Категорию</label>
        <input type="hidden" name="action" id="rename" value="rename">
        <select name="chosenOne">
            <?php foreach ($categories as $value) { ?>
                <option value="<?php echo $value; ?>"><?php echo str_replace(PICTURES_DIR, '', $value); ?></option>
            <?php } ?>
        </select>
        <label for="new name">переименовать в</label>
        <input type="text" name="new name" id="new name">
        <input type="submit" value="Переименовать!">
    </form>


    <div id="gallery" style="clear: both">
        <?php
        foreach ($categories as $value) {
            $images = glob($value . '/*.*');
            if(count($images) == 0) continue;
            /* сортировка */
            if (isset($_POST['sort_type'])) {
                switch ($_POST['sort_type']) // для дополнительных типов сортировки
                {
                    case 'size':
                        usort($images, "cmp"); // сортировка по размеру
                        break;
                }
            }
            ?>
            <h1> <?php echo str_replace(PICTURES_DIR, '', $value) ?> </h1>
            <?php foreach ($images as $value) { ?>

                <img src="<?php echo $value ?>" alt="" height="100">
                <form action="" method="post">
                    <input type="hidden" name='action' value="remove">
                    <input type="hidden" name='filename' value="<?php echo $value ?>">
                    <input type="submit" value="Remove">
                </form>
            <?php  }
        } ?>
    </div>


