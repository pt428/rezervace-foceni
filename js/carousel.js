// const carusel = document.querySelector(".carousel-control-next");
// carusel.addEventListener("click", () => {
//     console.log("klik");
//     var currentIndex = event.to; // Index of the new slide
//     var date = ""; // Initialize variable for date

//     // Map slide index to a date string
//     switch (currentIndex) {
//       case 0:
//         date = "2024-01-01";
//         break;
//       case 1:
//         date = "2024-02-01";
//         break;
//       case 2:
//         date = "2024-03-01";
//         break;
//       default:
//         date = "Unknown Date";
//         break;
//     }

//     // Send the new date to the server via GET request
//     var xhr = new XMLHttpRequest();
//     xhr.open("GET", "update_date.php?date=" + encodeURIComponent(date), true);
//     xhr.onload = function () {
//       if (xhr.status === 200) {
//         // Update the result element with the server response
//         document.getElementById("result").textContent = xhr.responseText;
//       } else {
//         console.error("Error updating date");
//       }
//     };
//     xhr.send();
// }) 