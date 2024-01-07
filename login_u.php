<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "db_conn.php";

    $user_account=$_POST["account"];
    $user_pass=$_POST["password"];

    $query=("select user_account, user_pass from user_data where user_account=? and user_pass=?");

    $stmt=$db->prepare($query);
    $stmt->execute(array($user_account, $user_pass));
    $result=$stmt->fetchALL();

    if(count($result)==1){
        $_SESSION['account']=$user_account;
        header('Location: game_pool.php');
    }
    else{
        echo "password or account error!"."<br>";
        echo "<input type='button' value='GO back' onclick = 'history.back()'</input>";
    }
?>