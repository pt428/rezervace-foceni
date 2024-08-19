  <?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//  class Email{

//     function send($to, $subject,$Body){

        require '../vendor/PHPMailer/src/Exception.php';
        require '../vendor/PHPMailer/src/PHPMailer.php';
        require '../vendor/PHPMailer/src/SMTP.php';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "neodpovidejte.na.tento.email@gmail.com";
            $mail->Password = "tndazmpqdbaozbar";
            $mail->SMTPSecure = "ssl";
            $mail->Port = 465;
            $mail->CharSet = "UTF-8";
            $mail->Encoding = "base64";

            $mail->setFrom("barbora.chromcakova@seznam.cz","Barbora Chromčáková");
              // Nastavení viditelného odesílatele (bude zobrazeno příjemci)
            $mail->addReplyTo('barbora.chromcakova@seznam.cz', 'Barbora Chromčáková');
            $mail->addAddress("pt75@seznam.cz");
            $mail->Subject = "Rezervace - vánoční focení";
            // $mail->Body = "Dobrý den, \nVaše rezervace byla zaznamenána a čeká na schválení.\nPotvrzení rezervace Vám příjde do emailu během 24 hodin.";
        	   $mail->Body    = 'Toto je e-mail s QR kódem:<br><img src="cid:qrcode">';
   // Nastavení předmětu a těla zprávy
    $mail->isHTML(true);
    // Připojení QR kódu jako inline obrázku
    $mail->addEmbeddedImage("../qrcode.png", 'qrcode', 'qrcode.png');
            $mail->addAttachment('../qrcode.png' );   
            $mail->send();

            echo "Zpráva odeslána";
        } catch (Exception $e) {
            echo "Zpráva nebyla odeslána: ", $mail->ErrorInfo;
        }
//     }
//  }

