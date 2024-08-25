<?php  
require "Reservation.php";
require "../database/Database.php";
  require "../layout/header.php";
$db=new Database();
if($db->checkAviability($_POST["date"], $_POST["timeRange"]) > 0) {     
    $_SESSION["warning"]="Někdo zrovna daný termín rezervuje";
    header('Location: chooseTime.php?date=' . $_POST['date']);
    exit;
}
   $reservation = new Reservation();
        $reservation->dateOfReservation= $_POST["date"] ;
        $reservation->timeRange=$_POST["timeRange"];
        $date = new DateTime(); // Vytvoří aktuální datum a čas 
        $reservation->blockingTime=  $date->format('d-m-Y H:i:s');
        $reservation->insertToDB();
        
        $_SESSION['openReservation'] =$reservation->id;  
 
        
        ?>
 

 
    <div class="container" style="max-width:40rem">
        <h1 class="text-center">Rezervační formulář</h1>
        <div class="alert alert-success timer" role="alert">
            Rezervace je držena po dobu <span id="countdown"></span>
        </div>
          <a class="btn btn-secondary w-100" href="chooseTime.php?date=<?php echo $_POST["date"] ?>">Zpět</a>
        <form action="add.php" method="post">
            <input type="text" name="id" value="<?php echo $reservation->id?>"  hidden >
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-date">Datum</span>
                <input type="text" value="<?php echo $_POST["date"] ; ?>" class="form-control" name="dateOfReservation"
                    aria-describedby="input-date" readonly required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-time-range">Čas</span>
                <input type="text" value="<?php echo $_POST["timeRange"] ; ?>" class="form-control" name="timeRange"
                    aria-describedby="input-time-range" readonly required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-first-name">Jméno</span>
                <input type="text" class="form-control" name="firstName" aria-describedby="input-first-name" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-second-name">Příjmení</span>
                <input type="text" class="form-control" name="secondName" aria-label="SecondName"
                    aria-describedby="input-second-name" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-email">Email</span>
                <input type="email" class="form-control" name="email" aria-label="Email" aria-describedby="input-email"
                    required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-phone">Telefon</span>
                <input type="tel" class="form-control" name="phone" aria-label="Phone" aria-describedby="input-phone"
                    required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-number-of-photos">Počet fotek</span>
                <input type="number" value="5" step="5" min="5" max="10" class="form-control" name="numberOfPhotos"
                    aria-describedby="input-number-of-photos" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-number-of-dogs">Počet focených psů</span>
                <input type="number" value="0" min="0" max="2" class="form-control" name="numberOfDogs"
                    aria-describedby="input-number-of-dogs" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-number-of-adults">Počet focených dospělých</span>
                <input type="number" value="0" min="0" max="2" class="form-control" name="numberOfAdults"
                    aria-label="NumberOfAdults" aria-describedby="input-number-of-adults" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-number-of-children">Počet focených dětí</span>
                <input type="number" value="0" min="0" max="4" class="form-control" name="numberOfChildren"
                    aria-label="NumberOfChildren" aria-describedby="input-number-of-children" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-note">Poznámka</span>
                <textarea type="text" maxlength="490" class="form-control" name="note" aria-label="Note"
                    aria-describedby="input-note"></textarea>
            </div>
            <button class="btn btn-success w-100 mb-2" type="submit">Odeslat</button>
        </form>
    </div>
 <?php
require "../layout/footer.php";
?>


</html>
<script src="../js/countdown.js"></script>