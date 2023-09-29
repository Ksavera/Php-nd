 <?php $hasMoreRecords = $currentPage < $totalPages;
    // $noRecords = $currentPage = 1;
    ?>

 <div class="d-flex mb-4 justify-content-center gap-3">
     <a href="./"><button class="btn btn-light">All</button></a>
     <?php foreach ($categories as $category) : ?>
         <a href="?category=<?= $category['id'] ?>"><button class="btn btn-light"><?= $category['name'] ?></button></a>
     <?php endforeach; ?>
 </div>
 <div class="row">

     <?php
        if (isset($videos)) {
            foreach ($videos as $video) : ?>
             <div class="col-4">
                 <a href="?page=videoPlayer&videoId=<?= $video['id'] ?>" class="link-dark link-underline link-underline-opacity-0">
                     <img class="w-100 rounded-3" src="<?= $video['thumbnail'] ?>" alt="">
                     <h5 class="mt-2 mb-0"><b><?= $video['video_title'] ?></b></h5>
                     <h6 class="mb-1"><?= $video['author'] ?></h6>
                     <p class="text-secondary views">Views: <?= $video['views'] ?></p>
                 </a>
             </div>
     <?php endforeach;
        } else {
            echo
            '<div class="alert alert-danger text-center">there is no video with this name or title.</div>';
        } ?>

     <div class="d-flex justify-content-center gap-2">
         <?php if ($categoryID === '' &&  !$search) : ?>

             <a href="<?= $currentPage != 1 ? "?pg=$backPage" : '' ?>"><button class="btn btn-primary" <?= $currentPage === 1 ? "disabled" : "" ?>>Back</button></a>
         <?php elseif ($search) : ?>
             <a href="<?= $currentPage != 1 ? "?pg=$backPage&search=$search" : '' ?>"><button class="btn btn-primary" <?= $currentPage === 1 ? "disabled" : "" ?>>Back</button></a>
         <?php else : ?>
             <a href="<?= $currentPage != 1 ? "?pg=$backPage&category=$categoryID" : '' ?>"><button class="btn btn-primary" <?= $currentPage === 1 ? "disabled" : "" ?>>Back</button></a>
         <?php endif; ?>

         <?php if ($categoryID === '' &&  !$search) : ?>
             <a href="?pg= <?= $currentPage ?>"><button class="btn btn-primary"><?= $currentPage . '/' . $totalPages ?></button></a>
         <?php elseif ($search) : ?>
             <a href="?pg=<?= $currentPage ?>&search= <?= $search ?>"><button class="btn btn-primary"><?= $currentPage . '/' . $totalPages ?></button></a>
         <?php else : ?>
             <a href="?pg=<?= $currentPage ?>&category= <?= $categoryID ?>"><button class="btn btn-primary"><?= $currentPage . '/' . $totalPages ?></button></a>
         <?php endif; ?>

         <?php if ($categoryID === '' &&  !$search) : ?>
             <a href="<?= $hasMoreRecords ? "?pg=$nextPage" : '' ?>"><button class="btn btn-primary" <?= $currentPage == $totalPages ? "disabled" : "active" ?>>Next</button></a>
         <?php elseif ($search) : ?>
             <a href="<?= $hasMoreRecords ? "?pg=$nextPage&search=$search" : '' ?>"><button class="btn btn-primary" <?= $currentPage == $totalPages ? "disabled" : "active" ?>>Next</button></a>
         <?php else : ?>
             <a href="<?= $hasMoreRecords ? "?pg=$nextPage&category=$categoryID" : '' ?>"><button class="btn btn-primary" <?= $currentPage == $totalPages ? "disabled" : "active" ?>>Next</button></a>
         <?php endif; ?>

     </div>
 </div>