<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "db_conn.php";

    $maker_account=$_POST["username"];
    $maker_pass=$_POST["password"];

    $insert=("insert into maker_data values(?, ?)");

    $stmt=$db->prepare($insert);
    $stmt->execute(array($maker_account, $maker_pass));
    echo "sign up success!".'<br>';

    $_SESSION['m_account']=$maker_account;

    header('Location: maker_index.php');
?>

