<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="dashboard d-flex justify-content-between">
        <div class="sidebar bg-dark vh-100">
            <h1 class="bg-primary p-4">
                <a href="../admin/manage.php" class="text-light text-decoration-none">
                    Profile
                </a>
            </h1>
            <div class="menues p-4 mt-5">
                <div class="menu">
                    <a href="../admin/create.php" class="text-light text-decoration-none"><strong>Add new
                            post</strong></a>
                </div>
                <div class="menu mt-5">
                    <a href="../app/home.php" class="text-light text-decoration-none"><strong>View website</strong></a>
                </div>
                <div class="menu mt-5">
                    <a href="../app/logout.php" class="btn btn-info">Logout</a>
                </div>
            </div>
        </div>