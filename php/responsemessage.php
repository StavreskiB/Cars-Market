<?php
if(session_status()==PHP_SESSION_NONE) session_start();

$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");

$id_korisnik = $_SESSION["id_korisnik"];
$ime_korisnik = $_SESSION["ime"];

// do kogo
$korres = pg_query($dbconn, "select p.id_poraka, p.id_oglas, prakjac.ime as ispratil, prakjac.id_korisnik as id_ispratil, primac.ime as primil, p.opis_poraka, p.datum_pratena, o.naslov 
                                        from poraka as p
                                        inner join korisnik prakjac on prakjac.id_korisnik = p.korisnik_od
                                        inner join korisnik primac on primac.id_korisnik = p.korisnik_do
                                        inner join oglas as o on o.id_oglas = p.id_poraka
                                        where p.korisnik_do = '".$id_korisnik."' ");

$korArr = pg_fetch_all($korres);

foreach((array)$korArr  as $array)
{
    $id_poraka = $array['id_poraka'];
    $id_oglas = $array['id_oglas'];
    $isprakjac = $array['ispratil'];
    $isprakjac_id = $array['id_ispratil'];
    $primac = $array['primil'];
    $opis_poraka = $array['opis_poraka'];
    $naslov = $array['naslov'];
    $datum = $array['datum_pratena'];
}

$num_rows = pg_num_rows($korres);

if($num_rows > 0) {
    echo '
<div class="modal-dialog modal-lg">
    <div class="modal-content bg-light">
        <div class="modal-header bg-dark text-white">
            <h3 class="modal-title">Пораки</h3>
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times text-white"></i></button>
        </div>
        <div class="modal-body">
            <div class="row d-block">
                <div class="col-8 float-left ml-5">
                    <small class="form-text text-muted" >За огласот со наслов: ' . $naslov . '</small>
                    <textarea disabled rows="3" cols="50" class="text-muted">' . $opis_poraka . '</textarea>
                    <small class="form-text text-muted float-left mt--8" >Испратена од: ' . $isprakjac . '</small> <small class="form-text mt--8 float-left ml-9 text-muted">На: ' . $datum . ' </small>   
                </div>
        
                <form method="post">
                     <div class="col-8 float-right mt-3">
                          <div class="form-group d-none">
                                <label for="odgovorDo">Одговор до</label>
                                <input type="text" name="odgovorDo"  class="form-control" id="odgovorDo" value="' . $isprakjac_id . '">
                          </div>
                  
                          <div class="form-group d-none">
                                <label for="zaoglas">За оглас</label>
                                <input type="text" name="zaoglas"  class="form-control" id="zaoglas" value="' . $naslov . '">
                          </div>
                          
                          <div class="form-group d-none">
                                <label for="odgovorOd">Испраќа</label>
                                 <input type="text" name="odgovorOd"  class="form-control" id="odgovorOd" value="' . $id_korisnik . '">
                           </div>
                           <div class="form-group d-none">
                                <label for="idoglas">Испраќа</label>
                                 <input type="text" name="idoglas"  class="form-control" id="idoglas" value="' . $id_oglas . '">
                           </div>
                            <div class="form-group d-none">
                                <label for="idporaka">Испраќа</label>
                                 <input type="text" name="idporaka"  class="form-control" id="idporaka" value="' . $id_poraka . '">
                           </div>
                           
                           <div class="form-group">
                               <small class="form-text text-muted d-none" for="msg">Остави порака</small>
                               <textarea rows="3" cols="50" class="text-muted" id="msg" name="msg">Вашата порака тука...</textarea>
                           </div>
                           
                           <button type="submit" id="responseBtn" name="responseBtn" class="btn btn-sm btn-dark float-right mr-45">Одговори</button>
                    </div>
               </form>
            </div>  
        </div>
        <div class="btn btn-dark mt-1" data-dismiss="modal">Затвори</div>
    </div>
</div>';

    if (isset($_POST["responseBtn"])) {
        if (empty($_POST["msg"]) || $_POST["msg"] == 'Вашата порака тука...') {
            echo "<script type='text/javascript'>alert('Погрешен внес на податоци!');</script>";
        } else {
            $id_poraka = $_POST['idporaka'];
            $id_oglas = $_POST['idoglas'];
            $msg = $_POST["msg"];
            $zaoglas = $_POST["zaoglas"];
            $odgovorOd = $_POST["odgovorOd"];
            $odgovorDo = $_POST["odgovorDo"];
            $odgovor_datum = date("Y/m/d");
            $chas = date('H:i');

            //id_poraka
            $result = pg_query($dbconn, "select * from poraka");
            $resultArr = pg_fetch_all($result);
            $num_rows = pg_num_rows($result);
            $i = $num_rows;


                $addResponse2 = pg_query($dbconn, "UPDATE poraka
                SET id_poraka = '".$id_poraka."', korisnik_od = '".$odgovorOd."', korisnik_do = '".$odgovorDo."', opis_poraka='".$msg."', id_oglas='".$id_oglas."', datum_pratena='".$odgovor_datum."', chas_ispratena = '".$chas."'
                WHERE id_poraka = '".$id_poraka."';");

            echo "<script type='text/javascript'>alert('Вашата порака е усшено испратена!');</script>";
        }
    }
}

else
{
    echo '
<div class="modal-dialog modal-lg">
    <div class="modal-content bg-light">
        <div class="modal-header bg-dark text-white">
            <h3 class="modal-title">Пораки</h3>
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times text-white"></i></button>
        </div>
        <div class="modal-body">
            <h4>Немате пораки во моментов!</h4> 
        </div>
        <div class="btn btn-dark mt-1" data-dismiss="modal">Затвори</div>
    </div>
</div>';
}

?>