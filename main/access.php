<?php
if(isset($_POST["login"]) && isset($_POST["password"])){
    require "../database/Database.php";
    $db=new Database();
    session_start();
    if($db->checkLoginData($_POST["login"], $_POST["password"])>0){
        $_SESSION["admin"]=true;
            header('Location: ../reservation/showall.php');
             exit;
    }else{
        session_start();
        $_SESSION["warning"] = "Neplatné přihlašovací údaje !!!";
         $_SESSION["admin"]=false;
           header('Location: login.php');
             exit;
    }

}