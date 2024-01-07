<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "db_conn.php";

    $user_account=$_POST["username"];
    $user_pass=$_POST["password"];

    $insert=("insert into user_data values(?, ?)");

    $stmt=$db->prepare($insert);
    $stmt->execute(array($user_account, $user_pass));
    echo "sign up success!".'<br>';

    $_SESSION['account']=$user_account;

    header('Location: game_pool.php');
?>

