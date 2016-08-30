<?php

function getPageName($allowedPages)
{

    $page = 'main';
    if (isset($_GET['page']) &&
        $_GET['page'] &&
        in_array($_GET['page'], $allowedPages)
    ) {
        $page = $_GET['page'];
    }

    return $page;
}


function userRegistration($login, $password)
{
    $accountArr = array();
    $loginData = unserialize(file_get_contents('data.txt'));
    $accountArr = $loginData;
    foreach ($accountArr as $value) {
        if ($login == $value['login']) {
            $error = 1;
        } else {
            $error = 0;
        }
    }
    if ($error == 0) {
        $accountArr[] = array(
            'login' => $login,
            'password' => $password,
        );
        file_put_contents('data.txt', serialize($accountArr));
        return true;
    } else {
        return false;
    }
}


function checkCredentials($login, $password)
{
    $loginData = unserialize(file_get_contents('data.txt'));
    foreach ($loginData as $key => $value) {
        if ($login == $value['login'] && $password == $value['password']) {
            return true;
        }
    }

    return false;
}

function changePassword($newPassword)
{
    $loginData = unserialize(file_get_contents('data.txt'));
    foreach ($loginData as $key => $value) {
            $loginData[$key]['password'] = $newPassword;
        }
    file_put_contents('data.txt', serialize($loginData));
}

function isLogged()
{

    if (isset($_SESSION['isLogged']) && $_SESSION['isLogged']) {
        return true;
    }

    return false;
}


function logout()
{
    unset($_SESSION['isLogged']);
}

function getUserStyle()
{
    $style = './style/style1.css';
    if (isset($_COOKIE['style'])) {
        $style = $_COOKIE['style'];
    }
    return $style;
}





