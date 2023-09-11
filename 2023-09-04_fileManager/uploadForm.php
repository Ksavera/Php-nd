
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>form</title>
</head>

<body>
    <div class="container mt-5">
        <form action="receiveFormData1.php" method="POST" enctype="multipart/form-data">
            <h6 for="formFile" class="form-label">Upload files: </h6>
            <label for="">Max file size</label>
            <div class="input-group">

                <input class="form-control" type="file" name=uploadFile>
                <button class="btn btn-outline-secondary">Submit</button>
            </div>
        </form>
    </div>


</body>

</html>