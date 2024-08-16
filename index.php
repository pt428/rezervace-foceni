<?php require"header.php"; ?>
<header></header>
<main>
    <div class="container column justify-content-center align-items-center  ">
        <h1 class="text-center text-white">Vánoční focení 2024</h1>
        <?php  
        include "calendar.php";
         
      
        if (isset($_SESSION['message'])) {?>

        <div class="alert alert-success" role="alert">
            <?php echo   $_SESSION['message'] ;?>
        </div>
        <?php   unset($_SESSION['message']);}?>


    </div>
</main>
 <?php
require 'vendor/autoload.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

try {
    // Generování QR kódu pomocí endroid/qr-code
    $result = Builder::create()
        ->writer(new PngWriter()) // Volba formátu (PNG)
        ->data('https://www.example.com') // Data pro QR kód
        ->size(300) // Velikost QR kódu
        ->margin(10) // Okraj kolem QR kódu
        ->build();

    // Uložení QR kódu do souboru
    $outputFile = __DIR__ . '/qrcode.png';
    $result->saveToFile($outputFile);

    echo "QR kód byl úspěšně uložen do souboru: " . $outputFile;
} catch (Exception $e) {
    echo 'Chyba při generování QR kódu: ',  $e->getMessage();
}
?>

<?php require "footer.php";?>