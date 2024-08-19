   <?php
   require "../database/Database.php";    
   function generateTimeSchedule($date){ ?>

   <div class="row justify-content-center align-items-center m-0  " style="width: 50rem;">
       <?php  $time = new DateTime('10:00'); 
               $timerNumber=0;
                $db=new Database();
                $reservations= $db->getAllReservations();
               $filteredReservations = array_filter($reservations, function($reservation) use ($date) {
                  return $reservation['date_of_reservation'] ===  $date ;
                });
                $filteredReservations = array_values($filteredReservations);
        for ($i = 0; $i < 20; $i++) { 
            ?>
            <hr>
       <div class="row m-1">
           <?php                      
                $actualTimeRange=$time->format('H:i')." - " . $time->modify('+30 minutes')->format('H:i');
                      
                       echo  "<div class='d-flex justify-content-center align-items-center col-md-3 bg-light '><h5 class='m-0'>". $actualTimeRange. "</h5></div>"  ;
                        $timeRangeOfReservation ="";
                          if(isset($filteredReservations)) {
                                foreach ($filteredReservations as $reservation  ) {                              
                                    if($actualTimeRange === $reservation["time_range"]){
                                        $idOfReservation =$reservation["id"];
                                        $timeRangeOfReservation =$reservation["time_range"];
                                        $firstNameOfReservation =$reservation["first_name"];
                                        $secondNameOfReservation =$reservation["second_name"];
                                        $dateOfReservation =$reservation["date_of_reservation"];
                                        $emailOfReservation =$reservation["email"];
                                        $phoneOfReservation =$reservation["phone_number"];
                                        $approvedOfReservation =$reservation["approved"];
                                        $numberOfPhotosOfReservation = $reservation["number_of_photos"];
                                        $numberOfDogsOfReservation=$reservation["number_of_dogs"];
                                        $numberOfAdultsOfReservation=$reservation["number_of_adult"];
                                        $numberOfChildrenOfReservation=$reservation["number_of_children"];
                                        $noteOfReservation=$reservation["note"];
                                        $blockingTime=$reservation["blocking_time"];

                                             $date1 =  new DateTime(); 
                                             $date1->format('d-m-Y H:i:s');
                                             $date2 = new DateTime($blockingTime);
                 
                                             // Výpočet rozdílu mezi daty
                                             $interval = $date1->diff($date2);
                 
                                             $seconds = $interval->days * 24 * 60 * 60 + 
                                                     $interval->h * 60 * 60 + 
                                                     $interval->i * 60 + 
                                                     $interval->s;
                                                     $deleteReservation=false;
                                                     if(isset($_SESSION['openReservation']) && $idOfReservation==$_SESSION['openReservation']){
                                                        $deleteReservation=true;
                                                     }
                                                 if($seconds>=60 || $deleteReservation){
                                                    $db=new Database();
                                                    $db->delete($idOfReservation);
                                                    $timeRangeOfReservation="";
                                                $blockingTime="";}
                                          }
                                }   
                             } 
            
            if($timeRangeOfReservation !=""){
                ?>
                <?php  if(isset($_SESSION["admin"]) && $_SESSION["admin"]==true):?>
                    <div class="col-md p-0 ">

                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Rezervace: <?php echo $firstNameOfReservation. " " .$secondNameOfReservation ?>
                            </button>
                            <ul class="dropdown-menu p-1">
                                <li class=" list-group-item list-group-item-success">Datum: <?php echo $dateOfReservation?> </li>
                                <li class=" list-group-item list-group-item-success">Čas: <?php echo $timeRangeOfReservation?>
                                </li>
                                <li class=" list-group-item list-group-item-success">Email: <?php echo $emailOfReservation?>
                                </li>
                                <li class=" list-group-item list-group-item-success">Telefon: <?php echo $phoneOfReservation?>
                                </li>
                                <li class="list-group-item list-group-item-warning">Počet fotek:
                                    <?php echo $numberOfPhotosOfReservation?> </li>
                                <li class="list-group-item list-group-item-warning">Počet psů:
                                    <?php echo $numberOfDogsOfReservation?> </li>
                                <li class="list-group-item list-group-item-warning">Počet dospělých:
                                    <?php echo $numberOfAdultsOfReservation?> </li>
                                <li class="list-group-item list-group-item-warning">Počet dětí:
                                    <?php echo $numberOfChildrenOfReservation?> </li>
                                <li class="list-group-item list-group-item-danger">Poznámka: <?php echo $noteOfReservation?>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php endif;?>

                <div class="col p-0 ">
                     <?php
                        $timeRangeOfReservation="";
                      
                    if($blockingTime!="") { 
                            $timerNumber++;
                            echo '<script>';
                            echo 'var targetDate'.$timerNumber.'= "'.$blockingTime.'";';
                            echo 'startCountdown(targetDate'.$timerNumber.', "timer'.$timerNumber.'"); </script>';
                                ?>

                            <button class='btn btn-info w-100'>Někdo rezervuje 
                                <span id="timer<?php echo $timerNumber?>"></span>
                            </button>
                        <?php $blockingTime="";
                        }else{
                            if($approvedOfReservation){
                                    ?>
                                <button class='btn btn-danger w-100'>OBSAZENO</button>
                                <?php 
                            }else{
                                ?>
                                <?php if(isset($_SESSION["admin"]) && $_SESSION["admin"]==true):?>
                                <form action="../reservation/approved.php" method="post">
                                    <input type="text" name="id" value="<?php echo $idOfReservation?>" hidden>
                                    <button class='btn btn-warning w-100'>SCHVALIT</button>
                                </form>
                                <?php else:?>
                                     <button class='btn btn-warning w-100'>ČEKÁ NA SCHVÁLENÍ</button>
                                <?php endif; ?>
                                <?php 
                            } 
                        }
                             ?>
                </div>
                <?php  if(isset($_SESSION["admin"]) && $_SESSION["admin"]==true):?>
                    <div class="col p-0 ">
                        <form action="../reservation/delete.php" method="post">
                            <input type="text" name="id" value="<?php echo $idOfReservation?>" hidden>
                            <button class='btn btn-danger w-100'>SMAZAT</button>
                        </form>
                    </div>
                <?php endif;?>
            <?php 
            }else{           
            ?>
            <div class="col-md-9 p-0 ">
                <form action="../reservation/form.php" method="post">
                    <input type="text" name="date" value="<?php echo $date ?>" hidden>
                    <input type="text" name="timeRange" value="<?php echo $actualTimeRange ?>" hidden>
                    <button type="submit" class='btn btn-success  w-100'>REZERVOVAT</button>
                </form>
            </div>
            <?php 
            }?>

</div>
<hr>    
       <?php 
    } 
    ?>
   </div>
   <?php }?>
   <script src="../js/multiCountdown.js"></script>