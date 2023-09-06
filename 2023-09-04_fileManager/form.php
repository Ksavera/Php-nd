<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    //Forma pagal nutylejima duomenis siuncia GET metodu.
    <form action="">

    </form>
    // galim aviduj php rasyt. jei kitam  faile php, o cia lieka tik html.
    // form action="receiveFormData.php"
    //receiveFormData.php sulinkina html su php failu.
    php faile:
    print_r($_GET)
    kai siunciam method="POST" in form, $_GET nebetinka php. reikia naudot print_r($_POST)
    prie form action galima ir http. action"receiveFormData.php?dir=./testas"
</html>