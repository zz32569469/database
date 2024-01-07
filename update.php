<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "db_conn.php";

    $game_id=$_POST["id"];
    $game_name=$_POST["name"];
    $game_price=$_POST["price"];

    $update=("update game_pool set game_name=?, game_price=? where game_id=?");

    $stmt=$db->prepare($update);
    $stmt->execute(array($game_name, $game_price, $game_id));

    header('Location: maker_index.php');
?>