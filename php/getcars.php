<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");

if(isset($_POST["getCars"])){

    //podatoci za oglas
    $oglasires = pg_query($dbconn, " select o.id_oglas, kk.grad, o.opis_oglas, m.ime_marka, o.model, g.ime_gorivo, mm.ime_menuvac, r.tip_registracija, k.ime_karoserija, o.cena
                                        from oglas as o 
                                        natural join marka as m
                                        natural join registracija as r
                                        natural join karoserija as k
                                        natural join boja as b
                                        natural join menuvac as mm
                                        natural join gorivo as g
                                        natural join korisnik as kk 
                                ");

    $oglasi = pg_fetch_all($oglasires);


    foreach($oglasi as $array)
    {
        $array['id_oglas'].'<br/>';
        $array['grad'].'<br/>';
        $array['opis_oglas'].'<br/>';
        $array['ime_marka'].'<br/>';
        $array['model'].'<br/>';
        $array['ime_gorivo'].'<br/>';
        $array['ime_menuvac'].'<br/>';
        $array['tip_registracija'].'<br/>';
        $array['ime_karoserija'].'<br/>';
        $array['cena'].'<br/>';
    }



    echo' 
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Марка</th>
              <th scope="col">Модел</th>
              <th scope="col">Гориво</th>
              <th scope="col">Регистрација</th>
              <th scope="col">Менувач</th>
              <th scope="col">Каросерија</th>
              <th scope="col">Град</th>
              <th scope="col">Цена</th> 
              <th scope="col">Опис</th> 
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>';

    foreach($oglasi as $array)
        echo '
            <tr><form method="post">
              <div class="form-group d-none">
                  <label for="id_oglas">Ид</label>
                  <input type="text" name="id_oglas"  class="form-control" id="id_oglas" value="'.$array["id_oglas"].'">
              </div>
              <td>'.$array["ime_marka"].'</td>
              <td>'.$array["model"].'</td>
              <td>'.$array["ime_gorivo"].'</td>
              <td>'.$array["tip_registracija"].'</td>
              <th '.$array["ime_menuvac"].'="row">1</th>
              <td>'.$array["ime_karoserija"].'</td>
              <td>'.$array["grad"].'</td>
              <td>'.$array["cena"].'</td>
              <td>'.$array["opis_oglas"].'</td>
              <td><button name="delete" type="submit" class="btn btn-dark"> Изрбиши </button></td></form>
            </tr>';
    echo'
          </tbody>
        </table>
        ';

}
?>

<?php
if(isset($_POST["delete"])){

    $id_oglas = $_POST['id_oglas'];

    $ogres = pg_query($dbconn, "UPDATE oglas
                                        set nov_oglas = 0
                                        where id_oglas ='".$id_oglas."' ");

    echo "<script type='text/javascript'>alert('Огласот е сокриен!');</script>";

}
?>
