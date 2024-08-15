   <?php
   require_once "database/Database.php";   
   function generateTimeSchedule($date){ ?>

   <div class="row justify-content-center align-items-center m-0  " style="width: 50rem;">

       <h5 class="text-center mt-2">Datum: <?php echo $date; ?></h5>
       <h5 class="text-center  ">Časy k zarezervování</h5>

       <?php  $time = new DateTime('10:00'); 
               
                $db=new Database();
                $reservations= $db->getAllReservations();
               $filteredReservations = array_filter($reservations, function($reservation) use ($date) {
 
                 return $reservation['date_of_reservation'] ===  $date ;
                });
                $filteredReservations = array_values($filteredReservations);
                ?>
       <?php for ($i = 0; $i < 20; $i++): ?>
       <div class="row m-1">
        
           <?php                      
                       $actualTimeRange=$time->format('H:i')." - " . $time->modify('+30 minutes')->format('H:i');
                      
                       echo  "<div class='col-3'><h5>". $actualTimeRange. "</h5></div>"  ;
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
                                          }
                                }   
                             } 
                    ?>
                   
           <?php if($timeRangeOfReservation !="") :?>
            <div class="col p-0 ">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Rezervace: <?php echo $firstNameOfReservation. " " .$secondNameOfReservation ?>  
                    </button>
                    <ul class="dropdown-menu p-1">
                        <li class=" list-group-item list-group-item-success">Datum: <?php echo $dateOfReservation?> </li>
                        <li class=" list-group-item list-group-item-success">Čas: <?php echo $timeRangeOfReservation?> </li>
                        <li class=" list-group-item list-group-item-success">Email: <?php echo $emailOfReservation?> </li>
                        <li class=" list-group-item list-group-item-success">Telefon: <?php echo $phoneOfReservation?> </li>
                        <li class="list-group-item list-group-item-warning">Počet fotek: <?php echo $numberOfPhotosOfReservation?> </li>
                        <li class="list-group-item list-group-item-warning">Počet psů: <?php echo $numberOfDogsOfReservation?> </li>
                        <li class="list-group-item list-group-item-warning">Počet dospělých: <?php echo $numberOfAdultsOfReservation?> </li>
                        <li class="list-group-item list-group-item-warning">Počet dětí: <?php echo $numberOfChildrenOfReservation?> </li>
                        <li class="list-group-item list-group-item-danger">Poznámka: <?php echo $noteOfReservation?> </li>
                    </ul>
                </div>
            </div>
            
            <div class="col p-0 ">
               <?php if($approvedOfReservation) :?>
                   <button class='btn btn-danger w-100'>OBSAZENO</button>                
               <?php else:?>
                    <form action="./reservation/approved.php" method="post">
                       <input type="text" name="id" value="<?php echo $idOfReservation?>" hidden>
                       <button class='btn btn-warning w-100'>SCHVALIT</button>
                   </form>      
               <?php endif;?>
                 </div>
               <div class="col p-0 ">
                   <form action="./reservation/delete.php" method="post">
                       <input type="text" name="id" value="<?php echo $idOfReservation?>" hidden>
                       <button class='btn btn-danger w-100'>SMAZAT</button>
                   </form>
               </div>
               <?php else:?>
               <div class="col-9 p-0 ">
                   <form action="reservation/form.php" method="get">
                       <input type="text" name="date" value="<?php echo $date?>" hidden>
                       <input type="text" name="timeRange" value="<?php echo $actualTimeRange?>" hidden>
                       <button type="submit" class='btn btn-success w-100'>REZERVOVAT</button>
                   </form>
               </div>
               <?php endif;?>
            
       </div>
       <?php endfor; ?>
   </div>
   <?php   }    ?>