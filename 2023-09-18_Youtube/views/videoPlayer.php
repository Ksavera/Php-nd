<?php

foreach ($videos as $video) : ?>
    <div class="mt-2 w-100">
        <iframe class="rounded-3" width="100%" height="725" frameborder="0" src="<?= $video['url'] ?>"></iframe>
        <div class="bg-light rounded-3 p-3 w-100">
            <h5 class="m-0"><?= $video['author'] . "  -  " . $video['video_title'] ?></h5>
            <p class="text-secondary mb-3 views">Views: <?= $video['views'] ?></p>
            <p class="m-0"><?= href(nl2br($video['video_info'])) ?></p>


        </div>

    </div>


<?php endforeach; ?>



<!-- nl2br(string $string, bool $use_xhtml = true): string -->