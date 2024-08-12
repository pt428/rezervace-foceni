<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervační formulař</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="width:40rem">
        <form action="add.php" method="get">
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-date">Datum</span>
                <input type="text" value="<?php echo $_GET["date"] ; ?>" class="form-control" name="dateOfReservation"
                    aria-describedby="input-date" readonly required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-time-range">Čas</span>
                <input type="text" value="<?php echo $_GET["timeRange"] ; ?>" class="form-control" name="timeRange"
                    aria-describedby="input-time-range" readonly required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-first-name">Jméno</span>
                <input type="text" class="form-control" name="firstName" aria-describedby="input-first-name" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-second-name">Příjmení</span>
                <input type="text" class="form-control" name="secondName" aria-label="SecondName"
                    aria-describedby="input-second-name" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-email">Email</span>
                <input type="email" class="form-control" name="email" aria-label="Email" aria-describedby="input-email"
                    required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-phone">Telefon</span>
                <input type="tel" class="form-control" name="phone" aria-label="Phone" aria-describedby="input-phone"
                    required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-number-of-photos">Počet fotek</span>
                <input type="number" value="5" step="5"  min="5" max="10" class="form-control" name="numberOfPhotos"
                     aria-describedby="input-number-of-photos" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-number-of-dogs">Počet focených psů</span>
                <input type="number" value="0" min="0" max="2" class="form-control" name="numberOfDogs"
                     aria-describedby="input-number-of-dogs" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-number-of-adults">Počet focených dospělých</span>
                <input type="number" value="0" min="0" max="2" class="form-control" name="numberOfAdults"
                    aria-label="NumberOfAdults" aria-describedby="input-number-of-adults" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-number-of-children">Počet focených dětí</span>
                <input type="number" value="0" min="0" max="4" class="form-control" name="numberOfChildren"
                    aria-label="NumberOfChildren" aria-describedby="input-number-of-children" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="input-note">Poznámka</span>
                <textarea type="text" maxlength="490" class="form-control" name="note" aria-label="Note"
                    aria-describedby="input-note"></textarea>
            </div>
            <input type="submit">
        </form>
    </div>
</body>

</html>