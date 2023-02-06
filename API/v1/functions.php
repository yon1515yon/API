<?php 

function ajax_echo(
    $titel= '',
    $desc= '',
    $error= true,
    $type= 'ERROR', 
    $other= null
){
    return json_encode(
        array(
            "error" => $error,
            "type" => $type,
            "title" => $titel,
            "desc" => $desc,
            "other" => $other,
            "datetime" => array(
                'Y' => date('Y'),
                'm' => date('m'),
                'd' => date('d'),
                'H' => date('H'),
                'i' => date('i'),
                's' => date('s'),
                'full' => date('Y-m-d H:i:s'),
                
            )
        )
    );
}



function get_ip()
{
    $value = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $value = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $value = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
        $value = $_SERVER['REMOTE_ADDR'];
    }

  return $value;
}