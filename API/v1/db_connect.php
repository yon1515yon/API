<?php

include_once("config.php");

$connection = mysqli_connect($DB["host"], $DB["login"], $DB["password"], $DB["name"]);

mysqli_query($connection, "SET NAMES '" . $DB['charset'] . "_unicode_ci';");
mysqli_query($connection, "SET CHRACTER SET '" . $DB['charset'] . "_unicode_ci';");
mysqli_query($connection, "SET timezone = '" . TIME_ZONE . "';");
mysqli_query($connection, "SET group_concat_max_len = 9999999;");

if(mysqli_connect_errno()){
    echo ajax_echo(
        "Ошибка!",
        // заголовок
        "Нет ГЕТ параметра token", // описание ответа 
        true,
        "ERROR",
        null
    );
   
    exit();
}

if(!$connection->set_charset($DB['charset'])){
    echo ajax_echo(
        "Ошибка!",
        // заголовок
        "Нет ГЕТ параметра token", // описание ответа 
        true,
        "ERROR",
        null
    );
   

exit();
}