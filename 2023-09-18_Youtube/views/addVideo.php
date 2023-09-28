<?php
$message = false;
$user = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The form has been submitted
    if (
        !empty($_POST['author']) &&
        !empty($_POST['video_title']) &&
        !empty($_POST['url']) &&
        !empty($_POST['thumbnail_url']) &&
        !empty($_POST['video_info']) &&
        !empty($_POST['category'])
    ) {
        $video_info = $db->real_escape_string($_POST['video_info']);
        //query grazina treu or false
        $result = $db->query(
            sprintf(
                "INSERT INTO videos (author, video_title, url, thumbnail, video_info, category_id, user_id) VALUES ('%s','%s', '%s','%s','%s','%d','%d')",
                $_POST['author'],
                $_POST['video_title'],
                $_POST['url'],
                $_POST['thumbnail_url'],
                $description,
                $_POST['category'],
                $user,


            )
        );

        if ($result) {
            header('Location: ./');
            echo "uploaded";
            exit;
        } else {
            echo "wrong data";
        }
    } else {
        echo "fill all fields";
    }
}
?>


<main class="form-signin w-100 m-auto">
    <form method="POST">

        <h1 class="h3 mb-3 fw-normal text-center">Upload Video</h1>
        <div class="form-floating">
            <input type="text" class="form-control" name="author" placeholder="Author">
            <label for="floatingInput">Author</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="video_title" placeholder="Video title">
            <label for="floatingInput">Video title</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="url" placeholder="url">
            <label for="floatingPassword">Url</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="thumbnail_url" placeholder="thumbnail_url">
            <label for="floatingPassword">thumbnail url</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" name="video_info" placeholder="video_info">
            <label for="floatingPassword">Video info</label>
        </div>
        <select name="category" class="form-select" aria-label="Default select example">

            <option selected disabled>Choose category</option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <button class="btn btn-primary w-100 py-2" type="submit">Upload</button>
    </form>
</main>
<style>
    html,
    body {
        height: 100%;
    }

    .form-signin {
        max-width: 330px;
        padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>