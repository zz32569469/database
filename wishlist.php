<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "db_conn.php";

    $query = ("select game_pool.game_id, game_pool.game_name, game_pool.game_price, game_pool.game_comment from game_pool, wish_list
                where wish_list.user_account=? and game_pool.game_id=wish_list.game_id");
    $stmt = $db->prepare($query);
    $stmt->execute(array($_SESSION['account']));
    $result = $stmt->fetchAll();
    echo "<p align='right'>";
    echo "<a href='game_pool.php'><button>Go to Game Pool</button></a>";
    echo "</p>";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Price</th>";
    echo "<th>Comment</th>";
    echo "<th>Delete</th>";
    echo "</tr>";

    for ($i = 0; $i < count($result); $i++) {
        echo "<form method='post' action='delete_wish.php'>";
        echo "<tr>";
        echo "<td>".$result[$i]['game_id']."</td>";
        echo "<td>".$result[$i]['game_name']."</td>";
        echo "<td>".$result[$i]['game_price']."</td>";
        echo "<td>".$result[$i]['game_comment']."</td>";

        echo "<td><input type='submit' name='select_button' value='delete'></td>";
        echo "</tr>";

        echo "<input type='hidden' name='id' value='".$result[$i]['game_id']."'>";
        echo "<input type='hidden' name='game_name' value='".$result[$i]['game_name']."'>";
        echo "<input type='hidden' name='game_price' value='".$result[$i]['game_price']."'>";
        echo "<input type='hidden' name='game_comment' value='".$result[$i]['game_comment']."'>";
        echo "</form>";
    }
    echo "</table>";
?>