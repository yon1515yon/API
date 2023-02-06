<?php

set_error_handler('err_handler');
function err_handler($errno, $errmsg, $filename, $linenum){

    $path_error_log = "../error.log";
    $date = date("Y-m-d H:i:s (T)");

    file_put_contents($path_error_log, json_encode(array(
        "date"      => $date, 
        "errno"     => $errno, 
        "errmsg"    => $errmsg, 
        "filename"  => $filename, 
        "linenum"   => $linenum, 
        
        
    ))."\r\n", FILE_APPEND);
    
        echo json_encode(
            array(
                "error" => true,
                "type" => "FATAL_ERROR",
                "title" => "Критическая ошибка",
                "desc" => $errmsg,
                "linenum" => $linenum,
                "errno" => $errno, 
                "filename" => $filename, 
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
    exit;
}