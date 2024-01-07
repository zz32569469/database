<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "db_conn.php";

    $maker_account=$_SESSION["m_account"];
    $game_id=$_POST['id'];

    $delete=("delete from game_pool where game_id=? and maker_account=?");

    $stmt=$db->prepare($delete);
    $stmt->execute(array($game_id, $maker_account));

    header('Location: maker_index.php');
?>