<?php

foreach ($videos as $video) : ?>
    <div class="w-50 mx-auto">
        <iframe class="rounded-3" width="700px" height="450px" frameborder="0" src="<?= $video['url'] ?>"></iframe>
    </div>

<?php endforeach; ?>



<!-- nl2br(string $string, bool $use_xhtml = true): string -->