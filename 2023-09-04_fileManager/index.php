<?php
$path = isset($_GET['path']) ? $_GET['path'] : '.';
$files = scandir($path);
unset($files[0]);
if ($path === ".") unset($files[1]);



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
          <li><i class="newItem bi bi-plus-square"></i>New Item</li>
          <li><i class="settings bi bi-gear"></i>Settings</li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="container">
    <table class="table mt-5">
      <thead>
        <tr>
          <th><input type="checkbox" class="form-check-input"></th>
          <th>Name</th>
          <th>Size</th>
          <th>Modified</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        <?php

        foreach ($files as $file) {
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
          //------------------------delete-------------------------------------------------------------------
          $deleteMode = isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['file']) && $_GET['file'] === $file;
          if ($deleteMode) {
            $deleteitem = $path . '/' . $file; // Use $file directly
            //negalima trinti index.php failo
            if ($file !== "index.php" && $file !== "receiveFormData1.php"  && $file !== "uploadForm.php") {
              if (is_dir($deleteitem)) {
                rmdir($deleteitem);
              } else {
                unlink($deleteitem);
              }
            }
            header("Location: ?path=$path");
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
          if ($file !== "." and $file !== "index.php") {
            echo " <tr>
        <td><input type='checkbox' class='form-check-input'></td>
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

        ?>
      </tbody>
    </table>
  </div>
</body>

</html>