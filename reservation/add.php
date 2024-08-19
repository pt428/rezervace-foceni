<?php
 
session_start();

   unset($_SESSION['openReservation']);  

require_once "../database/Database.php";
require_once "./Reservation.php";

echo $_POST["dateOfReservation"] ."<br>" ;
echo $_POST["timeRange"] ."<br>"  ;
echo $_POST["firstName"]  ."<br>" ;
echo $_POST["secondName"]  ."<br>" ;
echo $_POST["email"]  ."<br>" ;
echo $_POST["phone"]  ."<br>" ;
echo $_POST["numberOfPhotos"]  ."<br>" ;
echo $_POST["numberOfDogs"]  ."<br>" ;
echo $_POST["numberOfAdults"]  ."<br>" ;
echo $_POST["numberOfChildren"]  ."<br>" ;
echo $_POST["note"] ;
 
$reservation = new Reservation(

  $_POST["dateOfReservation"] ,
  $_POST["timeRange"] ,
  $_POST["firstName"]  ,
  $_POST["secondName"] ,
  $_POST["email"] ,
  $_POST["phone"],
   $_POST["numberOfPhotos"] ,
  $_POST["numberOfDogs"]  ,
  $_POST["numberOfAdults"],
  $_POST["numberOfChildren"] ,
  false,
  $_POST["note"]  ,
  ""
);
$reservation->id=$_POST["id"];
$successText='Rezervace na datum '.$reservation->dateOfReservation.' a čas '.$reservation->timeRange.' byla úspěšně vytvořena.';
if($reservation->updateInDB()){
  
  if($reservation->sendEmail(false)==""){
    $_SESSION['message'] = $successText.' Email byl odeslán.';
  }else{
    $_SESSION['message'] = $successText;
    $_SESSION['warning'] = 'Nastal problém při odesílání emailu.';
  }

}else{
  $_SESSION['warning'] = 'Nastal problem při vytvoření rezervace.';
}
header("Location: ../main/index.php");
exit; 