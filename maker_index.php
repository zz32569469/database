<?php
    header("Content-type:text/html;charset=utf-8");
    include_once "db_conn.php";

    $query = ("select game_id, game_name, game_price, game_comment from game_pool where maker_account=?");
    $stmt = $db->prepare($query);
    $stmt->execute(array($_SESSION['m_account']));
    $result = $stmt->fetchAll();
    echo "<p align='right'>";
    echo "<a href='add_game.php'><button>Add Game</button></a>";
    echo "</p>";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Price</th>";
    echo "<th>Comment</th>";
    echo "<th>delete</th>";
    echo "<th>update</th>";
    echo "</tr>";

    for ($i = 0; $i < count($result); $i++) {
        echo "<tr>";
        echo "<td>".$result[$i]['game_id']."</td>";
        echo "<td>".$result[$i]['game_name']."</td>";
        echo "<td>".$result[$i]['game_price']."</td>";
        echo "<td>".$result[$i]['game_comment']."</td>";

        echo "<form method='post' action='delete_game.php'>";
        echo "<td><input type='submit' name='add_button' value='delete'></td>";
        echo "<input type='hidden' name='id' value='".$result[$i]['game_id']."'>";
        echo "<input type='hidden' name='game_name' value='".$result[$i]['game_name']."'>";
        echo "<input type='hidden' name='game_price' value='".$result[$i]['game_price']."'>";
        echo "<input type='hidden' name='game_comment' value='".$result[$i]['game_comment']."'>";
        echo "</form>";

        echo "<form method='post' action='update_game.php'>";
        echo "<td><input type='submit' name='update_button' value='update'></td>";
        echo "<input type='hidden' name='id' value='".$result[$i]['game_id']."'>";
        echo "<input type='hidden' name='game_name' value='".$result[$i]['game_name']."'>";
        echo "<input type='hidden' name='game_price' value='".$result[$i]['game_price']."'>";
        echo "<input type='hidden' name='game_comment' value='".$result[$i]['game_comment']."'>";
        echo "</form>";
        echo "</tr>";        
    }
    echo "</table>";
?>