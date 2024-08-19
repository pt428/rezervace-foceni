 
<?php 
 
 require "../layout/header.php"; 
 $date;
 if(isset($_GET["date"])){
    $date=$_GET["date"];
 }
?>
  
<main>
    <div class="container" style="max-width:50rem;"></div>
    <h1 class="text-center ">Vánoční focení 2024</h1>
    <h4 class="text-center mt-2">Datum: <?php echo $date; ?></h4>
    <!-- <h5 class="text-center  ">Časy k zarezervování</h5> -->
    <?php  
        require "../main/calendar.php";        
      
          
        if (isset($_SESSION['message'])) {?>
            <div class="alert alert-success" role="alert">
                <?php echo   $_SESSION['message'] ;?>
            </div>
            <?php   unset($_SESSION['message']);} 
        if (isset($_SESSION['warning'])) {?>
            <div class="alert alert-danger" role="alert">
                <?php echo   $_SESSION['warning'] ;?>
            </div>
            <?php   unset($_SESSION['warning']);}?>

    <div class="d-flex  justify-content-center align-items-center ">
        <?php  generateTimeSchedule($date); ?>
    </div>


</main>

<?php require "../layout/footer.php";?>
 