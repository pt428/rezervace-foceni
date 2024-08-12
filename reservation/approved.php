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
    $reservation->approved=true;
   echo $reservation->updateInDB();
    header("Location: ../index.php");
exit; 
}
 