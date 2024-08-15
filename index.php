<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header></header>
    <main>
        <!-- <div class="container column justify-content-center align-items-center  "> -->
        <h1 class="text-center text-white">Vánoční focení 2024</h1>
        <?php 
        include "calendar.php";
        session_start();
        if (isset($_SESSION['message'])) {?>

        <div class="alert alert-success" role="alert">
            <?php echo   $_SESSION['message'] ;?>
        </div>
        <?php   unset($_SESSION['message']);}?>

<div class="carousel">
    <div class="carousel-wrapper">
        <?php
        // Načtení všech obrázků z adresáře "images"
        $images = glob('images-carusel/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        $dates=["9.12.2024","10.12.2024","11.12.2024"];
        // Duplikujeme poslední obrázek na začátek pro efekt nekonečného posunu
        if (!empty($images)) {
          
               echo"<div>";
              echo '<img src="' . $images[count($images) - 1] . '">';
            generateTimeSchedule($dates[2]); 
            echo "</div>";
        }

        // Zobrazení obrázků v karuselu
        foreach ($images as $index=> $image ) {
           echo"<div>";
            echo '<img src="' . $image . '">';
            generateTimeSchedule($dates[$index]); 
            echo "</div>";
             
        }

        // Duplikujeme první obrázek na konec pro efekt nekonečného posunu
        if (!empty($images)) {
          echo"<div>";
              echo '<img src="' . $images[0] . '">';
            generateTimeSchedule($dates[0]); 
            echo "</div>";
        }
        ?>
    </div>
    <span class="prev">&#10094;</span>
    <span class="next">&#10095;</span>
    
</div>


    </main>

</body>

<script src="js/carousel.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

</html>