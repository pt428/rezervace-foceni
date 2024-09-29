<?php 
include "../layout/header.php"; 
 
$buttonText=[" bude takové pozadí","Zde si zarezervujete čas focení"];
$dates=["15. 11. 2024","16. 11. 2024","17. 11. 2024"];
?>


<div class="container" style="max-width:40rem">
    <h1 class="text-center ">Vánoční focení 2024</h1>
    <?php        
        if (isset($_SESSION['message'])) {?>
    <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['message'] ;?>
    </div>
    <?php   unset($_SESSION['message']);} 
        if (isset($_SESSION['warning'])) {?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['warning'] ;?>
    </div>
    <?php   unset($_SESSION['warning']);}?>

    <div id="carouselCaptions" class="carousel slide  ">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <h5 class='m-0 text-center'>První den focení <?php echo $dates[0]?><?php echo $buttonText[0]?><i
                        class="bi bi-arrow-down text-danger"></i></h5>
                <img src="../images-carusel/img-1.jpg" class="d-block w-100 rounded-4" alt="...">
                <div class="carousel-caption">
                    <a href="../reservation/chooseTime.php?date=<?php echo $dates[0]?>"
                        class="btn btn-success opacity-75"><?php echo $buttonText[1] ?></a>
                </div>
            </div>
            <div class="carousel-item">
                <h5 class='m-0 text-center'>Druhý den focení <?php echo $dates[1]?><?php echo $buttonText[0]?><i
                        class="bi bi-arrow-down text-danger"></i></h5>
                <img src="../images-carusel/img-2.jpg" class="d-block w-100 rounded-4" alt="...">
                <div class="carousel-caption  d-md-block">
                    <a href="../reservation/chooseTime.php?date=<?php echo $dates[1]?>"
                        class="btn btn-success  opacity-75"><?php echo $buttonText[1]  ?></a>
                </div>
            </div>
            <div class="carousel-item">
                <h5 class='m-0 text-center'>Třetí den focení <?php echo $dates[2]?><?php echo $buttonText[0]?><i
                        class="bi bi-arrow-down text-danger"></i></h5>
                <img src="../images-carusel/img-3.jpg" class="d-block w-100 rounded-4" alt="...">
                <div class="carousel-caption d-md-block">
                    <a href="../reservation/chooseTime.php?date=<?php echo $dates[2]?>"
                        class="btn btn-success    opacity-75 "><?php echo $buttonText[1]  ?></a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev " type="button" data-bs-target="#carouselCaptions" data-bs-slide="prev">
            <span class="visually-visible bg-black p-1 fs-1 rounded-4"><i class="bi bi-caret-left"></i></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselCaptions" data-bs-slide="next">
            <span class="visually-visible bg-black p-1 fs-1 rounded-4 "> <i class="bi bi-caret-right "></i> </span>

        </button>
    </div>
    <h6 class="text-center mt-1">Focení bude probíhat v horním sále Obecního domu v Malenovicích.</h6>
    <div class="d-flex justify-content-center align-items-center border border-2 m-1">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d838.7015110782469!2d18.39415695027282!3d49.58060460899675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDnCsDM0JzQ5LjUiTiAxOMKwMjMnMzkuNSJF!5e0!3m2!1scs!2scz!4v1727465358530!5m2!1scs!2scz"
            width="600" height="200" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

</div>

<?php include "../layout/footer.php";?>