<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");

if (isset($_POST['registrationBtn'])) { //check if form was submitted


    if (empty($_POST["reg_ime"]) || empty($_POST["reg_kime"]) || empty($_POST["reg_email"]) || empty($_POST["reg_grad"]) || $_POST["reg_grad"] == 'Град' || empty($_POST["telefon"]) || empty($_POST["reg_lozinka"])) {
        echo "<script type='text/javascript'>alert('Погрешен внес на податоци! Обидете се повторно');</script>";
    }
    else{


        $reg_ime = $_POST["reg_ime"];
        $reg_kime = $_POST["reg_kime"];
        $reg_email = $_POST["reg_email"];
        $reg_grad = $_POST["reg_grad"];
        $telefon = $_POST["telefon"];
        $lozinka = $_POST["reg_lozinka"];

        $moderator = 0;

        $korisnik_datum = date ("Y/m/d");

        $result = pg_query($dbconn, "select * from korisnik");

        $resultArr = pg_fetch_all($result);

        $num_rows = pg_num_rows($result);

        $i = $num_rows + 1;

        $addResult = pg_query($dbconn, "insert into korisnik(id_korisnik, ime, k_ime, email, grad, telefon, lozinka, moderator, korisnik_datum)
								   VALUES('".$i."', '".$reg_ime."', '".$reg_kime."', '".$reg_email."', '".$reg_grad."', '".$telefon."', '".$lozinka."', '".$moderator."' , '".$korisnik_datum."')");


    }


}



