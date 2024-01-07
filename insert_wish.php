<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "db_conn.php";

    $user_account=$_SESSION["account"];
    $game_id=$_POST['id'];

    $insert=("insert into wish_list values(?, ?)");

    try{
        $stmt=$db->prepare($insert);
        $stmt->execute(array($game_id, $user_account));
        header('Location: game_pool.php');
    }
    catch(PDOException $e){
        //Print "getMessage()".$e->getMessage();
        echo "以新增至願望清單。";
        echo "<input type='button' value='GO back' onclick = 'history.back()'</input>";
    }
?>