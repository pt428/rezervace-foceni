<?php
function getBodyEmailWait($firstName,$secondName,$dateOfReservation,$timeRange){

    $bodyOfEmailWait="Dobrý den,
    \nděkujeme za Vaši rezervaci termínu na focení prostřednictvím našeho rezervačního systému. \n\nVaši rezervaci na \nJméno: ".$firstName." ". $secondName."\nDen: ".$dateOfReservation. "\nČas: ".$timeRange ."\n\nnyní zpracováváme a bude potvrzena do 24 hodin.
    \nJakmile bude rezervace potvrzena, obdržíte e-mail s platebními údaji. Prosíme, vyčkejte na tuto zprávu.
    \nV případě dotazů nás neváhejte kontaktovat.
    \nS pozdravem,
    \nBarbora Chromčáková
    \nbarbora.chromcakova@seznam.cz
    \n703 353 464";
    return $bodyOfEmailWait;
}
function getBodyEmailApproved($dateOfReservation,$timeRange){

    $bodyOfEmailApproved="Dobrý den,
    <br>děkujeme za Vaši rezervaci termínu na focení prostřednictvím našeho rezervačního systému. 
    <br><br>Váš termín ".$dateOfReservation." ".$timeRange. " je úspěšně zarezervován a my se na Vás těšíme.
    <br><br>Pro dokončení rezervace prosíme o provedení zálohy ve výši 200,- Kč na číslo účtu 3143593193/0800 do 3 pracovních dnů. 
    <br>Do poznámky napište: termín focení, Vaše příjmení a jméno.
    <br>Nebo použijte pro zaplacení přiložený QR kod a nemusíte nic vyplňovat.:-)
    <br><br>Jakmile platbu obdržíme, zašleme Vám potvrzení o přijetí. V případě jakýchkoli dotazů nás neváhejte kontaktovat.
    <br><br>Těším se na spolupráci!  
    <br><br>S pozdravem,  
    <br>Barbora Chromčáková
    <br>barbora.chromcakova@seznam.cz
    <br>703 353 464";
    return $bodyOfEmailApproved;
}