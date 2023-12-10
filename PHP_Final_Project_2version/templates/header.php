<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add our required metadata -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="robots" content="noindex, nofollow">
    <!-- Add our fonts : Raleway, Roboto, Montserrat-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Raleway:wght@400;500;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Add our jQuery (https://releases.jquery.com/ ) -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- Add Bootstrap (https://getbootstrap.com/) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Add our own CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
<header> <!-- global header for all the pages -->
    <!-- There is only one way to Log In, and it is through the form located on the header -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="./img/logo.png" alt="logo"></a>
            <form class="d-flex" action="./inc/validate.php" method="post">
                <input class="form-control me-2" name="usernameAD" type="text" placeholder="Username" required>
                <input class="form-control me-2" name="passwordAD" type="password" placeholder="Password" required>
                <input class="btn btn-info" type="submit" value="Login">
            </form>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="viewcontent.php">View Content Page</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register Page</a></li>
                    <li class="nav-item"><a class="nav-link" href="nonexistent.php">The Secret</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>