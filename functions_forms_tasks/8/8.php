<?php
/* settings */
define('STORAGE', 'data2.txt');
$bannedWords = array('xxx', 'yyy');
$count = 0; // Количество запрещенных слов в тексте
/* logic */
$messages = array();
$storedMessages = unserialize(file_get_contents(STORAGE));
$messages = $storedMessages;

if (isset($_POST['username']) && isset($_POST['message'])) {
    if ($_POST['username'] != false && $_POST['message'] != false) {
        $err = str_replace($bannedWords, ' ', $_POST['message'], $count);
        if ($count == 0) {
            $messages[] = array('username' => $_POST['username'], 'message' => $_POST['message']);
            file_put_contents(STORAGE, serialize($messages));
        } else {
            $errMessage = 'Некорректный комментарий';
        }


    }
}
foreach ($messages as $message) {
    echo '<H4>' . strip_tags($message['username'], '<b>') . '</H4>';
    echo '<p>' . strip_tags($message['message'], '<b>') . '</p>' . '<br>';

}
if (isset($errMessage)) {
    echo $errMessage;
}



?>


<form action="" method="post">
    <label for="username">Имя:</label>
    <input type="text" name="username" id="username" required>
    <div style="clear: both"></div>
    <label for="message">Сообщение:</label>
    <textarea name="message" id="message" cols="30" rows="10" required></textarea>
    <div style="clear: both"></div>
    <input type="submit">
</form>