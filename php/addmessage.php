<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");

if(isset($_POST["addmessage"])) {

    if(empty($_POST["message"]) || $_POST["message"] == 'Вашата порака тука...') {
        echo "<script type='text/javascript'>alert('Немате внесено порака!!');</script>";
        exit();
    }
    else
    {
        $korisnik_od = $_SESSION["id_korisnik"];
        $korisnik_do = $_POST['do'];
        $message = $_POST['message'];
        $id_oglas = $_POST['id_oglas'];
    }

    $datum = date ("Y/m/d");
    $chas = date('H:i');

    //id_poraka
    $result = pg_query($dbconn, "select * from poraka");
    $resultArr = pg_fetch_all($result);
    $num_rows = pg_num_rows($result);
    $i = $num_rows + 1;


    //id za korisnik
    $korres = pg_query($dbconn, "select id_korisnik from korisnik 
                                where ime = '" .$korisnik_do. "'");

    $korArr = pg_fetch_all($korres);

    foreach($korArr  as $array)
    {
       $id_korisnik = $array['id_korisnik'];
    }

    $addMessage = pg_query($dbconn, "insert into poraka(id_poraka, korisnik_od, korisnik_do, opis_poraka, id_oglas, datum_pratena, chas_ispratena)
                                         values('".$i."', '".$korisnik_od."', '".$id_korisnik."', '".$message."', '".$id_oglas."', '".$datum."', '".$chas."')");

    echo "<script type='text/javascript'>alert('Вашата порака е успешно испратена!!');</script>";


}

?>