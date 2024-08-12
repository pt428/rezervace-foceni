<?php
// Spusťte session
session_start();

// Nastavte zprávu
$_SESSION['message'] = 'Rezervace byla úspěšně vytvořena.';
require_once "../database/Database.php";
require_once "./Reservation.php";
 echo $_GET["dateOfReservation"] ."<br>" ;
 echo $_GET["timeRange"] ."<br>"  ;
echo $_GET["firstName"]  ."<br>" ;
echo $_GET["secondName"]  ."<br>" ;
echo $_GET["email"]  ."<br>" ;
echo $_GET["phone"]  ."<br>" ;
echo $_GET["numberOfPhotos"]  ."<br>" ;
echo $_GET["numberOfDogs"]  ."<br>" ;
echo $_GET["numberOfAdults"]  ."<br>" ;
echo $_GET["numberOfChildren"]  ."<br>" ;
echo $_GET["note"] ;
 
$reservation = new Reservation(
  $_GET["dateOfReservation"] ,
  $_GET["timeRange"] ,
  $_GET["firstName"]  ,
  $_GET["secondName"] ,
  $_GET["email"] ,
  $_GET["phone"],
   $_GET["numberOfPhotos"] ,
  $_GET["numberOfDogs"]  ,
  $_GET["numberOfAdults"],
  $_GET["numberOfChildren"] ,
  false,
  $_GET["note"]  
);
$reservation->insertToDB();
header("Location: ../index.php");
exit; 