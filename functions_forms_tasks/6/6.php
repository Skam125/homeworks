<?php
/* settings */
define('GALLERY_FOLDER', 'gallery/');
$cols = 5; // количество колонок в таблице
$i = 0;

/* functions */
function uploadFile($file)
{
    $fileTmpPath = $file['tmp_name'];
    $destination = GALLERY_FOLDER . $file['name'];
    move_uploaded_file($fileTmpPath, $destination);
}

/* logic */

if (isset($_FILES['image'])) {
    if ($_FILES['image']['type'] == 'image/jpeg') {
        uploadFile($_FILES['image']);
    } else { echo 'Картинка только в формате .jpeg'; }
}

$images = glob(GALLERY_FOLDER . '*.*');


?>


<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="add">
    <input type="file" name="image">
    <input type="submit">
</form>

<?php
echo '<table style="border: solid 1px lightblue">';

foreach ($images as $image) {
    if ($i == 0) {
        echo '<tr>';
    } ?>

    <td><img src="<?php echo $image; ?>" width="100px"></td>

    <?php
    $i++;
    if ($i == $cols) {
        echo '</tr>';
        $i = 0;
    }
}

echo '</table>' ?>

