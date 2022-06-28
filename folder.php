<?php
require_once('script.php');
$folder_scan = $_GET["folder"];
my_scan($folder_scan);
$fin = [];
$current_dir = basename(realpath($folder_scan));
$fin[$current_dir] = my_scan($folder_scan);

echo '<div class="folder_content">';
folder_content($fin);
echo '</div>';
