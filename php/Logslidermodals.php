
<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");

?>
<?php


//podatoci za oglas
$oglasires = pg_query($dbconn, "select o.id_oglas, gg.slika, gg.slika1, gg.slika2, gg.slika3, kk.ime, kk.grad, kk.telefon, kk.email, o.naslov, o.opis_oglas, o.chas, o.datum, m.ime_marka, o.model, o.godina, g.ime_gorivo, mm.ime_menuvac, r.tip_registracija, k.ime_karoserija, b.ime_boja, o.sila, o.cena, o.pominati_kilometri 
                                        from oglas as o 
                                        natural join marka as m
                                        natural join registracija as r
                                        natural join karoserija as k
                                        natural join boja as b
                                        natural join menuvac as mm
                                        natural join gorivo as g
                                        natural join korisnik as kk 
                                        natural join foto_galerija as fg 
                                        natural join galerija as gg

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
    $array['slika1'] . '<br/>';
    $array['slika2'] . '<br/>';
    $array['slika3'] . '<br/>';
}


?>
<?php require 'addmessage.php'; ?>
<?php
foreach ($oglasi as $array)
{
    echo '
          <div class="modal" id="ModalTop'.$array['id_oglas'].'" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h3 class="modal-title">'.$array['naslov'].'</h3>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times text-white"></i></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center mb-4 ml-2">
                    <h6 class="mt-2">'.$array['opis_oglas'].'
                    </h6>
                </div>
                <div class="row border-bottom text-white">
                    <div class="col-12 p-0">
                        <!--Carousel Wrapper-->
                        <div id="carousel-top-'.$array['id_oglas'].'" class="carousel slide carousel-fade z-depth-1-half" data-ride="carousel">
                            <!--Indicators-->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-top-'.$array['id_oglas'].'" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-top-'.$array['id_oglas'].'" data-slide-to="1"></li>
                                <li data-target="#carousel-top-'.$array['id_oglas'].'" data-slide-to="2"></li>
                                <li data-target="#carousel-top-'.$array['id_oglas'].'" data-slide-to="3"></li>
                            </ol>
                            <!--/.Indicators-->
                            <!--Slides-->
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <div class="view">
                                        <img class="d-block img-modal" src='.$array['slika'].' alt="Прв слајд">
                                        <div class="mask rgba-black-light"></div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <!--Mask color-->
                                    <div class="view">
                                        <img class="d-block img-modal" src='.$array['slika1'].' alt="Втор слајд">
                                        <div class="mask rgba-black-light"></div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <!--Mask color-->
                                    <div class="view">
                                        <img class="d-block img-modal" src='.$array['slika2'].' alt="Трет слајд">
                                        <div class="mask rgba-black-light"></div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <!--Mask color-->
                                    <div class="view">
                                        <img class="d-block img-modal" src='.$array['slika3'].' alt="Четврти слајд">
                                        <div class="mask rgba-black-light"></div>
                                    </div>
                                </div>
                            </div>
                            <!--/.Slides-->
                            <!--Controls-->
                            <a class="carousel-control-prev" href="#carousel-top-'.$array['id_oglas'].'" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-top-'.$array['id_oglas'].'" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            <!--/.Controls-->
                        </div>
                        <!--/.Carousel Wrapper-->
                    </div>
                </div>
                <div class="row justify-content-center mt-4">

                    <div class="col-12">
                        <h5><i class="fa fa-align-justify mr-2" aria-hidden="true"></i>Карактеристика на возилото</h5>
                    </div>
                    <div class="col-9 mt-2 border-bottom border-primary">
                        <div><h6 class="float-left mt-1">Марка: </h6><h6 class="float-right mt-1">'.$array['ime_marka'].'</h6></div>
                    </div>
                    <div class="col-9 border-bottom border-primary">
                        <div><h6 class="float-left mt-1">Модел: </h6><h6 class="float-right mt-1">'.$array['model'].'</h6></div>
                    </div>
                    <div class="col-9 border-bottom border-primary">
                        <div><h6 class="float-left mt-1">Производство: </h6><h6 class="float-right mt-1">'.$array['godina'].'</h6></div>
                    </div>
                    <div class="col-9 border-bottom border-primary">
                        <div><h6 class="float-left mt-1">Гориво: </h6><h6 class="float-right mt-1">'.$array['ime_gorivo'].'</h6></div>
                    </div>
                    <div class="col-9 border-bottom border-primary">
                        <div><h6 class="float-left mt-1">Менувач: </h6><h6 class="float-right mt-1">'.$array['ime_menuvac'].'</h6></div>
                    </div>
                    <div class="col-9 border-bottom border-primary">
                        <div><h6 class="float-left mt-1">Регистрација: </h6><h6 class="float-right mt-1">'.$array['tip_registracija'].'</h6></div>
                    </div>
                    <div class="col-9 border-bottom border-primary">
                        <div><h6 class="float-left mt-1">Каросерија: </h6><h6 class="float-right mt-1">'.$array['ime_karoserija'].'</h6></div>
                    </div>
                    <div class="col-9 border-bottom border-primary">
                        <div><h6 class="float-left mt-1">Боја: </h6><h6 class="float-right mt-1">'.$array['ime_boja'].'</h6></div>
                    </div>
                    <div class="col-9 border-bottom border-primary">
                        <div><h6 class="float-left mt-1">Сила на мотор: </h6><h6 class="float-right mt-1">'.$array['sila'].'</h6></div>
                    </div>
                    <div class="col-9 border-bottom border-primary">
                        <div><h6 class="float-left mt-1">Град: </h6><h6 class="float-right mt-1">'.$array['grad'].'</h6></div>
                    </div>
                    <div class="col-9 border-bottom border-primary">
                         <div><h6 class="float-left mt-1">Цена: </h6><h6 class="float-right mt-1">'.$array["cena"].' €</h6></div>
                    </div>
                </div>
            </div>
                <div class="row mb-1 justify-content-center">
                    <form method="post">
                        <div class="col-12 text-center">
                            <div class="form-group d-none">
                                 <label for="do">Корисник</label>
                                 <input type="text" name="do"  class="form-control" id="do" value="'.$array['ime'].'">
                            </div>
                            <div class="form-group d-none">
                                  <label for="id_oglas">Емаил</label>
                                  <input type="text" name="id_oglas"  class="form-control" id="id_oglas" value="'.$array['id_oglas'].'">
                            </div>
                            <div class="form-group">
                                   <textarea id="message" name="message" rows="3" cols="50" class="mt-5 text-muted">Вашата порака тука...</textarea>
                                  <small class="form-text text-muted d-none" for="message">Остави порака</small>
                            </div>
                        </div>
                            <div class="col-12 text-center">
                                  <button class="btn text-muted" id="addmessage" name="addmessage">Испрати</button>
                             </div>
                    </form>
               </div>
            <div class="row mt-3 mb-1 justify-content-center">

                <h5 class="mr-5"><span><i class="fas fa-user mr-1"></i>'.$array['ime'].'</span></h5>

                <h5 class="mr-5"><span><i class="fas fa-phone mr-1"></i>'.$array['telefon'].'</span></h5>

                <h5><span><i class="fas fa-envelope mr-1"></i>'.$array['email'].'</span></h5>
            </div>
            <div class="btn btn-dark mt-1" data-dismiss="modal">Затвори</div>
        </div>
    </div>
</div>
    ';
}