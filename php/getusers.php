<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");
if(isset($_POST["getUsers"])){

    $result = pg_query($dbconn, "select k.id_korisnik, k.ime, k.k_ime, k.email, k.grad, k.telefon, k.moderator ,k.korisnik_datum
                                        from korisnik as k");

    $resultArr = pg_fetch_all($result);


    foreach($resultArr as $array)
    {
        $array['id_korisnik'].'<br/>';
        $array['ime'].'<br/>';
        $array['k_ime'].'<br/>';
        $array['email'].'<br/>';
        $array['grad'].'<br/>';
        $array['telefon'].'<br/>';
        $array['moderator'].'<br/>';
        $array['korisnik_datum'].'<br/>';
    }




       echo' 
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Реден број</th>
              <th scope="col">Име</th>
              <th scope="col">Корисничко име</th>
              <th scope="col">Емаил</th>
              <th scope="col">Град</th>
              <th scope="col">Телефон</th>
              <th scope="col">Модератор</th>
              <th scope="col"></th> 
              <th scope="col"></th> 
            </tr>
          </thead>
          <tbody>';

    foreach($resultArr as $array)
        echo '
            <tr>
              <form method="post">
              <div class="form-group d-none">
                  <label for="id_korisnik">Ид</label>
                  <input type="text" name="id_korisnik"  class="form-control" id="id_korisnik" value="'.$array["id_korisnik"].'">
              </div>
              <th scope="row">'.$array["id_korisnik"].'</th>
              <td>'.$array["ime"].'</td>
              <td>'.$array["k_ime"].'</td>
              <td>'.$array["email"].'</td>
              <td>'.$array["grad"].'</td>
              <td>'.$array["telefon"].'</td>
              <td>'.$array["moderator"].'</td>
              <td><button name="ban" type="submit" class="btn btn-dark"> Банирај </button></td>
              <td><button name="moderator" type="submit" class="btn btn-dark"> Постави модератор </button></td></form>
            </tr>';
    echo'
          </tbody>
        </table>
        ';

}
?>

<?php
if(isset($_POST["ban"])){

    $id_korisnik = $_POST['id_korisnik'];

    $korres = pg_query($dbconn, "DELETE FROM korisnik as k
                                        WHERE k.id_korisnik ='".$id_korisnik."' ");

    echo "<script type='text/javascript'>alert('Корисникот е баниран!');</script>";

}

if(isset($_POST["moderator"])){

    $id_korisnik = $_POST['id_korisnik'];

    $korres = pg_query($dbconn, "UPDATE korisnik
                                        set moderator = 1
                                        where id_korisnik ='".$id_korisnik."' ");

    echo "<script type='text/javascript'>alert('Променет е статусот во модератор!');</script>";

}


?>

