<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");

//pronaogjanje marki na vozilo
$markares = pg_query($dbconn, "select id_marka, ime_marka 
                                      from marka");

$marki = pg_fetch_all($markares);

foreach($marki as $array) {
    $array['id_marka']. '<br/>';
    $array['ime_marka']. '<br/>';
}


//pronaogjanje karoserija
$karosres = pg_query($dbconn, "select id_karoserija, ime_karoserija
                                    from karoserija ");

$karoserii = pg_fetch_all($karosres);

foreach($karoserii as $array) {
    $array['id_karoserija']. '<br/>';
    $array['ime_karoserija']. '<br/>';
}



//pronaogjanje tip na registracija

$regres = pg_query($dbconn, "select id_registracija, tip_registracija
                                     from registracija
                                    ");

$registracija = pg_fetch_all($regres);

foreach($registracija as $array) {
    $array['id_registracija']. '<br/>';
    $array['tip_registracija']. '<br/>';
}


//pronaogjanje tip na menuvac
$menuvacres = pg_query($dbconn, "select id_menuvac, ime_menuvac from menuvac");

$menuvaci = pg_fetch_all($menuvacres);
foreach($menuvaci as $array)
{
    $array['id_menuvac'].'<br/>';
    $array['ime_menuvac'].'<br/>';
}


//pronaogjanje tipovi na gorivo
$gorivores = pg_query($dbconn, "select id_gorivo, ime_gorivo from gorivo");

$goriva = pg_fetch_all($gorivores);
foreach($goriva as $array)
{
    $array['id_gorivo'].'<br/>';
    $array['ime_gorivo'].'<br/>';
}
?>


<div class="container mt-5" style="display:none" id="searching">

<form>

    <div class="row justify-content-center">
        <div class="col-sm-3 w-50 p-1">
            <select class="form-control" id="ime_marka">
                <?php foreach($marki as $array)
                {
                    echo '<option value="'.$array["id_marka"].'">'.$array["ime_marka"].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="col-sm-3 w-50 p-1">
            <select class="form-control" id="tip_karoserija">
                <?php foreach($karoserii as $array)
                {
                    echo '<option value="'.$array["id_karoserija"].'">'.$array["ime_karoserija"].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="col-sm-3 w-50 p-1">
            <select class="form-control" id="tip_registracija">
                <?php foreach($registracija as $array)
                {
                    echo '<option value="'.$array["id_registracija"].'">'.$array["tip_registracija"].'</option>';
                }
                ?>
            </select>
        </div>
    </div>


    <div class="row justify-content-center mt-3">
        <div class="col-sm-3">
            <h5>Година на производство</h5>
        </div>

        <select class="form-control col-sm-2 w-50 ml-5 p-1" id="godinaod">
            <option value="2003">2003</option>
            <option value="2004">2004</option>
            <option value="2005">2005</option>
            <option value="2006">2006</option>
            <option value="2007">2007</option>
            <option value="2008">2008</option>
            <option value="2009">2009</option>
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
        </select>

        <select class="form-control ml-3 col-sm-2 w-50 p-1" id="godinado">
            <option value="2010">2010</option>
            <option value="2011">2011</option>
            <option value="2012">2012</option>
            <option value="2013">2013</option>
            <option value="2014">2014</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
        </select>
    </div>

    <div class="row mt-3 justify-content-center">
        <div class="col-sm-3">
            <h5>Цена</h5>
        </div>

        <select class="form-control col-sm-2 w-50 ml-5 p-1"  id="cenaod">
            <option value="0">0</option>
            <option value="1000">1000</option>
            <option value="3000">3000</option>
            <option value="5000">5000</option>
            <option value="10000">10000</option>
            <option value="15000">15000</option>
            <option value="20000">20000</option>
        </select>
        <select class="form-control ml-3 col-sm-2 w-50 p-1"  id="cenado">
            <option value="3000">3000</option>
            <option value="5000">5000</option>
            <option value="8000">8000</option>
            <option value="10000">10000</option>
            <option value="15000">15000</option>
            <option value="20000">20000</option>
            <option value="50000">50000</option>
            <option value="100000">100000</option>
        </select>
    </div>

    <div class="row mt-3 justify-content-center">
        <div class="col-sm-3 p-1">
            <h5>Менувач</h5>
        </div>
        <div class="col-sm-4 w-50 ml-5 p-1">
            <select class="form-control"  id="ime_menuvac">
                <?php foreach($menuvaci as $array)
                {
                    echo '<option value="'.$array["id_menuvac"].'">'.$array["ime_menuvac"].'</option>';
                }
                ?>
            </select>
        </div>
    </div>


    <div class="row mt-3 justify-content-center">
        <div class="col-sm-3 p-1">
            <h5>Гориво</h5>
        </div>
        <div class="col-sm-4 w-50 ml-5 p-1">
            <select class="form-control" id="ime_gorivo">
                <?php foreach($goriva as $array)
                {
                    echo '<option value="'.$array["id_gorivo"].'">'.$array["ime_gorivo"].'</option>';
                }
                ?>
            </select>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-3">
            <button  type="button" onclick="showSearch()" class="btn btn-primary wrn-btn w-100"><span class="fas fa-search mr-1"></span>Пребарај</button>
        </div>
    </div>


</form>

</div>