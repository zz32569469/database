<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "db_conn.php";

    $maker_account=$_POST["account"];
    $maker_pass=$_POST["password"];

    $query=("select maker_account, maker_pass from maker_data where maker_account=? and maker_pass=?");

    $stmt=$db->prepare($query);
    $stmt->execute(array($maker_account, $maker_pass));
    $result=$stmt->fetchALL();

    if(count($result)==1){
        $_SESSION['m_account']=$maker_account;
        header('Location: maker_index.php');
    }
    else{
        echo "password or account error!"."<br>";
        echo "<input type='button' value='GO back' onclick = 'history.back()'</input>";
    }
?>