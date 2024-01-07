<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "db_conn.php";

    $game_name=$_POST["name"];
    $game_price=$_POST["price"];

    $add=("insert into game_pool (game_name, game_price, maker_account) values(?, ?, ?)");

    $stmt=$db->prepare($add);
    $stmt->execute(array($game_name, $game_price, $_SESSION['m_account']));

    header('Location: maker_index.php');
?>