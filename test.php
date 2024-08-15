<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Carousel</title>
    <style>
        /* Základní stylování karuselu */
        .carousel {
            width: 500px;
            margin: auto;
            overflow: hidden;
            position: relative;
        }

        .carousel-wrapper {
            display: flex;
            transition: transform 1s ease;
        }

        .carousel img {
            width: 500px;
            flex-shrink: 0;
        }

        /* Šipky pro pohyb */
        .prev, .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2em;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            cursor: pointer;
        }

        .prev {
            left: 0;
        }

        .next {
            right: 0;
        }
    </style>
</head>
<body>

<div class="carousel">
    <div class="carousel-wrapper">
        <?php
        // Načtení všech obrázků z adresáře "images"
        $images = glob('images/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
        
        // Duplikujeme poslední obrázek na začátek pro efekt nekonečného posunu
        if (!empty($images)) {
            echo '<img src="' . $images[count($images) - 1] . '">';
        }

        // Zobrazení obrázků v karuselu
        foreach ($images as $image) {
            echo '<img src="' . $image . '">';
        }

        // Duplikujeme první obrázek na konec pro efekt nekonečného posunu
        if (!empty($images)) {
            echo '<img src="' . $images[0] . '">';
        }
        ?>
    </div>
    <span class="prev">&#10094;</span>
    <span class="next">&#10095;</span>
</div>

<script>
    let currentIndex = 1; // Startujeme na prvním obrázku (po duplikátu posledního)
    const images = document.querySelectorAll('.carousel img');
    const totalImages = images.length;
    const wrapper = document.querySelector('.carousel-wrapper');

    document.querySelector('.next').addEventListener('click', () => {
        moveToNextSlide();
    });

    document.querySelector('.prev').addEventListener('click', () => {
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
                wrapper.style.transition = 'none'; // Zrušíme přechod
                currentIndex = 1; // Skutečný první obrázek
                updateCarousel();
                setTimeout(() => {
                    wrapper.style.transition = 'transform 1s ease'; // Obnovíme přechod
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
                wrapper.style.transition = 'none'; // Zrušíme přechod
                currentIndex = totalImages - 2; // Skutečný poslední obrázek
                updateCarousel();
                setTimeout(() => {
                    wrapper.style.transition = 'transform 1s ease'; // Obnovíme přechod
                }, 50); // Malé zpoždění pro plynulý efekt
            }, 1000); // Čas odpovídající délce přechodu (1s)
        }
    }

    function updateCarousel() {
        const offset = -currentIndex * 500;  // Posun podle aktuálního indexu (šířka obrázku)
        wrapper.style.transform = `translateX(${offset}px)`;
    }
</script>

</body>
</html>
