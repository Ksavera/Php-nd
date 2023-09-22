<div class="d-flex mb-4 justify-content-center gap-3">
    <?php foreach ($categories as $category) : ?>
        <a href="?page=home&category=<?= $category['id'] ?>"><button class="btn btn-light"><?= $category['name'] ?></button></a>
    <?php endforeach; ?>
</div>
<div class="row">
    <?php foreach ($videos as $video) : ?>
        <div class="col-4">
            <a href="?page=videoPlayer&videoId=<?= $video['id'] ?>" class="link-dark link-underline link-underline-opacity-0">
                <img class="w-100 rounded-3" src="<?= $video['thumbnail'] ?>" alt="">
                <h5><?= $video['video title'] ?></h5>
                <p><?= $video['author'] ?></p>
            </a>
        </div>
    <?php endforeach; ?>
</div>