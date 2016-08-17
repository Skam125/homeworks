<?php

$messages = array();
$storedMessage = unserialize(file_get_contents('data.txt'));
$messages = $storedMessage;

if (isset($_POST['username']) && isset($_POST['message'])) {
    if ($_POST['username'] != false && $_POST['message'] != false) {

        $messages[] = array('username' => $_POST['username'], 'message' => $_POST['message']);
        file_put_contents('data.txt', serialize($messages));

    }
}

foreach ($messages as $message) {
    echo '<H4>' . $message['username'] . '</H4>';
    echo '<p>' . $message['message'] . '</p>' . '<br>';
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
