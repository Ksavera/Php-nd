<?php
$path = isset($_GET['path']) ? $_GET['path'] : '.';

$fileType = isset($_POST['itemType']) ? $_POST['itemType'] : null;
$fileName = isset($_POST['inputName']) ? $_POST['inputName'] : null;
$pathPart = pathinfo($fileName);

$filePath = $path . '/' . $fileName;

if ($fileType === "file" && $fileName) {
    if (array_key_exists('extension', $pathPart)) {
        if ($pathPart['extension'] === '') {
            echo '<p class="center-text">Must enter an extension to create a file.</p>';
        } else {
            $myfile = fopen($filePath, "w") or die("Unable to open file!");
            fclose($myfile);
            header('Location: index.php?path=' . $path);
        }
    } else {
        echo 'Invalid file name format. Make sure to include an extension.';
    }
} elseif ($fileType === 'folder' && $fileName) {
    if (strpos($fileName, '.') !== false) {
        echo '<p class="center-text">Must enter folder name without extension.</p>';
    } else {
        mkdir($filePath);
        header('Location: index.php?path=' . $path);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>new Item</title>
    <style>
        body {

            margin: 25vh;
        }

        .container {
            width: 500px;
            border-radius: 10px;
        }
        .center-text {
            text-align: center !important;
            color: red;
}
    </style>
</head>

<body class="bg-light">
    <div class="container bg-white py-3">
        <h5 class=""><i class="newItem bi bi-plus-square mx-1"></i>Create new Item</h5>
        <hr>
        <p>Item type:</p>
        <form method="POST">
            <div class="d-flex gap-4">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="itemType" value="file" <label class="form-check-label">
                    File
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="itemType" value="folder">
                    <label class="form-check-label">
                        Folder
                    </label>
                </div>
            </div>
            <div class="form-check p-0 my-3">
                <label>Item name</label>
                <input type="text" name="inputName" class="form-control" placeholder="Enter here...">
            </div>
            <hr>
            <div class="d-flex justify-content-end gap-2">
                <button class="btn btn-outline-primary">Create</button>
            </div>
        </form>


    </div>
</body>

</html>