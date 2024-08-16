 <?php require"header.php"; 
  $dates=["9.12.2024","10.12.2024","11.12.2024"];
  ?>

 <main>

     <h1 class="text-center ">Vánoční focení 2024</h1>
     <h5 class="text-center mt-2">Datum: <?php echo $dates[2]; ?></h5>
     <?php  
        include "calendar.php";
        
      
        if (isset($_SESSION['message'])) {?>

     <div class="alert alert-success" role="alert">
         <?php echo   $_SESSION['message'] ;?>
     </div>
     <?php   unset($_SESSION['message']);}
           
            ?>
     <div class="d-flex justify-content-evenly">
     <a href="page2.php"><?php echo $dates[1]?></a>
     <a href="page1.php"><?php echo $dates[0]?></a>
     </div>
     <img src="images-carusel/img-3.jpg" class="mx-auto d-block w-20 rounded-4" alt="...">
     <div class="d-flex  justify-content-center align-items-center ">
         <?php  generateTimeSchedule($dates[2]); ?>
     </div>
     </div>

 </main>

 <?php require "footer.php";?>