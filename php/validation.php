<?php
    session_start();
    $username = $password = "";
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "puffin";

    function check_input($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    if(isset($_POST)) 
    {     
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            exit($e->getMessage());
        }
        
        $username = check_input($_POST["username"]); 
        $password = check_input($_POST["password"]); 
        $hashed_password = md5($password);
        
        $result = $conn->prepare("SELECT username, password FROM user WHERE username = :username AND password = :password");
        $result->bindParam(':username', $username);
        $result->bindParam(':password', $hashed_password);
        $result->execute();
            
        if($result->rowCount() > 0 ) {
            $_SESSION['username'] = $username;
            header("Location: paper.php");
            exit;
        }
        else {
            $_SESSION['error'] = "Невалидно име и/или парола!";
            header("Location: ../index.php");
        }   
    }
    else {
        die("Моля въведете потребителско име и/или парола!");
    }
?>