<?php
    session_start();
    echo '<link rel="stylesheet" type="text/css" href="table.css">';

    $hostname = 'localhost';
    $dbname = 'stream_project';
    $charset = 'utf8';
    $user = 'root';
    $password = '1234567890';

    try{
        $db = new
            PDO("mysql: host=$hostname;
                        dbname=$dbname;
                        charset=$charset",
                        $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }catch(PDOexception $e){
        Print "Error: ".$e->getMessage();
        die();
    }
?>