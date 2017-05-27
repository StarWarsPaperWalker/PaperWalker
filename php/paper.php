<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: ../index.php");
        die();
    }
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Star Wars Papers</title>
        <link rel=stylesheet type="text/css" href="../css/home.css">
    </head>
    <body>
        <a href="logout.php" class="logout">Изход</a>
        <div class="field">
            <form method="POST" action="view.php">
                <input type="text" name="referat" placeholder="Линк към реферата..."/>
            </form>
        </div>
    </body>
</html>