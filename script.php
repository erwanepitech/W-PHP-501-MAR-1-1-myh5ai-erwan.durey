<?php
function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
    $arBytes = array(
        0 => array(
            "UNIT" => "TB",
            "VALUE" => pow(1024, 4)
        ),
        1 => array(
            "UNIT" => "GB",
            "VALUE" => pow(1024, 3)
        ),
        2 => array(
            "UNIT" => "MB",
            "VALUE" => pow(1024, 2)
        ),
        3 => array(
            "UNIT" => "KB",
            "VALUE" => 1024
        ),
        4 => array(
            "UNIT" => "B",
            "VALUE" => 1
        ),
    );

    foreach ($arBytes as $arItem) {
        if ($bytes >= $arItem["VALUE"]) {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", ",", strval(round($result, 2))) . " " . $arItem["UNIT"];
            return $result;
            break;
        }
    }
}

function get_extension($file)
{
    $str = substr($file, -4);
    if ($str == ".png") {
        $img = "assets/img/png.png";
    } elseif ($str == ".jpg") {
        $img = "assets/img/jpg.png";
    } elseif ($str == ".php") {
        $img = "assets/img/php.png";
    } elseif ($str == ".css") {
        $img = "assets/img/css.png";
    } elseif (substr($file, -5) == ".html") {
        $img = "assets/img/html.png";
    } elseif (substr($file, -3) == ".js") {
        $img = "assets/img/javascript.png";
    } elseif (substr($file, -4) == ".pdf") {
        $img = "assets/img/pdf-file.png";
    } elseif (substr($file, -4) == ".svg") {
        $img = "assets/img/svg.png";
    } elseif (substr($file, -4) == ".sql") {
        $img = "assets/img/sql.png";
    } elseif (substr($file, -4) == ".jsx") {
        $img = "assets/img/jsx.png";
    } elseif (substr($file, -4) == ".txt") {
        $img = "assets/img/txt.png";
    } elseif (substr($file, -5) == ".json") {
        $img = "assets/img/json.png";
    } else {
        $img = "assets/img/setting.png";
    }
    return $img;
}

function my_scan($dir, &$results = array())
{
    $files = scandir($dir);
    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path) && !in_array($files, array(".", ".."))) {
            $results[] = $dir . DIRECTORY_SEPARATOR . $value;
        } else if ($value != "." && $value != ".." && substr($value, 0, 1) != ".") {
            my_scan($path, $results[$dir . DIRECTORY_SEPARATOR . $value]);
        }
    }
    return $results;
}

my_scan($_SERVER["DOCUMENT_ROOT"]);
$fin = [];
$current_dir = basename(realpath($_SERVER["DOCUMENT_ROOT"]));
$fin[$current_dir] = my_scan($_SERVER["DOCUMENT_ROOT"]);

function my_tree($return)
{
    foreach ($return as $key => $value) {
        $level = 2.5;
        $folder = substr($key, 0, 1);
        if (is_array($value)) {
            if ($folder === "/" || substr($key, 0, 3) === "../") {
                echo '<div class="close" style="margin-left: ' . $level . 'vh"><span id="folder"><span> <img id="rotate" src="assets/img/ui/tree-indicator.svg" style="cursor: pointer;"></span><img src="assets/img/folder.png" style="cursor: pointer;"><span class="folder" id="' . $key . '" style="color: blue; cursor: pointer;">' . basename($key) . '</span></span>';
                echo '<div class="folder_content">';
            }
            my_tree($value);
            echo '</div>';
            echo '</div>';
        }
        if (is_array($value) === false) {
            $img = get_extension($value);
            $size = FileSizeConvert(filesize($value));
            $date = date("d/m/Y H:i:s", filemtime($value));
            echo '<div class="files" style="margin-left: ' . $level . 'vh">
            <img src="' . $img . '" style="cursor: pointer;">
            <span class="files" id="' . $value . '" style="color: blue; cursor: pointer;">
            ' . basename($value) . '</span>&nbsp;<span id="date">' . $date . '</span>&nbsp;<span id="size">' . $size . '</span>
            </div>';
        }
    }
}

// $_GET["path"]

function folder_content($folder_scan)
{
    foreach ($folder_scan as $key => $value) {
        $folder = substr($key, 0, 1);
        if (is_array($value)) {
            if ($folder === "/" || substr($key, 0, 3) === "../") {
                echo '<div class="close"><span id="folder"><img src="assets/img/folder.png" style="cursor: pointer;"><span style="color: blue; cursor: pointer;">' . basename($key) . '</span></span>';
                echo '<div class="folder_content">';
            }
            folder_content($value);
            echo '</div>';
            echo '</div>';
        }
        if (is_array($value) === false) {
            $img = get_extension($value);
            $size = FileSizeConvert(filesize($value));
            $date = date("d/m/Y H:i:s", filemtime($value));
            echo '<div class="files">
            <img src="' . $img . '" style="cursor: pointer;">
            <span class="files" id="' . $value . '" style="color: blue; cursor: pointer;">
            ' . basename($value) . '</span>&nbsp;<span id="date">' . $date . '</span>&nbsp;<span id="size">' . $size . '</span>
            </div>';
        }
    }
}
// $folder_scan = $_GET["folder"];