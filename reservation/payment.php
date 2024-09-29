<?php 
 require_once "../database/Database.php";
 require_once "Reservation.php";
 // Spusťte session
session_start();

// Nastavte zprávu
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the post ID
    $post_id = $_POST['id'];
    if(isset($_POST["payment"]) ){
        $payment = $_POST["payment"];
    }else{
        $payment =0;
    };

    
    $db= new Database();
    $reservation = new Reservation();
    $reservation->getReservationById($post_id);
    $reservation->payment=$payment  ;
   if($reservation->updateInDB()){
      if($payment){

          $_SESSION['message'] =$reservation->dateOfReservation . " " . $reservation->timeRange .'<br> změněno na zaplaceno.';
      }else{
        $_SESSION['warning'] = $reservation->dateOfReservation . " " . $reservation->timeRange .'<br> změněno na NEzaplaceno.';
      }
     
   }else{
    $_SESSION['warning'] = 'Nastal problem při ukládání rezervace.';
}
    header("Location: ./showAll.php");
exit; 
}