<?php

function generateCzechIBAN($bankCode, $accountPrefix, $accountNumber) {
    // Kód země pro Českou republiku
    $countryCode = 'CZ';
    
    // Doplnění bankovního kódu na 4 číslice
    $bankCode = str_pad($bankCode, 4, '0', STR_PAD_LEFT);
    
    // Doplnění předčíslí na 6 číslic (pokud existuje)
    $accountPrefix = str_pad($accountPrefix, 6, '0', STR_PAD_LEFT);
    
    // Doplnění čísla účtu na 10 číslic
    $accountNumber = str_pad($accountNumber, 10, '0', STR_PAD_LEFT);
    
    // Spojení celého čísla účtu bez kontrolních číslic
    $accountNumberComplete = $bankCode . $accountPrefix . $accountNumber;
    
    // Převod písmen na čísla (A=10, B=11, ..., Z=35)
    $ibanNumeric = $accountNumberComplete . '1235' . '00'; // CZ = 1235, kontrolní číslice = 00
    
    // Výpočet zbytku po dělení 97
    $remainder = intval(bcmod($ibanNumeric, '97'));
    
    // Výpočet kontrolních číslic
    $checkDigits = str_pad(98 - $remainder, 2, '0', STR_PAD_LEFT);
    
    // Složení konečného IBAN
    $iban = $countryCode . $checkDigits . $accountNumberComplete;
    // echo "Vygenerovaný IBAN: " . $iban;
    return $iban;
}

// // Testování
// $bankCode = '0800'; // Příklad kódu banky (např. Česká spořitelna)
// $accountPrefix = ''; // Předčíslí účtu (pokud není, nechte prázdné)
// $accountNumber = '1234567890'; // Příklad čísla účtu

// $iban = generateCzechIBAN($bankCode, $accountPrefix, $accountNumber);

?>
