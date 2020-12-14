<?php
session_start();
unset($_SESSION["id_korisnik"]);
unset($_SESSION["ime"]);
header("Location:../index.php");
?>