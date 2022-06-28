<?php
$files = $_GET["files"];
if (substr($files, -4) == ".png" || substr($files, -4) == ".jpg" || substr($files, -5) == ".jpeg") {
    echo '<img src="' . $files . '">';
} elseif (substr($files, -4) == ".pdf") {
    echo '<embed src="' . $files . '" width="500" height="375" type="application/pdf">';
} else {
    $return = json_encode(file_get_contents($files));
    echo json_decode($return);
}