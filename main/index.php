<?php 
include "../layout/header.php"; 
 
$buttonText=["Datum: ","Zde si zarezervujete čas focení"];
$dates=["9.12.2024","10.12.2024","11.12.2024"];
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

    <div id="carouselCaptions" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <h5 class='m-0 text-center'><?php echo $buttonText[0].$dates[0]?></h5>
          <img  src="../images-carusel/img-1.jpg" class="d-block w-100 rounded-4" alt="...">
          <div class="carousel-caption"> 
            <a href="../reservation/chooseTime.php?date=9.12.2024"  class="btn btn-success opacity-75"><?php echo $buttonText[1] ?></a>
            </div>
        </div>
        <div class="carousel-item">
          <h5 class='m-0 text-center'><?php echo $buttonText[0].$dates[1]?></h5>
          <img src="../images-carusel/img-2.jpg" class="d-block w-100 rounded-4" alt="...">
          <div class="carousel-caption  d-md-block">
             <a href="../reservation/chooseTime.php?date=10.12.2024"  class="btn btn-success  opacity-75"><?php echo $buttonText[1]  ?></a>
          </div>
        </div>
        <div class="carousel-item">
          <h5 class='m-0 text-center'><?php echo $buttonText[0].$dates[2]?></h5>
          <img src="../images-carusel/img-3.jpg"  class="d-block w-100 rounded-4" alt="...">
          <div class="carousel-caption d-md-block">
             <a href="../reservation/chooseTime.php?date=11.12.2024"   class="btn btn-success  opacity-75"><?php echo $buttonText[1]  ?></a>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselCaptions" data-bs-slide="prev"  >
        <span class="carousel-control-prev-icon "></span>
        <span class="visually-visible">Předchozí</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselCaptions" data-bs-slide="next">
        <span class="visually-visible">Další</span>
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </button>
    </div>
    </div>

  

<?php include "../layout/footer.php";?>