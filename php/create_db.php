<?php
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
        user_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        username VARCHAR(100) NOT NULL,
        password VARCHAR(100) NOT NULL,
        email VARCHAR(100)
        )";

        $conn->exec($sql);
        echo "Table Users created successfully<br>";

        $sql = "CREATE TABLE Projects (
        project_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        project_name VARCHAR(200) NOT NULL,
        creator INT(10) NOT NULL,
        relative_path VARCHAR(50) NOT NULL,
        unique_name VARCHAR(30) NOT NULL
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

        $sql = "INSERT INTO Projects (project_name, creator, relative_path, unique_name)
        VALUES ('Angular2', '1', '../papers/61858/referat.html', '61858_1_86');";
        $conn->exec($sql);

        $sql = "INSERT INTO Projects (project_name, creator, relative_path, unique_name)
        VALUES ('CakePHP', '2', '../papers/61853/referat.html', '61853_2_36');";
        $conn->exec($sql);

        $sql = "INSERT INTO Projects (project_name, creator, relative_path, unique_name)
        VALUES ('EcmaScript', '3', '../papers/62000/referat.html', '62000_1_92')";
        $conn->exec($sql);
        
        $conn->commit();
    }
    
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
?>