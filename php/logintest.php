<?php
if(session_status()==PHP_SESSION_NONE) session_start();

$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");


if(isset($_POST['btnLogin2'])){ //check if form was submitted

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

        foreach($resultArr as $array)
        {
            $array['id_korisnik'].'<br/>';
            $array['ime'].'<br/>';
        }



        if($num_rows == 1)
        {
            $_SESSION["id"] = $array['id_korisnik'];
            $_SESSION["name"] = $array['ime'];
        }



        if(isset($_SESSION["id"])) {
            header("Location:../home.php");

        }
    }
}

echo'
<form class="text-left mt-5" method="post">
                            <div class="control-group">
                                <div class="form-group">
                                    <span for="email">Емаил Адреса</span>
                                    <input type="email" class="form-control validated" name="email" id="email">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group">
                                    <label for="lozinka">Лозинка</label>
                                    <input type="password" name="lozinka" class="form-control validate" id="lozinka">
                                    <small id="emailHelp" class="form-text text-muted"><a href="#">Заборавена лозинка?</a></small>
                                </div>
                            </div>
                            <button type="submit" id="btnLogin2" name="btnLogin2" class="btn btn-primary float-right"><i class="fas fa-sign-in-alt mr-2"></i> Најави се</button>
                        </form>
                            ';
?>