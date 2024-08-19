var oldId = 0;
var newId = 0;
function fetchData() {
  if (newId == -10) {
    location.reload(true);
  }
  fetch("checkDBchanges.php")
    .then((response) => response.json())
    .then((data) => {
      //     const container = document.getElementById('data-container');
      //     container.innerHTML = '';
      //     data.forEach(item => {
      //         const div = document.createElement('div');
      //         div.textContent = JSON.stringify(item);
      //         container.appendChild(div);
      //         id=item.id;
      //    });
      // Find the maximum ID
      if (oldId == 0) {
        oldId = Math.max(...data.map((item) => item.id));
      } else {
        oldId = newId;
      }
      
    

      newId = Math.max(...data.map((item) => item.id));
      if (oldId != newId) {
        location.reload(true);
      }
      console.log("New ID:", newId);
      console.log("Old ID:", oldId);
    })
    .catch((error) => {
      newId=-100;
      if(oldId>0){
        newId=-10;
      }
      oldId=-100;
      console.log("New ID:", newId);
      console.log("Old ID:", oldId);
      console.error("Chyba:", error);
    });
    
}

setInterval(fetchData, 5000); // Načítání každých 5 sekund
