<?php

print_r($_FILES);
// $uploadFileName = $_FILES['name'];


if ($_FILES['uploadFile']['size'] > 250000000) {
    echo 'failo dydis per didelis';
} else {
    if (
        $_FILES['uploadFile']['type'] !== 'image/png' &&
        $_FILES['uploadFile']['type'] !== 'image/jpeg' &&
        $_FILES['uploadFile']['type'] !== 'image/gif'
    ) {
        echo 'Netinkamas failo formatas';
    } else {
        $uploadFileName = $_FILES['uploadFile']['name'];
        move_uploaded_file($_FILES['uploadFile']['tmp_name'], './uploads/' . $uploadFileName);
        echo 'failas sekmingai ikeltas';
        header('Location: ./');
    }
}
?>


// $path = isset($_GET['path']) ? $_GET['path'] : '.';
// $upload = isset($_FILES['uploadFile']) ? $_FILES['uploadFile'] : null;
// if ($upload && $upload['size'] > 25000000) {
// echo 'Failo dydis per didelis';
// } else {
// if (
// $upload &&
// $upload['type'] !== 'image/png' &&
// $upload['type'] !== 'image/jpeg' &&
// $upload['type'] !== 'image/gif'
// ) {
// echo 'Netinkamas failo formatas';
// } else {
// if ($upload) {
// move_uploaded_file($upload['tmp_name'], './uploads/' . $upload['name']);
// echo 'Failas sekmingai ikeltas';
// }

// header("Location: ?path=$path");
// }
// }