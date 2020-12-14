<?php
//konekcija
$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");


    //dobivanje podatoci za boi
    $boires = pg_query($dbconn, "select ime_boja from boja");

    if (!$boires) {
        echo "Проблем при вчитување на бои.\n";
        exit;
    }
    $boi = pg_fetch_all($boires);

    foreach($boi as $array)
    {
        $array['ime_boja'].'<br/>';
    }


    // dobivanje podatoci za gorivo
    $gorivores = pg_query($dbconn, "select ime_gorivo from gorivo");

    if (!$gorivores) {
        echo "Проблем при вчитување на податоци за горива.\n";
        exit;
    }
    $goriva = pg_fetch_all($gorivores);
    foreach($goriva as $array)
    {
        $array['ime_gorivo'].'<br/>';
    }


    // dobivanje podatoci za tip na registracija
    $regres = pg_query($dbconn, "select tip_registracija from registracija");

    if (!$regres) {
        echo "Проблем при вчитување на податоци за регистрација.\n";
        exit;
    }

    $registracii = pg_fetch_all($regres);

    foreach($registracii as $array)
    {
        $array['tip_registracija'].'<br/>';
    }


    //dobivanje podatoci za karoserija
    $karoserijares = pg_query($dbconn, "select ime_karoserija from karoserija");

    if (!$karoserijares) {
        echo "Проблем при вчитување на податоци за каросерија.\n";
        exit;
    }

    $karoserii = pg_fetch_all($karoserijares);
    foreach($karoserii as $array)
    {
        $array['ime_karoserija'].'<br/>';
    }


    //dobivanje podatoci za tip na menuvac
    $menuvacres = pg_query($dbconn, "select ime_menuvac from menuvac");

    if (!$menuvacres) {
        echo "Проблем при вчитување на податоци за менувач.\n";
        exit;
    }

    $menuvaci = pg_fetch_all($menuvacres);
    foreach($menuvaci as $array)
    {
        $array['ime_menuvac'].'<br/>';
    }

    //dobivanje podatoci za marka na vozilo
    $markares = pg_query($dbconn, "select ime_marka from marka");

    if (!$markares) {
        echo "Проблем при вчитување на податоци за марка на возилото.\n";
        exit;
    }

    $marki = pg_fetch_all($markares);

    foreach($marki as $array) {
        $array['ime_marka']. '<br/>';
    }

?>

<div class="modal" id="add" role="dialog">
    <div class="modal-dialog modal-lg">
           <div class="modal-content">
               <form method="post" action="" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title mt-3">Додади оглас</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mt-5">
                                    <input type="text" class="form-control validate"  id="naslov" name="naslov">
                                    <small class="text-muted" for="naslov"> Наслов на оглас</small>
                                </div>

                                <select class="form-control mt-5" id="marka" name="marka">
                                    <option></option>
                                    <?php foreach($marki as $array)
                                    {
                                        echo '<option>'.$array["ime_marka"].'</option>';
                                    }
                                    ?>
                                </select>
                                <small class="form-text text-muted" for="marka">Марката на возилото</small>

                                <select class="form-control mt-5" id="gorivo" name="gorivo">
                                    <option></option>
                                    <?php foreach($goriva as $array)
                                    {
                                        echo '<option>'.$array["ime_gorivo"].'</option>';
                                    }
                                    ?>
                                </select>
                                <small class="form-text text-muted" for="gorivo">Какво гориво користи возилото</small>

                                <select class="form-control mt-5" id="registracija" name="registracija">
                                    <option></option>
                                    <?php foreach($registracii as $array)
                                    {
                                        echo '<option>'.$array["tip_registracija"].'</option>';
                                    }
                                    ?>
                                </select>
                                <small class="form-text text-muted" for="registracija">Тип на регистрација</small>

                                <select class="form-control mt-5" id="karoserija" name="karoserija">
                                    <option></option>
                                    <?php foreach($karoserii as $array)
                                    {
                                        echo '<option>'.$array["ime_karoserija"].'</option>';
                                    }
                                    ?>
                                </select>
                                <small class="form-text text-muted" for="karoserija">Тип на каросерија</small>

                                <textarea id="opis" name="opis" rows="7" cols="43" class="mt-5 text-muted">...</textarea>
                                <small class="form-text text-muted" for="opis">Опис на вашето возило</small>
                            </div>
                            <div class="col-5">
                                <div class="form-group mt-5">
                                    <input type="text" class="form-control" value="м5, м4, а3..." id="model" name="model">
                                    <small class="form-text text-muted" for="model">Модел на возилото</small>
                                </div>

                                <select class="form-control mt-5" id="boja" name="boja">
                                    <option></option>
                                    <?php foreach($boi as $array)
                                    {
                                        echo '<option>'.$array["ime_boja"].'</option>';
                                    }
                                    ?>
                                </select>
                                <small class="form-text text-muted" for="boja">Боја на возилото</small>

                                <select class="form-control mt-5" id="menuvac" name="menuvac">
                                    <option></option>
                                    <?php foreach($menuvaci as $array)
                                    {
                                        echo '<option>'.$array["ime_menuvac"].'</option>';
                                    }
                                    ?>
                                </select>
                                <small class="form-text text-muted" for="menuvac">Тип на менувач</small>

                                <div class="form-group mt-5">
                                    <input type="number" value="" class="form-control" id="godina" name="godina">
                                    <small class="form-text text-muted" for="godina">Година на производство</small>
                                </div>

                                <div class="form-group mt-5">
                                    <input type="number" class="form-control" value="" id="km" name="km">
                                    <small class="form-text text-muted" for="km">Поминати километри</small>
                                </div>

                                <div class="form-group mt-5">
                                    <input type="number" class="form-control" value="" id="motorkw" name="motorkw">
                                    <small class="form-text text-muted" for="motorkw">Сила на мотор</small>
                                </div>

                                <div class="form-group mt-5">
                                    <input type="number" class="form-control" value="" id="cena" name="cena">
                                    <small class="form-text text-muted" for="cena">Цена на возилото</small>
                                </div>
                            </div>
                            <div class="row m-0">
                                <div class="form-group mt-5 ml-3">
                                    <?php
                                    $max_no_img = 4;
                                    for($i=1; $i<=$max_no_img; $i++){
                                        echo "<tr><td>Images $i</td><td>
                                     <input type=file name='images[]' class='bginput mt-1'></td></tr>";
                                    } ?>
                                </div>
                            </div>
                     </div>
                    </div>
                         <div class="row justify-content-end">
                            <div class="col-4 mr-3 ml-3">
                                <button type="submit" id="newcarBtn" name="newcarBtn" class="btn btn-primary mt-2 mr-5 mb-3"><i class="fas fa-sign-in-alt mr-2 "></i>Додади оглас</button>
                            </div>
                         </div>

               </form>
               <?php require 'addcar.php' ?>

           </div>
    </div>
</div>



