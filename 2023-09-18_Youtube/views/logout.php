<?php

session_destroy();
// echo 'You have been logged out. <a href="./">Go back</a>';
echo '<div class="alert alert-warning" role="alert">
  Congratulations, You are logged in. <a href="./" class="link-underline link-underline-opacity-0 text-dark">Go back<i class="bi bi-house-fill mx-2"></i></a>
</div>';
