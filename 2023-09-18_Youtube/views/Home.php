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
                <h5 class="mt-2 mb-0"><b><?= $video['video_title'] ?></b></h5>
                <h6 class="mb-1"><?= $video['author'] ?></h6>
                <p class="text-secondary views">Views: <?= $video['views'] ?></p>
            </a>
        </div>
    <?php endforeach; ?>
</div>