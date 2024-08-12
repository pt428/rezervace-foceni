<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">


    <link href="https://duyn491kcolsw.cloudfront.net/files/04/04p/04pi85.css?ph=d6b01b31f0" media="print"
        rel="stylesheet">
    <link href="https://duyn491kcolsw.cloudfront.net/files/3u/3ud/3udbba.css?ph=d6b01b31f0"
        media="screen and (min-width:100000em)" rel="stylesheet" data-type="cq" disabled>
    <link rel="stylesheet" href="https://duyn491kcolsw.cloudfront.net/files/12/12n/12nvq6.css?ph=d6b01b31f0">
    <link rel="stylesheet" href="https://duyn491kcolsw.cloudfront.net/files/1g/1gr/1grpw4.css?ph=d6b01b31f0"
        media="screen and (min-width:37.5em)">
    <link rel="stylesheet" href="https://duyn491kcolsw.cloudfront.net/files/2w/2wo/2wojv0.css?ph=d6b01b31f0"
        data-wnd_color_scheme_file="">
    <link rel="stylesheet" href="https://duyn491kcolsw.cloudfront.net/files/3k/3k4/3k4d3b.css?ph=d6b01b31f0"
        data-wnd_color_scheme_desktop_file="" media="screen and (min-width:37.5em)" disabled="">
    <link rel="stylesheet" href="https://duyn491kcolsw.cloudfront.net/files/1x/1xj/1xjnq7.css?ph=d6b01b31f0"
        data-wnd_additive_color_file="">
    <link rel="stylesheet" href="https://duyn491kcolsw.cloudfront.net/files/46/46f/46fawr.css?ph=d6b01b31f0"
        data-wnd_typography_file="">
    <link rel="stylesheet" href="https://duyn491kcolsw.cloudfront.net/files/27/27o/27o4ov.css?ph=d6b01b31f0"
        data-wnd_typography_desktop_file="" media="screen and (min-width:37.5em)" disabled="">
    <script>
    (() => {
        let e = !1;
        const t = () => {
            if (!e && window.innerWidth >= 600) {
                for (let e = 0, t = document.querySelectorAll(
                        'head > link[href*="css"][media="screen and (min-width:37.5em)"]'); e < t.length; e++)
                    t[e].removeAttribute("disabled");
                e = !0
            }
        };
        t(), window.addEventListener("resize", t), "container" in document.documentElement.style || fetch(document
            .querySelector('head > link[data-type="cq"]').getAttribute("href")).then((e => {
            e.text().then((e => {
                const t = document.createElement("style");
                document.head.appendChild(t), t.appendChild(document.createTextNode(e)),
                    import(
                        "https://duyn491kcolsw.cloudfront.net/client/js.polyfill/container-query-polyfill.modern.js"
                    ).then((() => {
                        let e = setInterval((function() {
                            document.body && (document.body.classList
                                .add("cq-polyfill-loaded"),
                                clearInterval(e))
                        }), 100)
                    }))
            }))
        }))
    })()
    </script>


</head>

<body>
    <header></header>
    <main>
        <?php include("calendar.php") ?>
        <div class="container column justify-content-center align-items-center  ">
            <h1 class="text-center text-white">Vánoční focení 2024</h1>
            

 
<?php 
session_start();
if (isset($_SESSION['message'])) {?>
    
<div class="alert alert-success" role="alert">
  <?php echo   $_SESSION['message'] ;?>
</div> 
 <?php   unset($_SESSION['message']);}?>

            <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/img-1.jpg"  class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/img-2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/img-3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
 <a class="carousel-control-prev" href="#dateCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#dateCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
             <div  class="text-white">
                <h1 id="result">test</h1>
             </div>
 
        </div>
    </main>




</body>
 
<script src="./js/carousel.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

</html>