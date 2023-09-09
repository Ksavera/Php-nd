<?php
// // print_r($_GET); //request query
// print_r($_POST); // POST body duomenys
// // print_r($_REQUEST); // bendrai sugrupuoti QUERY ir POST BODY duomenys
// // print_r($_SERVER); // visa su uzklausa ussijusi info
// print_r($_FILES); // Persiunciamu failu info

if ($_FILES['failas']['size'] > 40000) {
    echo 'Failo dydis per didelis';
} else {
    if (
        $_FILES['failas']['type'] !== 'image/png' and
        $_FILES['failas']['type'] !== 'image/jpeg' and
        $_FILES['failas']['type'] !== 'image/gif'
    ) {
        echo 'netinkamas failo formatas';
    } else {
        move_uploaded_file($_FILES['failas']['tmp_name'], './directories/uploads/' . $_FILES['failas']['name']);
        echo 'failas sekmingai ikeltas';
    }
}
