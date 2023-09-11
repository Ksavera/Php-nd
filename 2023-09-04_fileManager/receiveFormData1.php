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
