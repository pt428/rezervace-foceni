<?php require "../layout/header.php";?>

<div class=" container  "  >
    <div class="row w-100">
        <?php
        $directory = '../imagesAkce/loprais/';  // Cesta k vašej zložke s obrázkami
        $images = glob($directory . "*.{jpg,jpeg,png,gif,|JPEG,JPG,PNG,GIF}", GLOB_BRACE);  // Načíta všetky obrázky s koncovkami jpg, jpeg, png, gif

        foreach ($images as $image) {?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="square-container">
                <img src="<?php echo $image ?>" alt="Image 2">
            </div>
        </div>
        
        <?php }
?>
    </div>
    <h4 class="text-center m-5">VERNISÁŽ: Proč?...protože Karel Loprais</h4>
    <hr>
    <div class="row">
        <?php
        $directory = '../imagesAkce/foceni23/';  // Cesta k vašej zložke s obrázkami
        $images = glob($directory . "*.{jpg,jpeg,png,gif,|JPEG,JPG,PNG,GIF}", GLOB_BRACE);  // Načíta všetky obrázky s koncovkami jpg, jpeg, png, gif

        foreach ($images as $image) {?>
   <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="square-container">
                <img src="<?php echo $image ?>" alt="Image 2">
            </div>
        </div>
        <?php } ?>

    </div>
    <h4 class="text-center m-5">VÁNOČNÍ FOCENÍ S PEJSKY 17.11.2023</h4>
    <hr>
    <div class="row">
        <?php
        $directory = '../imagesAkce/foceni22/';  // Cesta k vašej zložke s obrázkami
        $images = glob($directory . "*.{jpg,jpeg,png,gif,|JPEG,JPG,PNG,GIF}", GLOB_BRACE);  // Načíta všetky obrázky s koncovkami jpg, jpeg, png, gif

        foreach ($images as $image) {?>
 <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="square-container">
                <img src="<?php echo $image ?>" alt="Image 2">
            </div>
        </div>
        <?php } ?>

    </div>
    <h4 class="text-center m-5">VÁNOČNÍ FOCENÍ S PEJSKY 18.11.2022 </h4>
    <hr>
</div>

<?php require "../layout/footer.php";?>