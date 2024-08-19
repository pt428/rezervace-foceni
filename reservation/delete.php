<?php 
 require_once "../database/Database.php";
 require_once "Reservation.php";
 // Spusťte session
session_start();
// Nastavte zprávu
$_SESSION['message'] = 'Rezervace byla smazána.';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the post ID
    $post_id = $_POST['id'];

    echo  $post_id ;
    $db= new Database();
 $db->delete($post_id);
header("Location: ../reservation/showAll.php");
exit; 
}