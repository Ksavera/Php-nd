<?php
//prisijungimas prie duomenu bazes. Daromas viena karta kode.
// mysqli('1', 2, 3)
// 1 - adresas kur egzistuoja serveris. ip adresas, domenas, localhost jei lokaliai.
// 2 - username ('root')
// 3 - passwordas tuscias
// 4 - database. duomenu bazes pavadinimas.
// grazinamas std klases objektas.
try {
    $db = new mysqli('localhost', 'root', '', 'youtube');
    // echo 'prisijungimas pavyko' . '<br>';
} catch (Exception $klaida) {
    print_r($klaida); // paziuret kas negerai, jei negerai.
    // echo 'nepavyko prisijungti';
    exit;
}


$categoryID = isset($_GET['category']) ? $_GET['category'] : false;
$page = isset($_GET['page']) ? $_GET['page'] :  false;
$videoId = isset($_GET['videoId']) ? $_GET['videoId'] : false;
$search = isset($_POST['search']) ? $_POST['search'] : false;



if ($search) {
    $result = $db->query("SELECT * FROM videos WHERE author LIKE '%$search%' OR video_title LIKE '%$search%' ");
} elseif ($page === 'videoPlayer' && $videoId) {
    $result = $db->query("SELECT * FROM videos WHERE id=$videoId");
} elseif ($categoryID) {
    $result = $db->query("SELECT * FROM videos WHERE category_id=$categoryID");
} else {
    $result = $db->query("SELECT * FROM videos");
}



if ($result->num_rows > 0) {
    $videos = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "there is no video with this name or title.";
}

if ($videoId) {
    $db->query("UPDATE videos SET views = views + 1 WHERE id = $videoId");
}


$resultOfCategories = $db->query("SELECT * FROM categories ");
if ($resultOfCategories->num_rows > 0) {
    $categories = $resultOfCategories->fetch_all(MYSQLI_ASSOC);
} else {
    echo 'error';
}
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
        $page = isset($_GET['page']) ? $_GET['page'] : false;
        switch ($page) {
            case 'videoPlayer':
                include './views/videoPlayer.php';
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