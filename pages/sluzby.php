<?php require "../layout/header.php";?>
 
<div class="container m-5">
  <div class="row" id="masonry-grid">
   <?php
$directory = '../images/';  // Cesta k vašej zložke s obrázkami
$images = glob($directory . "*.{jpg,jpeg,png,gif,|JPEG,JPG,PNG,GIF}", GLOB_BRACE);  // Načíta všetky obrázky s koncovkami jpg, jpeg, png, gif

foreach ($images as $image) {?>
    <div class="col-md-3 masonry-item ">
       <img src="<?php echo $image ?>" class="img-fluid"  >
       <p class="text-center"><?php  echo preg_replace('/^\d+-/', '', pathinfo(basename($image), PATHINFO_FILENAME));;?></p>
   </div>
   <?php }
?>

 
   
  </div>
</div>

<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
         window.onload = function() {
            // Tu môžete zavolať PHP kód pomocou AJAX-u alebo dynamicky načítať obsah
            fetchImages();
        };
        function fetchImages(){
            
            var elem = document.querySelector('#masonry-grid');
            var msnry = new Masonry( elem, {
              itemSelector: '.masonry-item',
              columnWidth: '.col-md-3',
              percentPosition: true
            });
        }
</script>
<?php require "../layout/footer.php";?>