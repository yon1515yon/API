<?php

if(!isset($_GET)){
    echo ajax_echo(
        "Ошибка!",
        "Нет Get параметров",
        true,
        "ERROR",
        null
    );
    exit();
}

if(!isset($_GET['token'])){
    echo ajax_echo(
        "Ошибка!",
        "Нет Get параметра token",
        true,
        "ERROR",
        null
    );
    exit();
}

#define("TOKEN", $_GET['token']);

if(!preg_match_all("/^[A-z0-9_]{32}$/ui", $_GET['token'])){
    echo ajax_echo(
        "Ошибка!",
        "Ваш токен не соответствует заданным параметрам!",
        true,
        "ERROR",
        null
    );
    exit();
}

$query = "SELECT COUNT(id) > 0 AS 'RESULT' FROM tokens WHERE token = '".$_GET['token']."' AND ban = FALSE";


$res_query = mysqli_query($connection, $query);

if(!$res_query){
    echo ajax_echo(
        "Ошибка!",
        "Ошибка в запросе!",
        true,
        "ERROR",
        null
    );
    exit();
}

$res = mysqli_fetch_assoc($res_query);

if($res['RESULT'] == '0'){
    echo ajax_echo(
        "Ошибка!",
        "Ваш токен не является действительным!",
        true,
        "ERROR",
        null
    );
    exit();
}