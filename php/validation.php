<?php
    session_start();
    $username = $password = "";
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "star_wars";

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
        
        $result = $conn->prepare("SELECT username, password FROM Users WHERE username = :username AND password = :password");
        $result->bindParam(':username', $username);
        $result->bindParam(':password', $password);
        $result->execute();
            
        if($result->rowCount() > 0 ) {
            $_SESSION['username'] = $username;
            header("Location: paper.php");
            exit;
        }
        else {
            $_SESSION['error'] = "Невалидно потребителско име и/или парола!";
            header("Location: ../index.php");
        }   
    }
    else {
        die("Моля въведете потребителско име и/или парола!");
    }
?>