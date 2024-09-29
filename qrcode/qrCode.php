<?php
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
function generateQRcode($data){
  
  
        require '../vendor/autoload.php'; // Načtení autoload z Composeru
     
    //     $iban = generateCzechIBAN("0800","","3143593193");
    //     $qrCodeContent = "SPD*1.0*ACC:" . $iban ."*AM:100.00*CC:CZK*MSG:Platba QR kodem*RN:PAVEL TICHY";
    // echo  $iban;
    // echo  $qrCodeContent;
    
    $qrCode = new QrCode($data);
    $writer = new PngWriter();
    
    // Uložení QR kódu jako obrázek
    $result = $writer->write($qrCode);
    $result->saveToFile('../qrcode/qrcode.png');
    
    
    
 }
?>