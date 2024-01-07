<html>
    <head>
        <meta http-equiv='Content-type' content='text/html'; charset='utf-8'>
        <meta http-equiv="Pragma" Content="Co-cache">
    </head>
    <center>
        <body>
            <form action="update.php" method="post">
                ID:<input type="text" name="id" placeholder=<?php echo $_POST['id']?>>
                <br>
                <br>
                Name:<input type="text" name="name" placeholder=<?php echo $_POST['game_name']?>>
                <br>
                <br>
                Price:<input type="text" name="price" placeholder=<?php echo $_POST['game_price']?>>
                <br>
                <br>
                <input type="submit" name="submit" value="update">
            </form>
        </body>
    </center>
</html>

