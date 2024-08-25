<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Reservation{
    public $id;
    public $dateOfReservation;
    public  $timeRange;
    public   $firstName;
    public  $secondName;
    public  $email;
    public  $phone;
    public $numberOfPhotos;
    public   $numberOfDogs;
    public  $numberOfAdults;
    public  $numberOfChildren;
    public $approved;
    public  $note;
    public $connection;
    public $blockingTime;
 
    public function __construct(         
        $dateOfReservation="",
        $timeRange="",
        $firstName="",
        $secondName="",
        $email="",
        $phone="",
        $numberOfPhotos=0,
        $numberOfDogs=0,
        $numberOfAdults=0,
        $numberOfChildren=0,
        $approved=false,
        $note="",
        $blockingTime="") {

                $this->dateOfReservation=$dateOfReservation;
                $this->timeRange= $timeRange;
                $this->firstName=$firstName;
                $this->secondName=$secondName;
                $this->email= $email;
                $this->phone=$phone;
                $this->numberOfPhotos=$numberOfPhotos;             
                $this->numberOfDogs=$numberOfDogs;
                $this->numberOfAdults=$numberOfAdults;
                $this->numberOfChildren=$numberOfChildren;
                $this->approved=$approved;
                $this->note=$note;
                $db=new Database();
                $this->connection=$db->connectDB();
                $this->blockingTime=$blockingTime;       
    }
 
        public function insertToDB(){          
            $sql="INSERT INTO reservations (
                    date_of_reservation,
                    time_range,
                    first_name,
                    second_name,
                    email,
                    phone_number,
                    number_of_photos,
                    number_of_dogs	,
                    number_of_adult,
                    number_of_children,
                    approved,
                    note,
                    blocking_time) 
                    VALUES (
                    :dateOfReservation,
                    :timeRange,
                    :firstName,
                    :secondName,
                    :email,
                    :phone,
                    :numberOfPhotos,
                    :numberOfDogs,
                    :numberOfAdults,
                    :numberOfChildren,
                    :approved,
                    :note,
                    :blockingTime)";

            $stmt=$this->connection->prepare($sql);
            $stmt->bindValue(":dateOfReservation",$this->dateOfReservation,PDO::PARAM_STR);
            $stmt->bindValue(":timeRange",$this->timeRange,PDO::PARAM_STR);
            $stmt->bindValue(":firstName",$this->firstName,PDO::PARAM_STR);
            $stmt->bindValue(":secondName",$this->secondName,PDO::PARAM_STR);
            $stmt->bindValue(":email",$this->email,PDO::PARAM_STR);
            $stmt->bindValue(":phone",$this->phone,PDO::PARAM_STR);  
            $stmt->bindValue(":numberOfPhotos",$this->numberOfPhotos,PDO::PARAM_INT);
            $stmt->bindValue(":numberOfDogs",$this->numberOfDogs,PDO::PARAM_INT);
            $stmt->bindValue(":numberOfAdults",$this->numberOfAdults,PDO::PARAM_INT);
            $stmt->bindValue(":numberOfChildren",$this->numberOfChildren,PDO::PARAM_INT);
            $stmt->bindValue(":approved",$this->approved,PDO::PARAM_BOOL);
            $stmt->bindValue(":note",$this->note,PDO::PARAM_STR);
            $stmt->bindValue(":blockingTime",$this->blockingTime,PDO::PARAM_STR);
                try {
                    if($stmt->execute()){
                        $id=$this->connection->lastInsertId();
                        $this->id=$id;
                        return $id;
                    }else{
                        throw new Exception("Uložení dat do databaze selhalo");
                    }
                } catch (Exception $th) {
                    echo "Typ chyby:" . $th->getMessage();
                }

        }
public function updateInDB(){
   
    try{
       $sql = "UPDATE reservations 
        SET 
            id=:id,
            date_of_reservation = :dateOfReservation,
            time_range = :timeRange,
            first_name = :firstName,
            second_name = :secondName,
            email = :email,
            phone_number = :phone,
            number_of_photos = :numberOfPhotos,
            number_of_dogs = :numberOfDogs,
            number_of_adult = :numberOfAdults,
            number_of_children = :numberOfChildren,
            approved = :approved,
            note = :note,
            blocking_time=:blockingTime
        WHERE id = :id";        
     
            $stmt = $this->connection->prepare($sql);       
            $stmt->bindParam(':id', $this->id);  
            $stmt->bindParam(':dateOfReservation', $this->dateOfReservation);
            $stmt->bindParam(':timeRange', $this->timeRange);
            $stmt->bindParam(':firstName', $this->firstName);
            $stmt->bindParam(':secondName', $this->secondName);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':numberOfPhotos', $this->numberOfPhotos);
            $stmt->bindParam(':numberOfDogs', $this->numberOfDogs);
            $stmt->bindParam(':numberOfAdults', $this->numberOfAdults);
            $stmt->bindParam(':numberOfChildren', $this->numberOfChildren);
            $stmt->bindParam(':approved', $this->approved);
            $stmt->bindParam(':note', $this->note);
             $stmt->bindParam(':blockingTime', $this->blockingTime);
           $stmt->execute();
             return true;

        } catch (PDOException $e) {
            // Zachycení a zpracování chyby
            echo "Chyba při aktualizaci záznamu: " . $e->getMessage();
            return false; 
        }
    }

public function getReservationById($id) {
        $sql = "SELECT * FROM reservations WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['id' => $id]);
        $reservation = $stmt->fetch();

        if ($reservation) {
            $this->id = $reservation['id'];
            $this->dateOfReservation = $reservation['date_of_reservation'];
            $this->timeRange = $reservation['time_range'];
            $this->firstName = $reservation['first_name'];
            $this->secondName = $reservation['second_name'];
            $this->email = $reservation['email'];
            $this->phone = $reservation['phone_number'];
            $this->numberOfPhotos = $reservation['number_of_photos'];
            $this->numberOfDogs = $reservation['number_of_dogs'];
            $this->numberOfAdults = $reservation['number_of_adult'];
            $this->numberOfChildren = $reservation['number_of_children'];
            $this->approved = $reservation['approved'];
            $this->note = $reservation['note'];
            $this->note = $reservation['blocking_time'];
            return $this; // Vrátí instanci této třídy s načtenými daty
        } else {
            return null; // Pokud rezervace není nalezena, vrátí null
        }
    }
    public function sendEmail( $emailWithQRcode){     
        require '../vendor/PHPMailer/src/Exception.php';
        require '../vendor/PHPMailer/src/PHPMailer.php';
        require '../vendor/PHPMailer/src/SMTP.php';
        require '../data/emailData.php';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = $Username;
            $mail->Password = $Password;
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            $mail->CharSet = "UTF-8";
            $mail->Encoding = "base64";

            $mail->setFrom("barbora.chromcakova@seznam.cz","Barbora Chromčáková");
              // Nastavení viditelného odesílatele (bude zobrazeno příjemci)
            $mail->addReplyTo('barbora.chromcakova@seznam.cz', 'Barbora Chromčáková');
            $mail->addAddress($this->email);
            $mail->addBCC('barbora.chromcakova@seznam.cz');
            if($emailWithQRcode){
                $mail->Subject = "Schválení rezervace - vánoční focení";
                // Nastavení předmětu a těla zprávy
                $mail->isHTML(true);
                // Připojení QR kódu jako inline obrázku
                $mail->addEmbeddedImage("../qrcode/qrcode.png", 'qrcode', 'qrcode.png');
                $mail->addAttachment('../qrcode/qrcode.png' );   
                $mail->Body    = "Dobrý den,\nVaše rezervace byla schválena, zaplaťte prosím částku xxxKč do dvou dnů, zde je QR kód:".'<br><img src="cid:qrcode">\nS pozdravem Barbora Chromčáková';
            }else{
                  $mail->Subject = "Rezervace - vánoční focení";
                $mail->Body = "Dobrý den, \nVaše rezervace na \njméno: ".$this->firstName." ". $this->secondName."\nden: ".$this->dateOfReservation. "\nčas: ".$this->timeRange ."\nbyla zaznamenána a čeká na schválení.\nPotvrzení rezervace Vám příjde do emailu během 24 hodin.\nS pozdravem Barbora Chromčáková";
            }
            $mail->send();

            return "";
        } catch (Exception $e) {
            return "Zpráva nebyla odeslána: ". $mail->ErrorInfo;
        }
    }
}