<?php

/**
 * Title: HTML Entities Encode & Decode
 * Date: 15/02/2022
 */

$data = "String with HTML amphasand code - <b>&amp;</b>";

$data_encoded = htmlentities($data);

$data_decoded = html_entity_decode($data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>HTML Entity Encode and Decode</h1>
    <hr>
    <br>

    <h2>Original String</h2>
    <pre><?= $data ?> | original: HTML will read and auto convert the symbol to human readable format.</pre>

    <br>
    <h2>Encoded String</h2>
    <pre><?= $data_encoded ?> | encoded: PHP will preserve HTML code in original form. It will stay non-human readable.</pre>

    <br>
    <h2>Decoded String</h2>
    <pre><?= $data_decoded ?> | decoded: PHP will decode it back from non-human readable to human readable format.</pre>
</body>
</html>