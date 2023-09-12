<?php
ob_start(); // Start output buffering
$path = isset($_GET['path']) ? $_GET['path'] : '.';
if (!is_dir($path)) {
    die('Invalid directory path: ' . $path);
}
$files = scandir($path);
unset($files[0]);
if ($path === ".") unset($files[1]);

 //------------------------delete-------------------------------------------------------------------
function removeRecursively($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir . "/" . $object)) {
                    removeRecursively($dir . "/" . $object);
                } else {
                    unlink($dir . "/" . $object);
                }
            }
        }
        rmdir($dir);
    }
}
$disallowedFiles = ["index.php", "receiveFormData1.php", "uploadForm.php"];
$deleteMode = isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['file']);
if ($deleteMode) {
    $fileToDelete = $_GET['file']; // Get the file to be deleted

    // Disallowed files
    

    if (!in_array($fileToDelete, $disallowedFiles)) {
        $deleteitem = $path . '/' . $fileToDelete; // Use the correct file name

        if (is_dir($deleteitem)) {
            // Remove the folder and its contents
            removeRecursively($deleteitem);
        } else {
            // Remove a file
            unlink($deleteitem);
        }
        header("Location: ?path=$path");
    }
}
//--------------delete selected --------------------------------
if (isset($_POST['deleteSelected'])) {
    if (isset($_POST['selectedFiles'])) {
        foreach ($_POST['selectedFiles'] as $fileToDelete) {
            if (!in_array($fileToDelete, $disallowedFiles)) {
                $deleteitem = $path . '/' . $fileToDelete;
                if (is_dir($deleteitem)) {
                    // Remove the folder and its contents
                    removeRecursively($deleteitem);
                } else {
                    // Remove a file
                    unlink($deleteitem);
                }
            }
        }
        // After deleting selected files, redirect back to the same page
        header("Location: ?path=$path");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Document</title>
    <style>
        .bi {
            margin-right: 5px;
        }

        .upload:hover {
            cursor: pointer;
            color: black;
        }
    </style>
</head>

<body class="bg-secondary-subtle">
    <header class=" border pt-2 bg-light shadow-sm bg-body">
        <div class="container d-flex justify-content-between">
            <div class="d-flex">
                <h5>H3K Demo</h5>
                <i class="bi bi-house-fill px-2 text-primary"></i>
            </div>
            <nav>
                <ul class="d-flex gap-5 list-unstyled text-muted">
                    <li class="upload">
                        <a href="uploadForm.php" class="link-secondary link-underline link-underline-opacity-0">
                            <i class=" bi bi-cloud-arrow-up"></i>
                            <span>Upload</span>
                        </a>
                    </li>
                    <li class="newItem">
                    <a href="newItem.php?path=<?php echo $path; ?>" class="link-secondary link-underline link-underline-opacity-0">
                         <i class="bi bi-plus-square"></i>  
                            <span>New Item</span>
                        </a>
                        </li> 
                    <li><i class="settings bi bi-gear"></i>Settings</li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
    <form method="POST">
        <table class="table mt-5">
            <thead>
                <tr>
                    <th><input type="checkbox" onclick="selectAll(event)" class="form-check-input"></th>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Modified</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php

                foreach ($files as $file) {
                    $fileToDelete = isset($_POST['selectedFiles']) ? $_POST['selectedFiles'] : [];
                    //--------------------------edit------------------------------------------------------------------

                    $editMode = isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['file']) && $_GET['file'] === $file;
                    if ($editMode) {
                        $editFile = pathinfo($_GET['file']);
                        $editFileName = $editFile['basename'];

                        $form = "<form method='POST'>
                        <div class='input-group'>
                            <input type='text' name='newName' value='$editFileName' class='form-control'>
                            <button class='btn btn-primary'>Submit</button>
                        </div>
                    </form>";
                    } else {
                        $form = "";
                    }

                    if ($editMode && isset($_POST['newName'])) {
                        rename("$path/$file", "$path/" . $_POST['newName']);
                        $editedFileDirectory = dirname("$path/$file");
                        header("Location: ?path=$editedFileDirectory");
                        exit; // Add exit to stop further execution
                    }
                   

                    //------------------------ikonos prie failu---------------------------------------------------------
                    $kintamasis = pathinfo($file);
                    if (array_key_exists('extension', $kintamasis)) {
                        if ($kintamasis['extension'] === "php") {
                            $icon_class = "bi bi-filetype-php";
                        } else if ($kintamasis['extension'] === "md") {
                            $icon_class = "bi bi-filetype-md";
                        } else if ($kintamasis['extension'] === "txt") {
                            $icon_class = "bi bi-filetype-txt";
                        } else if ($kintamasis['extension'] === "html") {
                            $icon_class = "bi bi-filetype-html";
                        } else if ($kintamasis['extension'] === "jpg") {
                            $icon_class = "bi bi-image";
                        } else if ($kintamasis['extension'] === "png") {
                            $icon_class = "bi bi-image";
                        } else if ($kintamasis['extension'] === "git") {
                            $icon_class = 'bi bi-github';
                        } else if ($kintamasis['extension'] === "php") {
                            $icon_class = 'bi bi-filetype-php';
                        } else if ($kintamasis['extension'] === "pdf") {
                            $icon_class = 'bi bi-file-earmark-pdf-fill';
                        } else if ($kintamasis['extension'] === "gif") {
                            $icon_class = 'bi bi-filetype-gif';
                        } else if ($kintamasis['extension'] === "mp3") {
                            $icon_class = 'bi bi-file-earmark-music';
                        } else if ($kintamasis['extension'] === "mp4") {
                            $icon_class = 'bi bi-play-circle';
                        } else {
                            $icon_class = "";
                        }
                    } else {
                        $icon_class = "bi bi-folder2";
                    }

                    // rodo size arba folder
                    $realfile = "$path/$file";
                    $size = filesize($realfile);
                    if ($size >= 1048576) {
                        $size = round($size / 1024) . " mb";
                    } else if ($size >= 1024) {
                        $size = round($size / 1024) . " kb";
                    } else {
                        $size = $size . " b";
                    }

                    // Size or Folder
                    $FolderOrEmpty = ($file === "..") ? "" : "Folder";
                    $isFolderOrSize = is_file($realfile) ? $size : $FolderOrEmpty;
                    // Modifikuoto failo data
                    $laikas = ($file !== "..") ? date("d/m/Y h:i A", filemtime($realfile)) : "";
                    //icons
                    $delete_icon = ($file === ".."  && !$deleteMode || $file === "uploadForm.php" || $file === "receiveFormData1.php") ? "" : "bi bi-trash";
                    $edit_icon = ($file === ".." && !$editMode || $file === "uploadForm.php" || $file === "receiveFormData1.php") ? "" : "bi bi-pencil-square";
                    // $upload_icon = ($file === "..") ? "" : "bi bi-upload";

                    //grizineja atgal ir pirmyn per viena direktorija
                    if ($file === ".." && $path !== ".") {
                        $link = "<a href='?path=" . dirname($path) . "'><i class='bi bi-arrow-left-circle-fill'></i></a>";
                    } else {
                        $link = "<a href='?path=" . "$path/$file" . "'>$file</a>";
                    }

                    // nerodo directorijos . ir index.php 
                    if ($file !== "." && $file !== "index.php" && $file !== "newItem.php" && $file !== "receiveFormData1.php" && $file !== "uploadForm.php") {
                        echo " <tr>
        <td><input type='checkbox' class='form-check-input' name='selectedFiles[]' value='$file'></td>
        <td>
        <i class='$icon_class'></i>$link $form</td>
        <td>$isFolderOrSize</td>
        <td>$laikas</td>
        <td>
          <a href='?action=edit&path=$path&file=$file'><i class='$edit_icon'></i>$editMode</a>
          <a href='?action=delete&path=$path&file=$file'><i class='$delete_icon'>$deleteMode</i></a>
        </td>
      </tr>";
                    }
                }
                ob_end_flush(); // Flush the output buffer
                ?>
            </tbody>
        </table>
        <div class="mt-3">
                <button type="submit" name="deleteSelected" class="btn btn-danger">Delete Selected</button>
            </div>
        </form>
    </div>
  <script>
      function selectAll(e) {
        const checkAll = document.querySelectorAll('input[type="checkbox"]');
        checkAll.forEach((el) => {
            el.checked = !el.checked;
        });
    }
</script>  
</body>


</html>