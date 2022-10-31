<?php include('connection.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap links start -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <!-- Bootstrap links end -->

  <!-- Google Captcha link  -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <link rel="stylesheet" href="style.css">

</head>

<body>

    <!-- Navbar Start-->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #F03433;">
        <div class="container-fluid">
            <a class="navbar-brand text-warning" href="#" style="font-weight: 900;">
                <img src="photos/car-logo4.png" width="20px" alt="" srcset=""> REPCAR
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">HOME</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color: #FFFFFF;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            INSERT
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="bninsert.php">BANNER</a></li>
                            <li><a class="dropdown-item" href="abtinsert.php">ABOUT</a></li>
                            <li><a class="dropdown-item" href="rcinsert.php">RENT CAR</a></li>
                            <li><a class="dropdown-item" href="rvinsert.php">REVIEW</a></li>
                            <li><a class="dropdown-item" href="admininsert.php">ADD ADMIN</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color: #FFFFFF;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            VIEW
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="bnview.php">BANNER</a></li>
                            <li><a class="dropdown-item" href="abtview.php">ABOUT</a></li>
                            <li><a class="dropdown-item" href="rcview.php">RENT CAR</a></li>
                            <li><a class="dropdown-item" href="rvview.php">REVIEW</a></li>
                            <li><a class="dropdown-item" href="contactview.php">CONTACT</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFFFFF;" href="logout.php">LOG OUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End-->
    <div class="container-fluid">