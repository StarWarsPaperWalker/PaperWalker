<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Star Wars Paper</title>
        <link rel=stylesheet type="text/css" href="../css/style.css">
    </head>
    <body>
        <p id="start">A long time ago in a Web paper very, very far away&hellip;</p>
        <div class="h1">Star Wars<sub>реферат</sub></div>
        <div class="wrapper" id="paper">
            <div id="paper-content">
                <p class="center">
                    <?php
                        $result = '';
                        $dom = new DOMDocument();
                        $fileLocation='../papers/61858/referat.html';

                        libxml_use_internal_errors(true);
                        $dom->loadHTML(file_get_contents($fileLocation));
                        libxml_clear_errors();

                        $title = $dom->getElementsByTagName('title');
                        if ($title->length > 0) {
                            $result = $title->item(0)->textContent;
                        }
                        $result = mb_strtoupper($result, "utf-8");
                        echo $result;
                    ?>
                </p>
                <?php
                    $dom = new DOMDocument;
                    $result = new DOMDocument;
                    $fileLocation='../papers/61858/referat.html';
                
                    libxml_use_internal_errors(true);
                    $dom->loadHTML(file_get_contents($fileLocation));
                    libxml_clear_errors();
                
                    $body = $dom->getElementsByTagName('body')->item(0);
                    foreach ($body->childNodes as $child) {
                        $result->appendChild($result->importNode($child, true));
                    }
                    echo $result->saveHTML();
                ?>
            </div>
        </div>
        <script src="../js/wrapper.js"></script>
    </body>
</html>