<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../Assets/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <form action="handler_login.php" method="post">
        <div class="container">
            <form action="handler_login.php" method="post">

                <div class="field">
                    <label for="">email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>

                <div class="field">
                    <label for="">password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <a href="register.php">Register</a>
        </div>
    </form>
    <!-- <a href="index.php">Register</a> -->
</body>

</html>