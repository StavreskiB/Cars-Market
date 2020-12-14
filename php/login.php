<?php
ob_start();
if(session_status()==PHP_SESSION_NONE) session_start();

$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");

if(isset($_POST['btnLogin'])){ //check if form was submitted

    if (empty($_POST["email"]) || empty($_POST["lozinka"])) {
        echo "<script type='text/javascript'>alert('Сите полиња мора да се пополнат!');</script>";
    }
    else{
        $email = $_POST["email"];
        $lozinka = $_POST["lozinka"];

        $result = pg_query($dbconn, "select * from korisnik 
											where email = '" . $email . "'
											and lozinka = '" . $lozinka . "'");

        $resultArr = pg_fetch_all($result);

        $num_rows = pg_num_rows($result);
        if($num_rows == 1) {

            foreach ($resultArr as $array) {
                $array['id_korisnik'] . '<br/>';
                $array['ime'] . '<br/>';
                $array['moderator'] . '<br/>';
            }

            if ($num_rows == 1) {
                $_SESSION["id_korisnik"] = $array['id_korisnik'];
                $_SESSION["ime"] = $array['ime'];
                if ($array["moderator"] == 1) {
                    $_SESSION["moderator"] = $array["moderator"];
                }
            }


            if ($array["moderator"]) {
                if (isset($_SESSION["id_korisnik"])) {

                    header("Location:admin.php ");
                    ob_end_flush();
                }
            } else {
                if (isset($_SESSION["id_korisnik"])) {

                    header("Location:home.php ");


                    ob_end_flush();
                }
            }
        } else
        {
            echo "<script type='text/javascript'>alert('Таков корисник не постои!');</script>";
        }
    }
}
