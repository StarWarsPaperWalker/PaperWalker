<!DOCTYPE html>
<?php
    if(empty($_SESSION['error'])) { 
        session_start(); 
    }
    if(isset($_SESSION['username'])) {
        header("Location: php/paper.php");
    }
?>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Star Wars Papers</title>
        <link rel=stylesheet type="text/css" href="css/home.css">
    </head>
    <body>
        <div class="field">
            <form method="POST" action="php/validation.php">
                <input type="text" name="username" placeholder="Потребителско име"/>
                <input type="password" name="password" placeholder="Парола"/>
                <input type="submit" value="Продължи"/>
            </form>
            <div id="error">
                <?php 
                    if(!empty($_SESSION['error'])) { 
                        echo $_SESSION['error']; 
                    } 
                ?>
            </div>
            <?php 
                unset($_SESSION['error']);
            ?>
        </div>
    </body>
</html>