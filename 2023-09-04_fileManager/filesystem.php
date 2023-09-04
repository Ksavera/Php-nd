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

// Define the root directory (initial directory)
$initial_directory = './directories'; // Change this to the actual root directory

// Extract the directory path from the URL parameter (if provided)
if (isset($_GET['directory'])) {
    $directory_param = $_GET['directory'];
    
    // Sanitize the directory_param to prevent directory traversal attacks
    $directory_param = preg_replace('/\.\.\//', '', $directory_param);
    
    // Define the current directory based on the parameter
    $current_directory = $initial_directory . '/' . $directory_param;
} else {
    // If no directory parameter is provided, use the initial directory
    $current_directory = $initial_directory;
}

// Check if the current directory exists and is a directory
if (is_dir($current_directory)) {
    // Directory exists, proceed with listing its contents
    echo '<p style="color: red">Current Directory is a directory</p>';
    echo '<pre>';
    $directories = scandir($current_directory);
    unset($directories[0]);
    unset($directories[1]);
} else {
    // Directory does not exist or is not a directory
    echo "Wrong path or something";
    // You can handle the error here as needed
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- ... (head section remains the same) ... -->
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
      if (isset($_GET['directory']) && realpath($current_directory) != realpath($initial_directory)): ?>
        <tr>
          <td colspan="5" class="name"><a href="?directory=<?= urlencode($_GET['directory']) . '/..' ?>">...</a></td>
        </tr>
      <?php endif; ?>
      
      <?php foreach($directories as $directory): ?>
        <tr>
          <td>\/</td>
          <td><a href="?directory=<?= urlencode($directory) ?>"><?php echo $directory ?></a></td>
        </tr>
      <?php endforeach; ?>
        
      </tbody>
    </table>
  </body>
</html>
