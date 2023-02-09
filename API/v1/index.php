<?php

include_once('config.php');
include_once('err_handler.php');
include_once('db_connect.php');
include_once('functions.php');
include_once('find_token.php');

include_once("SxGeo.php");

$SxGeo = new SxGeo('SxGeoCity.dat');
//добавить производителя
if(preg_match_all("/^(add_producer)$/ui", $_GET['type'])){
    if(!isset($_GET['name'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр name!",
            true,
            "ERROR",
            null
        );
        exit();
    }
    
    $query = "INSERT INTO `Producer`(`name`) VALUES ('".$_GET['name']."')";

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
    
    echo ajax_echo(
        "Уcпех!",
        "Новый производитель добавлен в бд!",
        false,
        "SUCCESS",
        null
    );
    exit();
}

// добавить тип
else if(preg_match_all("/^(add_type)$/ui", $_GET['type'])){
    if(!isset($_GET['name'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр name!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    $query = "INSERT INTO `Type`(`name`) VALUES ('".$_GET['name']."')";

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
    
    echo ajax_echo(
        "Уcпех!",
        "Новый тип добавлен в бд!",
        false,
        "SUCCESS",
        null
    );
    exit();
}


//добавить экспонат
else if(preg_match_all("/^(add_exhibit)$/ui", $_GET['type'])){
    if(!isset($_GET['name'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр name!",
            true,
            "ERROR",
            null
        );
        exit();
    }
    if(!isset($_GET['excerpt'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр author_id!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    if(!isset($_GET['production_year'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр production_year!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    if(!isset($_GET['alcohol'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр country_id!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    if(!isset($_GET['country_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр country_id!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    if(!isset($_GET['type_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр type_id!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    if(!isset($_GET['producer_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр producer_id!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    $query = "INSERT INTO `Exhibits`(`name`,`alcohol`,`excerpt`,`production_year`,`country_id`,`producer_id`,`type_id`) VALUES ('".$_GET['name']."','".$_GET['alcohol']."',
    '".$_GET['excerpt']."','".$_GET['year_of_creation']."','".$_GET['country_id']."','".$_GET['producer_id']."','".$_GET['type_id']."')";

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
    
    echo ajax_echo(
        "Уcпех!",
        "Новый экспонат добавлен в бд!",
        false,
        "SUCCESS",
        null
    );
    exit();
}    


// обновить имя производителя

else if(preg_match_all("/^(update_producer_name)$/ui", $_GET['type'])){
    if(!isset($_GET['new_name'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр new_name!",
            true,
            "ERROR",
            null
        );
        exit();
    }
    if(!isset($_GET['old_name'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр old_name!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    $query = "UPDATE `Producer` SET `name`= '".$_GET['new_name']."' WHERE `name` = '".$_GET['old_name']."'";

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
    
    echo ajax_echo(
        "Уcпех!",
        "Название производителя изменено в бд!",
        false,
        "SUCCESS",
        null
    );
    exit();
} 
// обнавить производителя

else if(preg_match_all("/^(update_producer_id)$/ui", $_GET['type'])){
    if(!isset($_GET['producer_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр producer_id!",
            true,
            "ERROR",
            null
        );
        exit();
    }
    if(!isset($_GET['Exhibits_id'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр Exhibits_id!",
            true,
            "ERROR",
            null
        );
        exit();
    }

    $query = "UPDATE `Exhibits` SET `producer_id`= '".$_GET['producer_id']."' WHERE `Exhibits`.`id` = '".$_GET['Exhibits_id']."';";

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
    
    echo ajax_echo(
        "Уcпех!",
        "Производитель изменен в бд!",
        false,
        "SUCCESS",
        null
    );
    exit();
} 

// обновить экспонат
else if(preg_match_all("/^(update_type_exhibit)$/ui", $_GET['type'])){
if(!isset($_GET['Exhibits_id'])){
    echo ajax_echo(
        "Ошибка!",
        "Вы не указали Get параметр Exhibit_id!",
        true,
        "ERROR",
        null
    );
    exit();
}
if(!isset($_GET['type_id'])){
    echo ajax_echo(
        "Ошибка!",
        "Вы не указали Get параметр type_id!",
        true,
        "ERROR",
        null
    );
    exit();
}

$query = "UPDATE `Exhibits` SET `type_id`= '".$_GET['type_id']."' WHERE `Exhibits`.`id` = '".$_GET['Exhibits_id']."';";

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

echo ajax_echo(
    "Уcпех!",
    "Тип экспоната изменено в бд!",
    false,
    "SUCCESS",
    null
);
exit();
} 


// список экспонатов по производителю
if(preg_match_all("/^(exhibits_by_producer)$/ui", $_GET['type'])){

    if(!isset($_GET['name'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр name!",
            true,
            "ERROR",
            null
        );
        exit();
    }

$query = "SELECT `Exhibits`.`name` FROM `Exhibits` INNER JOIN `Producer` on `Exhibits`.`producer_id`  = `Producer`.`id` WHERE `Producer`.`name`= '".$_GET['name']."'";
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



$arr_res = array();
$rows = mysqli_num_rows($res_query);

for ($i=0; $i < $rows; $i++) { 
    $row = mysqli_fetch_assoc($res_query);
    array_push($arr_res, $row);
}

echo ajax_echo(
    "Уcпех!",
    "Список продукции",
    false,
    "SUCCESS",
    $arr_res
);
exit();
}



//Вывести все экспонаты по типу 

if(preg_match_all("/^(exhibits_by_type)$/ui", $_GET['type'])){

    if(!isset($_GET['name'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр name!",
            true,
            "ERROR",
            null
        );
        exit();
    }

$query = "SELECT `Exhibits`.`name` FROM `Exhibits` INNER JOIN `Type` on `Exhibits`.`type_id` = `Type`.`id` WHERE `Type`.`name`= '".$_GET['name']."'";
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



$arr_res = array();
$rows = mysqli_num_rows($res_query);

for ($i=0; $i < $rows; $i++) { 
    $row = mysqli_fetch_assoc($res_query);
    array_push($arr_res, $row);
}

echo ajax_echo(
    "Уcпех!",
    "Список продукции",
    false,
    "SUCCESS",
    $arr_res
);
exit();
}


//Вывод по стране

if(preg_match_all("/^(exhibits_by_country)$/ui", $_GET['type'])){

    if(!isset($_GET['name'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр name!",
            true,
            "ERROR",
            null
        );
        exit();
    }

$query = "SELECT `Exhibits`.`name` FROM `Exhibits` INNER JOIN `Country` on `Exhibits`.`country_id` = `Country`.`id` WHERE `Country`.`name`= '".$_GET['name']."'";
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



$arr_res = array();
$rows = mysqli_num_rows($res_query);

for ($i=0; $i < $rows; $i++) { 
    $row = mysqli_fetch_assoc($res_query);
    array_push($arr_res, $row);
}

echo ajax_echo(
    "Уcпех!",
    "Список продукции",
    false,
    "SUCCESS",
    $arr_res
);
exit();
}


//Вывод по году создания 

if(preg_match_all("/^(exhibits_by_year)$/ui", $_GET['type'])){

    if(!isset($_GET['production_year'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр production_year!",
            true,
            "ERROR",
            null
        );
        exit();
    }

$query = "SELECT `name` FROM `Exhibits` WHERE `production_year`= '".$_GET['production_year']."'";
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



$arr_res = array();
$rows = mysqli_num_rows($res_query);

for ($i=0; $i < $rows; $i++) { 
    $row = mysqli_fetch_assoc($res_query);
    array_push($arr_res, $row);
}

echo ajax_echo(
    "Уcпех!",
    "Список продукции",
    false,
    "SUCCESS",
    $arr_res
);
exit();
}

//Вывод по выдержке

if(preg_match_all("/^(exhibits_by_excerpt)$/ui", $_GET['type'])){

    if(!isset($_GET['excerpt'])){
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали Get параметр excerpt!",
            true,
            "ERROR",
            null
        );
        exit();
    }

$query = "SELECT `name` FROM `Exhibits` WHERE `excerpt`= '".$_GET['excerpt']."'";
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



$arr_res = array();
$rows = mysqli_num_rows($res_query);

for ($i=0; $i < $rows; $i++) { 
    $row = mysqli_fetch_assoc($res_query);
    array_push($arr_res, $row);
}

echo ajax_echo(
    "Уcпех!",
    "Список продукции",
    false,
    "SUCCESS",
    $arr_res
);
exit();
}

if(preg_match_all("/^(user_ip|ip)$/ui", $_GET['type'])){
    $ip = get_ip();
    $city = $SxGeo->getCityFull($ip);
    #var_dump($city);
    $GEO = ($city['city'] ['name_ru']);
    $country=(', ' .$city ['country'] ['name_ru']);
    $citycountry = $GEO . $country;
    $query = "INSERT INTO `ip_logs` (`GEO`, `ip`) VALUES ('".$citycountry."', '".$ip."')";
    $res=mysqli_query($connection, $query);

    $query2 = "SELECT COUNT(id) FROM `ip_logs` WHERE ip = '".$ip."'";
    $res2 =  mysqli_query($connection, $query2);

    $arr_res = array();
    $rows = mysqli_num_rows($res2);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res2);
        array_push($arr_res, $row);
    }
    echo ajax_echo(
        "Уcпех!",
        "Кол-во запросов с IP адреса",
        false,
        "SUCCESS",
        $arr_res,
        
    );
    //echo strval($res2);
    exit();
}


