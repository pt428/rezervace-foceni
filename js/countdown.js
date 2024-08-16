// Doba odpočtu v sekundách (5 minut = 300 sekund)
let countdownTime = 1* 60;

// Funkce pro aktualizaci odpočtu
function updateCountdown() {
  // Vypočítáme minuty a sekundy
  let minutes = Math.floor(countdownTime / 60);
  let seconds = countdownTime % 60;

  // Přidáme nulu před jednociferné sekundy
  if (seconds < 10) {
    seconds = "0" + seconds;
  }

  // Zobrazíme čas
  document.getElementById("countdown").textContent = minutes + ":" + seconds;

  // Zkrátíme zbývající čas
  countdownTime--;

  // Pokud odpočet dosáhne nuly, zastavíme časovač a přesměrujeme na index.php
  if (countdownTime < 0) {
    clearInterval(countdownInterval);
    window.location.href = "../index.php"; // Přesměrování na index.php
  }
}

// Funkce pro kontrolu obnovy stránky
window.onload = function () {
  // Kontrola, jestli byla stránka obnovena
  if (performance.navigation.type === 1) {
    window.location.href = "../index.php"; // Přesměrování na index.php při obnově stránky
  }
};

// Aktualizujeme časovač každou sekundu
let countdownInterval = setInterval(updateCountdown, 1000);
