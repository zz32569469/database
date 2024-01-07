<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "db_conn.php";

    $query = ("select game_id, game_name, game_price, game_comment from game_pool");
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll();

    $cnt = ("select count(game_id) as cnt from wish_list where wish_list.user_account=?");
    $stmt = $db->prepare($cnt);
    $stmt->execute(array($_SESSION['account']));
    $result2 = $stmt->fetchAll();

    $tot=$result2[0]['cnt'];

    echo "<p align='right'>";
    echo "<a href='wishlist.php'><button>Go to Wishlist</button></a>(".$tot.")";
    echo "</p>";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Price</th>";
    echo "<th>Comment</th>";
    echo "<th>Select</th>";
    echo "</tr>";

    for ($i = 0; $i < count($result); $i++) {
        echo "<form method='post' action='insert_wish.php'>";
        echo "<tr>";
        echo "<td>".$result[$i]['game_id']."</td>";
        echo "<td>".$result[$i]['game_name']."</td>";
        echo "<td>".$result[$i]['game_price']."</td>";
        echo "<td>".$result[$i]['game_comment']."</td>";

        echo "<td><input type='submit' name='select_button' value='select'></td>";
        echo "</tr>";

        echo "<input type='hidden' name='id' value='".$result[$i]['game_id']."'>";
        echo "<input type='hidden' name='game_name' value='".$result[$i]['game_name']."'>";
        echo "<input type='hidden' name='game_price' value='".$result[$i]['game_price']."'>";
        echo "<input type='hidden' name='game_comment' value='".$result[$i]['game_comment']."'>";
        echo "</form>";
    }
    echo "</table>";
?>