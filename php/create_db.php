<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: ../index.php");
        die();
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "star_wars";

    try {
        $conn = new PDO("mysql:host=$servername;", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE ".$dbname;
        
        $conn->exec($sql);
        echo "Database created successfully<br>";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "CREATE TABLE Users (
        userid INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        username VARCHAR(100) NOT NULL,
        password VARCHAR(100) NOT NULL,
        email VARCHAR(100)
        )";

        $conn->exec($sql);
        echo "Table Users created successfully<br>";

        $sql = "CREATE TABLE Projects (
        projectid INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        projectname VARCHAR(200) NOT NULL,
        creator INT(10) NOT NULL,
        relativepath VARCHAR(50) NOT NULL
        )";

        $conn->exec($sql);
        echo "Table Projects created successfully";

        $conn->beginTransaction();

        $sql = "INSERT INTO Users (username, password, email)
        VALUES ('Dilyan', 'password', 'dido@example.com');";
        $conn->exec($sql);

        $sql = "INSERT INTO Users (username, password, email)
        VALUES ('Martin', '12345678', 'marto@example.com');";
        $conn->exec($sql);

        $sql = "INSERT INTO Users (username, password, email)
        VALUES ('Milen', 'root', 'milen@example.com')";
        $conn->exec($sql);

        $sql = "INSERT INTO Projects (projectname, creator, relativepath)
        VALUES ('Angular2', '1', '../papers/61858/referat.html');";
        $conn->exec($sql);

        $sql = "INSERT INTO Projects (projectname, creator, relativepath)
        VALUES ('CakePHP', '2', '../papers/61853/referat.html');";
        $conn->exec($sql);

        $sql = "INSERT INTO Projects (projectname, creator, relativepath)
        VALUES ('Example', '3', '../papers/62000/referat.html')";
        $conn->exec($sql);
        
        $conn->commit();
    }
    
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
?>