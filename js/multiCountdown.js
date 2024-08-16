 
function startCountdown(targetDate, elementId) {
    // Aktualizace každou sekundu
    const interval = setInterval(() => {
      // Získání aktuálního času a rozdílu od cílového času
      const now = new Date().getTime();
        const maxTime_ms = 60000;
      // Split the date and time
      const [datePart, timePart] = targetDate.split(" ");

      // Split the date into day, month, year
      const [day, month, year] = datePart.split("-");

      // Rearrange to "YYYY-MM-DD" format
      const formattedDateString = `${year}-${month}-${day}T${timePart}`;
      // Create a new Date object
      const dateOfReservation = new Date(formattedDateString);

      // Get the time in milliseconds since the Unix epoch
      const milliseconds = dateOfReservation.getTime();
      const distance =maxTime_ms-  (now - milliseconds ) ;
         
      // Převod na dny, hodiny, minuty a sekundy
      // const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      // const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Zobrazení odpočítávání
      document.getElementById(elementId).innerHTML =  `${minutes}:${ seconds > 9 ? seconds : "0" + seconds}`;
;

      // Pokud odpočítávání skončilo, zastav interval
      if (distance <0) {
        clearInterval(interval);
        document.getElementById(elementId).innerHTML = "EXPIRED";
      }
    if (distance < 0 && distance >-1000) {
      // Reload the page, forcing the reload from the server
      location.reload(true);
    }
    }, 1000);
}



 