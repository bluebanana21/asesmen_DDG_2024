<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <style>
        body {
            /* background-image: url('Assets/newspaper-aesthetic-background-6zy4tj738voyh9fx.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover; */
        }
    </style>
    <div class="container">
        <form action="handler_register.php" method="post">
            <div class="field">
                <label for="">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>

            <div class="field">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>

            <div class="field">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <a href="login.php">login</a>
    </div>
</body>

</html>