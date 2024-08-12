   <?php
   require_once "database/Database.php";   
   function generateTimeSchedule($date){ ?>

   <div class="row justify-content-center align-items-center">

       <h5 class="text-center text-white mt-2">Datum: <?php echo $date; ?></h5>
       <h5 class="text-center text-white">Časy k zarezervování</h5>

       <?php  $time = new DateTime('10:00'); 
               
                $db=new Database();
                $reservations= $db->getAllReservations();
               $filteredReservations = array_filter($reservations, function($reservation) use ($date) {
 
                 return $reservation['date_of_reservation'] ===  $date ;
                });
                $filteredReservations = array_values($filteredReservations);
           
                 
                ?>
       <?php for ($i = 0; $i < 20; $i++): ?>

       <div class="accordion" id="accordionExample">
           <div class="accordion-item">
               <h2 class="accordion-header">
                   <button class="accordion-button" type="button" data-bs-toggle="collapse"
                       data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                       <div class="row"> 
                           <?php 
                     
                       $actualTimeRange=$time->format('H:i')." - " . $time->modify('+30 minutes')->format('H:i');
                       echo  $actualTimeRange  ;
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

                                    }
                                }   
                             } 
                            
                    ?>
                           <?php if($timeRangeOfReservation !="") :?>
                           <?php if($approvedOfReservation) :?>
                            <div class="row">                           
                           <button class='btn btn-danger'>OBSAZENO</button>
                           <?php else:?>
                           <form action="./reservation/approved.php" method="post">
                               <input type="text" name="id" value="<?php echo $idOfReservation?>" hidden>
                               <button class='btn btn-warning'>SCHVALIT</button>
                           </form>
                           <?php endif;?>
                           <form action="./reservation/delete.php" method="post">
                               <input type="text" name="id" value="<?php echo $idOfReservation?>" hidden>
                               <button class='btn btn-danger'>SMAZAT</button>
                           </form>

                           <?php else:?>
                           <form action="reservation/form.php" method="get">
                               <input type="text" name="date" value="<?php echo $date?>" hidden>
                               <input type="text" name="timeRange" value="<?php echo $actualTimeRange?>" hidden>
                               <button type="submit" class='btn btn-success'>REZERVOVAT</button>
                           </form>

                           <?php endif;?>
 </div>
                        
                   </button>
               </h2>
               <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                   <div class="accordion-body">
                       <ul class=" ">
                           <li><?php echo $dateOfReservation?> </li>
                           <li><?php echo $timeRangeOfReservation?> </li>
                           <li><?php echo $firstNameOfReservation?> </li>
                           <li><?php echo $secondNameOfReservation?> </li>
                           <li><?php echo $emailOfReservation?> </li>
                           <li><?php echo $phoneOfReservation?> </li>

                       </ul>
                   </div>
               </div>
           </div>






           <?php endfor; ?>

       </div>
       <?php   }    ?>