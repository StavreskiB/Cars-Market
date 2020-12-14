
<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");

?>
<?php


//podatoci za oglas
$oglasires = pg_query($dbconn, "select ggg.slika, o.id_oglas, kk.ime, kk.grad, kk.telefon, kk.email, o.naslov, o.opis_oglas, o.chas, o.datum, m.ime_marka, o.model, o.godina, g.ime_gorivo, mm.ime_menuvac, r.tip_registracija, k.ime_karoserija, b.ime_boja, o.sila, o.cena, o.pominati_kilometri 
                                        from oglas as o 
                                        natural join marka as m
                                        natural join registracija as r
                                        natural join karoserija as k
                                        natural join boja as b
                                        natural join menuvac as mm
                                        natural join gorivo as g
                                        natural join korisnik as kk
                                        natural join foto_galerija as fg
                                        natural join galerija as ggg
                                        where o.nov_oglas = 1
                                        order by o.datum desc ");

$oglasi = pg_fetch_all($oglasires);

$i = 0;



foreach($oglasi as $array)
{
    $array['id_oglas'] . '<br/>';
    $array['ime'] . '<br/>';
    $array['grad'] . '<br/>';
    $array['telefon'] . '<br/>';
    $array['email'] . '<br/>';
    $array['naslov'] . '<br/>';
    $array['opis_oglas'] . '<br/>';
    $array['chas'] . '<br/>';
    $array['datum'] . '<br/>';
    $array['ime_marka'] . '<br/>';
    $array['model'] . '<br/>';
    $array['godina'] . '<br/>';
    $array['ime_gorivo'] . '<br/>';
    $array['ime_menuvac'] . '<br/>';
    $array['tip_registracija'] . '<br/>';
    $array['ime_karoserija'] . '<br/>';
    $array['ime_boja'] . '<br/>';
    $array['sila'] . '<br/>';
    $array['cena'] . '<br/>';
    $array['pominati_kilometri'] . '<br/>';
    $array['slika'] . '<br/>';
}
?>
<?php


foreach ($oglasi as $array)
{
    $i++;
    if($i > 8 && $i <= 12 )
    {
        echo '<div class="col-md-3 float-left classhover" data-toggle="modal" data-target="#ModalTop'.$array['id_oglas'].'">
                    <div class="card mb-2">
                        <img class="card-img-top img-card-slider" alt="" src='.$array['slika'].'>
                        <div class="card-body pb-0 bg_color">
                            <div class="row">
                                <div class="col-12"> <h6>'.$array['naslov'].'</h6></div>
                            </div>
                            <div class="row mt-3 mb-1">
                                <div class="col-8"><span class="small">Автомобили/'.$array['grad'].'</span></div>
                                <h5><span class="badge badge-dark text-white ml-2 w-100">'.$array['cena'].' €</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            ';
    }

}
?>