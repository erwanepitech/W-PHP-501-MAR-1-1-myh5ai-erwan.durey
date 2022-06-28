<!DOCTYPE html>
<html lang="en">
<?php
require_once("script.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style/monokai-sublime.min.css"> -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/styles/monokai-sublime.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/monokai-sublime.min.css">
    <script src="script/js/jquery-3.6.0.js"></script>
    <script src="script/js/highlight.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="toolbar">
        <div class="d-flex">
            <!-- <input class="form-control mr-sm-2" type="text" placeholder="indiquer le path" id="path">
            <button type="button" id="search" class="btn btn-outline-success my-2 my-sm-0">scan</button> -->
        </div>
    </div>
    <div class="main">

        <!-- <div class="tree-content">
            <div class="close">
                <div id="folder-content">
                    
                </div>
            </div>
        </div> -->

            <div class="tree">
                <div class="close">
                    <?php
                    echo '<span id="folder" class="main_folder"><span><img id="rotate" src="assets/img/ui/tree-indicator.svg" style="cursor: pointer;"></span><img src="assets/img/folder.png" style="cursor: pointer;"><span id="current_folder" style="color: blue; cursor: pointer;">' . $current_dir . '</span></span>';
                    echo '<div class="folder_content">';
                    my_tree($fin);
                    echo '</div>';
                    ?>
                </div>
            </div>




        </div>
        <div id="modal_files" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <button type="button" id="close" class="btn-close" data-bs-dimiss="modal" aria-label="close">
                    </button>
                    <div class="modal-header">
                        <h4 id="file_name"></h4>
                    </div>
                    <pre id="content"></pre>
                    <div class="modal-footer info">
                        <span id="file_date"></span>
                        <span id="file_size"></span>
                    </div>
                    <div class="modal-footer info">
                        <span id="file_path"></span>
                    </div>
                    <div class="modal-footer">
                        <span id="file_size"></span>
                        <button id="close" type="button" class="btn btn-primary">fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="script/js/app.js"></script>
        <script charset="utf-8" src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.0/highlight.min.js"></script>
        <script>
            hljs.highlightAll();
        </script>
</body>

</html>