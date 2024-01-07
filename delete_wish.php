<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "db_conn.php";

    $user_account=$_SESSION["account"];
    $game_id=$_POST['id'];

    $delete=("delete from wish_list where game_id=? and user_account=?");

    $stmt=$db->prepare($delete);
    $stmt->execute(array($game_id, $user_account));

    header('Location: wishlist.php');
?>