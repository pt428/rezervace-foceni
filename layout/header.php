<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <header>

  
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid " >
            <a class="navbar-brand text-xs ms-5" href="#">BARBORA CHROMČÁKOVÁ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="../pages/index.php">Úvod</a>
                    </li>
                    <li>
                        <a class="nav-link " href="../pages/sluzby.php">Portfolio</a>
                    </li>
                    <li>
                        <a class="nav-link " href="../pages/kontakt.php">Kontakt</a>
                    </li>
                    <li>
                        <a class="nav-link " href="../pages/akce.php">Akce</a>
                    </li>
                    <li>
                        <a class="nav-link"   href="../main/index.php">Rezervace</a>
                    </li>
                   <?php 
                   session_start(); 
                   if(isset($_SESSION["admin"]) && $_SESSION["admin"]==true):?>
                    <li>
                        <a class="nav-link "  href="../reservation/showAll.php">Seznam rezervací</a>
                    </li>
                    <?php else:?>
                        <li>
                            <a class="nav-link " href="../main/login.php">Login</a>
                        </li>
                    <?php endif;?>
                </ul>

            </div>
        </div>
    </nav>
    <!-- <hr> -->
      </header>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
    var navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    var currentUrl = window.location.href;

    navLinks.forEach(function(link) {
        if (link.href === currentUrl) {
            link.classList.add('active');
        }
    });
});</script>