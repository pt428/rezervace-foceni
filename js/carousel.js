
let currentIndex =1;
if( sessionStorage.getItem("slide") != null ){
currentIndex=sessionStorage.getItem("slide");
} 

const images = document.querySelectorAll(".carousel img");
const totalImages = images.length;
const wrapper = document.querySelector(".carousel-wrapper");
 
document.querySelector(".next").addEventListener("click", () => {
  moveToNextSlide();
});

document.querySelector(".prev").addEventListener("click", () => {
  moveToPreviousSlide();
});

function moveToNextSlide() {
  if (currentIndex < totalImages - 1) {
    currentIndex++;
    updateCarousel();
  }

  // Pokud jsme na duplikovaném prvním obrázku, rychle se přesuneme na skutečný první obrázek
  if (currentIndex === totalImages - 1) {
    setTimeout(() => {
      wrapper.style.transition = "none"; // Zrušíme přechod
      currentIndex = 1; // Skutečný první obrázek
      updateCarousel();
      setTimeout(() => {
        wrapper.style.transition = "transform 1s ease"; // Obnovíme přechod
      }, 50); // Malé zpoždění pro plynulý efekt
    }, 1000); // Čas odpovídající délce přechodu (1s)
  }
}

function moveToPreviousSlide() {
  if (currentIndex > 0) {
    currentIndex--;
    updateCarousel();
  }

  // Pokud jsme na duplikovaném posledním obrázku, rychle se přesuneme na skutečný poslední obrázek
  if (currentIndex === 0) {
    setTimeout(() => {
      wrapper.style.transition = "none"; // Zrušíme přechod
      currentIndex = totalImages - 2; // Skutečný poslední obrázek
      updateCarousel();
      setTimeout(() => {
        wrapper.style.transition = "transform 1s ease"; // Obnovíme přechod
      }, 50); // Malé zpoždění pro plynulý efekt
    }, 1000); // Čas odpovídající délce přechodu (1s)
  }
}
function updateCarouselWithoutSlide() {
 
  sessionStorage.setItem("slide", currentIndex);

  const offset = -currentIndex * 800; // Posun podle aktuálního indexu (šířka obrázku)
  wrapper.style.transform = `translateX(${offset}px)`;
  
}
function updateCarousel() {
 
   sessionStorage.setItem("slide", currentIndex);
 
  const offset = -currentIndex * 800; // Posun podle aktuálního indexu (šířka obrázku)
   wrapper.style.transform = `translateX(${offset}px)`;
     
}
