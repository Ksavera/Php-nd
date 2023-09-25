<?php

foreach ($videos as $video) : ?>
    <div class="mt-2 w-100">
        <iframe class="rounded-3" width="100%" height="725" frameborder="0" src="<?= $video['url'] ?>"></iframe>
        <div class="bg-light rounded-3 p-3 w-100">
            <h5><?= $video['author'] . "  -  " . $video['video_title'] ?></h5>
            <p class="m-0"><?= nl2br($video['video_info']) ?></p>
            <p class="text-dark m-0">Views: <?= $video['views'] ?></p>
        </div>

    </div>


<?php endforeach; ?>



<!-- nl2br(string $string, bool $use_xhtml = true): string -->