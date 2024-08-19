<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <header>

  
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid" style="padding-right: 2.1rem;">
            <a class="navbar-brand text-xs " href="#">BARBORA CHROMČÁKOVÁ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="../index.html">Úvod</a>
                    </li>
                    <li>
                        <a class="nav-link " href="../sluzby/">Portfolio</a>
                    </li>
                    <li>
                        <a class="nav-link " href="../kontakt/">Kontakt</a>
                    </li>
                    <li>
                        <a class="nav-link " href="../akce/">Akce</a>
                    </li>
                    <li>
                        <a class="nav-link"   href="../main/index.php">Rezervace</a>
                    </li>
                   <?php 
                   session_start(); 
                   if(isset($_SESSION["admin"]) && $_SESSION["admin"]==true):?>
                    <li>
                        <a class="nav-link "  href="../reservation/showall.php">Seznam rezervací</a>
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
    <hr>
      </header>
    <div class="container" style="max-width:50rem;">
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