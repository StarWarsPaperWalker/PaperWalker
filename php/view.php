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
        <title>Star Wars Paper</title>
        <link rel=stylesheet type="text/css" href="../css/style.css">
    </head>
    <body>
        <a href="paper.php" class="back">Назад</a>
        <a href="logout.php" class="logout">Изход</a>
        <p id="start">A long time ago in a Web paper very, very far away&hellip;</p>
        <div class="h1">Star Wars<sub>реферат</sub></div>
        <div class="wrapper" id="paper">
            <div id="paper-content">
                <p class="center">
                    <?php
                        error_reporting(0);
						$input=$_POST["referat"];
						$uniqueName=explode("/", $input)[6];
						
						$servername = "localhost";
						$db_username = "root";
						$db_password = "";
						$dbname = "puffin";
						
						try {
							$conn = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);
							$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						} catch (PDOException $e){
							exit($e->getMessage());
						}
                    
                        $uniqueNameParts=explode("_", $uniqueName);
                        $result = $conn->prepare("SELECT user_id, version, theme FROM projects where (user_id = :userId and version = :version and theme = :theme)");
                        $result->bindParam(':userId', $uniqueNameParts[0]);
                        $result->bindParam(':version', $uniqueNameParts[1]);
                        $result->bindParam(':theme', $uniqueNameParts[2]);
                        $result->execute();
						
						/* $result = $conn->prepare("SELECT relative_path FROM Projects WHERE unique_name = :uniqueName");
						$result->bindParam(':uniqueName', $uniqueName[6]);
						$result->execute(); */
                    
                        $path = $result->fetchAll()[0];
						
                        $fileLocation="../papers/".$path["user_id"]."/".$path["version"]."_".$path["theme"]."/referat.html";
                    
                        if (!file_exists($fileLocation)) {
                            $fileLocation='../papers/default/referat.html';
                            echo "<audio style='display: none' controls autoplay loop='loop'>
                            <source src='../audio/imperial_march.ogg' type='audio/ogg'>
                            <source src='../audio/imperial_march.mp3' type='audio/mpeg'>
                            </audio>";
                        }
                        else {
                            echo "<audio style='display: none' controls autoplay loop='loop'>
                            <source src='../audio/theme_song.ogg' type='audio/ogg'>
                            <source src='../audio/theme_song.mp3' type='audio/mpeg'>
                            </audio>";
                        }
                    
                        $dom = new DOMDocument();
                    
                        libxml_use_internal_errors(true);
                        $dom->loadHTML(file_get_contents($fileLocation));
                        libxml_clear_errors();
                        
                        $paper_title = '';
                        $title = $dom->getElementsByTagName('title');
                        if ($title->length > 0) {
                            $paper_title = $title->item(0)->textContent;
                        }
                        $paper_title = mb_strtoupper($paper_title, "utf-8");
                        echo $paper_title;
                    
                        echo '</p>';
                            
                        $paper_content = new DOMDocument;
                        $body = $dom->getElementsByTagName('body')->item(0);
                        foreach ($body->childNodes as $child) {
                            $paper_content->appendChild($paper_content->importNode($child, true));
                        }
                        echo $paper_content->saveHTML();
                ?>
            </div>
        </div>
        <script src="../js/counter.js"></script>
        <script src="../js/wrapper.js"></script>
    </body>
</html>