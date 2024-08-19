<?php  
require "../layout/header.php";
require "../database/Database.php";
 

        ?>

<div class="container" style="width:40rem">
    <?php          
    if (isset($_SESSION['message'])) {?>
    <div class="alert alert-success" role="alert">
        <?php echo   $_SESSION['message'] ;?>
    </div>
    <?php   unset($_SESSION['message']);} 
        if (isset($_SESSION['warning'])) {?>
    <div class="alert alert-danger" role="alert">
        <?php echo   $_SESSION['warning'] ;?>
    </div>
    <?php   unset($_SESSION['warning']);}?>
 
    <form action="access.php" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text" id="input-login">Login</span>
            <input type="text" class="form-control" name="login" aria-describedby="input-login" required>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="input-password">Heslo</span>
            <input type="text" class="form-control" name="password" aria-describedby="input-password" required>
        </div>

        <button class="btn btn-success w-100" type="submit">Přihlásit</button>
    </form>
</div>

<?php
require "../layout/footer.php";
?>