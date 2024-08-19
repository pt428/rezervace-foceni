<?php 
 require_once "../database/Database.php";
 require_once "Reservation.php";
 // Spusťte session
session_start();

// Nastavte zprávu
$_SESSION['message'] = 'Rezervace byla schválena.';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the post ID
    $post_id = $_POST['id'];

    
    $db= new Database();
    $reservation = new Reservation();
    $reservation->getReservationById($post_id);
    $reservation->approved=1;
   if($reservation->updateInDB()){
     if($reservation->sendEmail(true)==""){
         $_SESSION['message'] = 'Rezervace byla schválena. Email byl odeslán.';

    }else{
    $_SESSION['message'] = 'Rezervace byla schválena.';
    $_SESSION['warning'] = 'Nastal problém při odesílání emailu s QR kódem.';
    }
   }else{
    $_SESSION['warning'] = 'Nastal problem při schválení rezervace.';
}
    header("Location: ./showAll.php");
exit; 
}
 