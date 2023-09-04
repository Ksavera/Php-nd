<?php 
echo '<pre>';
$directories = scandir('.');



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
      <?php foreach($directories as $directory){
        // pathinfo($directory);
        $size = filesize($directory);
        $isFolderOrSize = is_dir($directory)? "Folder" : "$size bytes";
        if($directory !== "." AND $directory !== "..")
        echo " <tr>
        <td><input type='checkbox' class='form-check-input'></td>
        <td><a href='http://localhost/php_nd/2023-09-04_fileManager/$directory'>$directory</a></td>
        <td>$isFolderOrSize</td>
      </tr>";
      } 
      ?>
     
    </tbody>
  </table>
  </div>
 
</body>
</html>