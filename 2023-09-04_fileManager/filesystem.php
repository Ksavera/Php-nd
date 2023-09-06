<?php 

$path = isset($_GET['path']) ? $_GET['path'] : ('.');
$files = scandir($path);
unset($files[0]);
if($path === ".") unset($files[1]);



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
  <div class="container mt-5">

     <table class="table">
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
      <?php foreach($files as $file){
        
// ikonos prie failu
        $kintamasis = pathinfo($file);
        if(array_key_exists('extension', $kintamasis)) {
          if($kintamasis['extension'] === "php") {
            $ikonos_klase = "bi bi-filetype-php";
          } else if($kintamasis['extension'] === "md") {
            $ikonos_klase = "bi bi-filetype-md";
          }else if($kintamasis['extension'] === "txt") {
            $ikonos_klase = "bi bi-filetype-txt";
          }else if($kintamasis['extension'] === "html") {
            $ikonos_klase = "bi bi-filetype-html";
          } else {
            $ikonos_klase = "";
          }
        } else {
          $ikonos_klase = "bi bi-folder2";
        }

// rodo size arba folder
        $realfile = "$path/$file";
        $size = filesize($realfile);
        $isFolderOrSize = is_file($realfile)? "$size b" : "folder";

//grizineja atgal ir pirmyn per viena direktorija
        if ($file === ".." && $path !== ".") {
          $link = "<a href='?path=" . dirname($path) . "'><i class='bi bi-arrow-left-circle-fill'>$file</i></a>";
      } else {
          $link = "<a href='?path=" . "$path/$file" . "'>$file</a>";
      }

// nerodo directorijos . ir filesystem.php 
        if($file !== "." AND $file !== "filesystem.php") {
          echo " <tr>
        <td><input type='checkbox' class='form-check-input'></td>
        <td>
        <i class='$ikonos_klase'></i>
        <a href='?path=$realfile'>$link</a></td>
        <td>$isFolderOrSize</td>
        <td></td>
        <td></td>
      </tr>";
      } 
    }
    ?>
     
    </tbody>
  </table>
  </div>
 
</body>
</html>