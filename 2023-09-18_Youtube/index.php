<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();


try {
    $db = new mysqli('localhost', 'root', '', 'youtube');
} catch (Exception $klaida) {
    print_r($klaida);
    exit;
}


$categoryID = isset($_GET['category']) ? $_GET['category'] : false;
$page = isset($_GET['page']) ? $_GET['page'] :  false;
$videoId = isset($_GET['videoId']) ? $_GET['videoId'] : false;
$search = isset($_GET['search']) ? $_GET['search'] : false;


$limit = 5;
$currentPage = isset($_GET['pg']) ? intval($_GET['pg']) : 1;
$offset = ($currentPage - 1) * $limit;
$backPage = ($currentPage - 1);
$nextPage = ($currentPage + 1);





if ($search) {
    $result = $db->query("SELECT * FROM videos WHERE author LIKE '%$search%' OR video_title LIKE '%$search%' ORDER BY views DESC LIMIT $offset, $limit");
} elseif ($page === 'videoPlayer' && $videoId) {
    $result = $db->query("SELECT * FROM videos WHERE id=$videoId ORDER BY views DESC");
} elseif ($categoryID) {
    $result = $db->query("SELECT * FROM videos WHERE category_id=$categoryID ORDER BY views DESC LIMIT $offset, $limit");
} else {
    $result = $db->query("SELECT * FROM videos ORDER BY views DESC LIMIT $offset, $limit");
}


if ($result->num_rows > 0) {
    $videos = $result->fetch_all(MYSQLI_ASSOC);
}


if ($search) {
    $count = $db->query("SELECT COUNT(id) FROM videos WHERE author LIKE '%$search%' OR video_title LIKE '%$search%'")->fetch_array();
} elseif ($categoryID) {
    $count = $db->query("SELECT COUNT(id) FROM videos WHERE category_id=$categoryID")->fetch_array();
} else {
    $count = $db->query("SELECT COUNT(id) FROM videos")->fetch_array();
}


// print_r($count[0]);
$totalVideos = $count[0];
$totalPages = ceil($totalVideos / $limit);


// view count
if ($videoId) {
    $db->query("UPDATE videos SET views = views + 1 WHERE id = $videoId");
}


$resultOfCategories = $db->query("SELECT * FROM categories ");
if ($resultOfCategories->num_rows > 0) {
    $categories = $resultOfCategories->fetch_all(MYSQLI_ASSOC);
} else {
    echo 'error';
}

//clickable links:
function href($string)
{
    return preg_replace('/((http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?)/', '<a href="\1" target="_blank">\1</a>', $string);
}

// $db->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Videos</title>
</head>

<body>

    <div class="container">
        <?php include './views/header.php' ?>

        <?php

        switch ($page) {
            case 'login':
                include './views/login.php';
                break;
            case 'register':
                include './views/register.php';
                break;
            case 'videoPlayer':
                include './views/videoPlayer.php';
                break;
            case 'addVideo':
                include './views/addVideo.php';
                break;
            case 'logout':
                session_destroy();
                header('Location: ./');
                break;
            default:
                include './views/Home.php';
                break;
        }

        ?>
        <?php include './views/footer.php' ?>

    </div>
</body>

</html>