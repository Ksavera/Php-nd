<?php
if(is_dir('./directories')) {
  echo '<p style="color: red">Directories is a directory</p>';
} else {
  echo "wrong path or something";
}


echo '<pre>';
$directories = scandir('./directories');
unset($directories[0]);
unset($directories[1]);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>file system manager</title>
  </head>
  <body>
  
    <table class="table">
      <thead>
        <tr>
          <th>\/</th>
          <th>Name</th>
          <th>Size</th>
          <th>Modified</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach($directories as $directory) 
          {
            echo "
            <tr>
              <td>\/</td>
              <td>$directory</td>
            </tr>";
          }
        ?>
      </tbody>
    </table>
  </body>
</html>