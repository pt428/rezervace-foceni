<?php 
require "../layout/header.php";
 
if(isset($_SESSION["admin"]) && $_SESSION["admin"]==true){
  require_once "../database/Database.php";
  
  $db=new Database();
  $reservations= $db->getAllReservations();
  $captionText="Seznam rezervací";
  if(count($reservations)==0) $captionText="Nejsou žádné rezervace";
  ?>
<div class='container    justify-content-center align-items-center'>
  <h1 class="text-center "><?php echo $captionText ?></h1>
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
    <?php foreach ($reservations as $reservation){?>
    <div class="row bg-light p-2 m-1 rounded-3">

        <div class='col-6 '>
            <h5>REZERVACE: <?php echo $reservation['date_of_reservation']." (".$reservation['time_range'].")" ?></h5>
        </div>
        <div class='col-6'>
            <h5><?php echo $reservation['first_name']." ". $reservation['second_name'] ?></h5>
        </div>
        <div class="col-6">
            <div class='col'>Počet fotek: <?php echo $reservation['number_of_photos']?></div>
            <div class='col'>Počet psů: <?php echo $reservation['number_of_dogs']?></div>
            <div class='col'>Počet dospělých: <?php echo $reservation['number_of_adult']?></div>
            <div class='col'>Počet dětí: <?php echo $reservation['number_of_children']?></div>
        </div>
        <div class="col-6">
            <div class='col'>Email: <?php echo $reservation['email']?></div>
            <div class='col'>Telefon: <?php echo $reservation['phone_number']?></div>
          <div class="mt-1">

            <?php if($reservation['approved']==0):?>
              <form action="../reservation/approved.php" method="post">
                <input type="text" name="id" value="<?php echo $reservation['id']?>" hidden>
                <button class='btn btn-warning w-100'>SCHVALIT</button>
              </form>
              <?php else:?>
                <button class='btn btn-success w-100'>SCHVÁLENO</button>
                <?php endif;?>
                 
                  <form action="../reservation/delete.php" method="post">
                    <input type="text" name="id" value="<?php echo  $reservation['id']?>" hidden>
                    <button class='btn btn-danger w-100 mt-1'>SMAZAT</button>
                  </form>
                
              </div>
        </div>
        <div class='col'>Poznámka: <?php echo $reservation['note']?></div>
    </div>

    <?php } 
            echo "</div>";
            }else{
            header('Location: ../main/index.php');
            exit;
            }
          
            require "../layout/footer.php";
            ?>