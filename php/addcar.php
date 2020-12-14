<?php

$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");

if (isset($_POST['newcarBtn'])) { //check if form was submitted

    if (empty($_POST["naslov"]) || empty($_POST["marka"]) || empty($_POST["gorivo"]) || empty($_POST["registracija"]) || empty($_POST["karoserija"]) || empty($_POST["opis"]) || empty($_POST["model"]) || empty($_POST["boja"]) || empty($_POST["menuvac"]) || empty($_POST["godina"]) || empty($_POST["km"]) || empty($_POST["motorkw"]) || empty($_POST["cena"])) {
       echo "<script type='text/javascript'>alert('Погрешен внес на податоци! Обидете се повторно');</script>";
    } else
        {
            $naslov = $_POST["naslov"];
            $marka = $_POST["marka"];
            $gorivo = $_POST["gorivo"];
            $registracija = $_POST["registracija"];
            $karoserija = $_POST["karoserija"];
            $opis = $_POST["opis"];
            $model = $_POST["model"];
            $boja = $_POST["boja"];
            $menuvac = $_POST["menuvac"];
            $godina = $_POST["godina"];
            $km = $_POST["km"];
            $motorkw = $_POST["motorkw"];
            $cena= $_POST["cena"];

    //id za marka
    $markares = pg_query($dbconn, "select id_marka from marka 
											where ime_marka = '" .$marka. "'");

    $markaArr = pg_fetch_all($markares);

    foreach($markaArr as $array)
    {
        $id_marka = $array['id_marka'];
    }

    //id za gorivo
    $gorivores = pg_query($dbconn, "select id_gorivo from gorivo 
											where ime_gorivo = '" .$gorivo. "'");

    $gorivoArr = pg_fetch_all($gorivores);

    foreach($gorivoArr as $array)
    {
        $id_gorivo = $array['id_gorivo'];
    }

    //id za registracija
    $regres = pg_query($dbconn, "select id_registracija from registracija 
											where tip_registracija = '" .$registracija. "'");

    $regArr = pg_fetch_all($regres);

    foreach($regArr as $array)
    {
        $id_registracija = $array['id_registracija'];
    }

    //id za karoserija
    $karoserijares = pg_query($dbconn, "select id_karoserija from karoserija 
											where ime_karoserija = '" .$karoserija. "'");

    $karoserijaArr = pg_fetch_all($karoserijares);

    foreach($karoserijaArr as $array)
    {
        $id_karoserija = $array['id_karoserija'];
    }

    //id za boja
    $bojares = pg_query($dbconn, "select id_boja from boja 
											where ime_boja = '" .$boja. "'");

    $bojaArr = pg_fetch_all($bojares);

    foreach($bojaArr  as $array)
    {
        $id_boja = $array['id_boja'];
    }

    //id za menuvac
    $menres = pg_query($dbconn, "select id_menuvac from menuvac 
											where ime_menuvac = '" .$menuvac. "'");

    $menArr = pg_fetch_all($menres);

    foreach($menArr  as $array)
    {
       $id_menuvac = $array['id_menuvac'];
    }

    //id za oglas
    $result = pg_query($dbconn, "select * from oglas");

    $resultArr = pg_fetch_all($result);

    $num_rows = pg_num_rows($result);

    $i = $num_rows + 1;

    //datum
    $oglas_datum = date ("Y/m/d");

    //chas
    $chas = date('H:i');

    $x = 0;
    $y = 1;

    $id_korisnik = $_SESSION["id_korisnik"];
    $addResult = pg_query($dbconn, "insert into oglas (id_oglas, id_korisnik, id_marka, id_registracija, id_karoserija, id_boja, id_menuvac, id_gorivo, nov_oglas, cena, datum, opis_oglas, godina, naslov, sila, model, pominati_kilometri, chas)
                                 values ('".$i."', '".$id_korisnik."', '".$id_marka."', '".$id_registracija."', '".$id_karoserija."', '".$id_boja."', '".$id_menuvac."', '".$id_gorivo."', '".$x."', '".$cena."', '".$oglas_datum."', '".$opis."', '".$godina."', '".$naslov."', '".$motorkw."', '".$model."', '".$km."', '".$chas."')");
        }

    while(list($key,$value) = each($_FILES['images']['name']))
    {
        $var[$key] = $value;

        if($key == 3) {
            //addImg($var[0], $var[1], $var[2], $var[3]);
            $resultig = pg_query($dbconn, "select * from galerija");
            $num_rowsig = pg_num_rows($resultig);
            $ig = $num_rowsig + 1;

            $adds = pg_query($dbconn, "insert into galerija (id_galerija, ime_slika, slika, slika1, slika2, slika3)
                                                            values ('".$ig."', '".$var[0]."', 'php/uploads/".$var[0]."', 'php/uploads/".$var[1]."', 'php/uploads/".$var[2]."', 'php/uploads/".$var[3]."') ");


            $resultFg = pg_query($dbconn, "select * from foto_galerija");
            $resultArrFg = pg_fetch_all($resultFg);
            $num_rowsFg = pg_num_rows($resultFg);
            $iFg = $num_rowsFg + 1;
            $result = pg_query($dbconn, "insert into foto_galerija (id_foto_galerija, id_oglas, id_galerija)
                                                                values ('".$iFg."', '".$i."' , '".$ig."') ");

        }

        if(!empty($value)){   // this will check if any blank field is entered
            $filename =$value;    // filename stores the value

            $filename=str_replace(" ","_",$filename);// Add _ inplace of blank space in file name, you can remove this line

            $add = "php/uploads/$filename";   // upload directory path is set
            //echo $_FILES['images']['type'][$key];     // uncomment this line if you want to display the file type
            //echo "<br>";                             // Display a line break
            copy($_FILES['images']['tmp_name'][$key], $add);
            echo $add;
            //upload the file to the server
            chmod("$add",0777);
        }
    }

}





                                                                                                            
                                                                                                                                        
