<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>upload</h1>
    <form method="POST" action="/upload" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image">
    <input type="submit" name="profile">
</form>
</body>
</html>