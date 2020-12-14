<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");


    $marka = intval($_GET['marka']);
    $karoserija = intval($_GET['karoserija']);
    $registracija = intval($_GET['registracija']);
    $godinaod = intval($_GET['godinaod']);
    $godinado = intval($_GET['godinado']);
    $cenaod = intval($_GET['cenaod']);
    $cenado = intval($_GET['cenado']);
    $menuvac = intval($_GET['menuvac']);
    $gorivo = intval($_GET['gorivo']);




$searching = pg_query($dbconn, "select ggg.slika, ggg.slika1, ggg.slika2, ggg.slika3, o.id_oglas, kk.ime, kk.grad, kk.telefon, kk.email, o.naslov, o.opis_oglas, o.chas, o.datum, m.ime_marka, o.model, o.godina, g.ime_gorivo, mm.ime_menuvac, r.tip_registracija, k.ime_karoserija, b.ime_boja, o.sila, o.cena, o.pominati_kilometri
                                    from oglas as o
                                    natural join marka as m
                                    natural join registracija as r
                                    natural join karoserija as k
                                    natural join boja as b
                                    natural join menuvac as mm
                                    natural join gorivo as g
                                    natural join korisnik as kk
                                    natural join karoserija as kr
                                    natural join foto_galerija as fk
                                    natural join galerija as ggg
                                    where m.id_marka = '".$marka."' and kr.id_karoserija = '".$karoserija."'
                                    and mm.id_menuvac = '".$menuvac."' and r.id_registracija = '".$registracija."'
                                    and g.id_gorivo = '".$gorivo."' and (o.cena between '".$cenaod."' and '".$cenado."')
                                    and (o.godina between '".$godinaod."' and '".$godinado."')
                                    ");

    $num_rows = pg_num_rows($searching);

    $oglasi = pg_fetch_all($searching);

    foreach((array) $oglasi as $array)
    {
        $array['id_oglas'];
        $array['ime'];
        $array['grad'];
        $array['telefon'];
        $array['email'];
        $array['naslov'];
        $array['opis_oglas'];
        $array['chas'];
        $array['datum'];
        $array['ime_marka'];
        $array['model'];
        $array['godina'];
        $array['ime_gorivo'];
        $array['ime_menuvac'];
        $array['tip_registracija'];
        $array['ime_karoserija'];
        $array['ime_boja'];
        $array['sila'];
        $array['cena'];
        $array['pominati_kilometri'];
        $array['slika'];
        $array['slika1'];
        $array['slika2'];
        $array['slika3'];
    }

if($num_rows > 0){
foreach ((array)$oglasi as $array)
echo '
            <!-- car n1 -->
            <div class="card mt-2 classhover bg_color" data-toggle="modal" data-target="#ModalLeft' . $array['id_oglas'] . '">
                <div class="row">
                    <div class="card-body d-flex p-2">
                        <div class="col-4 text-center">
                           <img src='.$array['slika'].' alt="" class=" img-card m-0 rounded">
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-8 ml-4">
                                    <h5>' . $array['naslov'] . '</h5>
                                    <h4><span class="badge badge-primary w-45">' . $array['cena'] . ' €</span></h4>
                                </div>
                                <div class="col-4 text-md-right ml-m6">
                                    <span>' . $array['datum'] . '</span>
                                    <br/>
                                    <span>' . $array['chas'] . '</span>
                                </div>
                            </div>
                            <div class="row custom_mt4 ml-1">
                                <div class="col-3">
                                    <i class="fas fa-road"></i>
                                    <br/>
                                    <span>' . $array['pominati_kilometri'] . '</span>
                                </div>
                                <div class="col-3">
                                     <i class="fas fa-gas-pump"></i>
                                    <br/>
                                    <span>' . $array['ime_gorivo'] . '</span>
                                </div>
                                <div class="col-3">
                                    <i class="fa fa-id-card"></i>
                                    <br/>
                                    <span>' . $array['tip_registracija'] . '</span>
                                </div>
                                <div class="col-3">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <br/>
                                    <span>' . $array['grad'] . '</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal n1 -->
            <div class="modal" id="ModalLeft' . $array['id_oglas'] . '" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white">
                            <h3 class="modal-title">' . $array['naslov'] . '</h3>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times text-white"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center mb-4 ml-2">
                                <h6 class="mt-2">' . $array['opis_oglas'] . '
                                </h6>
                            </div>
                            <div class="row border-bottom text-white">
                                <div class="col-12 p-0">
                                    <!--Carousel Wrapper-->
                                    <div id="carousel-left-' . $array['id_oglas'] . '" class="carousel slide carousel-fade z-depth-1-half" data-ride="carousel">
                                        <!--Indicators-->
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-left-' . $array['id_oglas'] . '" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-left-' . $array['id_oglas'] . '" data-slide-to="1"></li>
                                            <li data-target="#carousel-left-' . $array['id_oglas'] . '" data-slide-to="2"></li>
                                            <li data-target="#carousel-left-' . $array['id_oglas'] . '" data-slide-to="3"></li>
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
                                        <a class="carousel-control-prev" href="#carousel-left-' . $array['id_oglas'] . '" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-left-' . $array['id_oglas'] . '" role="button" data-slide="next">
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
                                    <div><h6 class="float-left mt-1">Марка: </h6><h6 class="float-right mt-1">' . $array['ime_marka'] . '</h6></div>
                                </div>
                                <div class="col-9 border-bottom border-primary">
                                    <div><h6 class="float-left mt-1">Модел: </h6><h6 class="float-right mt-1">' . $array['model'] . '</h6></div>
                                </div>
                                <div class="col-9 border-bottom border-primary">
                                    <div><h6 class="float-left mt-1">Производство: </h6><h6 class="float-right mt-1">' . $array['godina'] . '</h6></div>
                                </div>
                                <div class="col-9 border-bottom border-primary">
                                    <div><h6 class="float-left mt-1">Гориво: </h6><h6 class="float-right mt-1">' . $array['ime_gorivo'] . '</h6></div>
                                </div>
                                <div class="col-9 border-bottom border-primary">
                                    <div><h6 class="float-left mt-1">Менувач: </h6><h6 class="float-right mt-1">' . $array['ime_menuvac'] . '</h6></div>
                                </div>
                                <div class="col-9 border-bottom border-primary">
                                    <div><h6 class="float-left mt-1">Регистрација: </h6><h6 class="float-right mt-1">' . $array['tip_registracija'] . '</h6></div>
                                </div>
                                <div class="col-9 border-bottom border-primary">
                                    <div><h6 class="float-left mt-1">Каросерија: </h6><h6 class="float-right mt-1">' . $array['ime_karoserija'] . '</h6></div>
                                </div>
                                <div class="col-9 border-bottom border-primary">
                                    <div><h6 class="float-left mt-1">Боја: </h6><h6 class="float-right mt-1">' . $array['ime_boja'] . '</h6></div>
                                </div>
                                <div class="col-9 border-bottom border-primary">
                                    <div><h6 class="float-left mt-1">Сила на мотор: </h6><h6 class="float-right mt-1">' . $array['sila'] . '</h6></div>
                                </div>
                                <div class="col-9 border-bottom border-primary">
                                    <div><h6 class="float-left mt-1">Град: </h6><h6 class="float-right mt-1">' . $array['grad'] . '</h6></div>
                                </div>
                                <div class="col-9 border-bottom border-primary">
                                    <div><h6 class="float-left mt-1">Цена: </h6><h6 class="float-right mt-1">' . $array['cena'] . '€</h6></div>
                                </div>

                            </div>
                        </div>
                        <div class="row mt-3 mb-1 justify-content-center">

                            <h5 class="mr-5"><span><i class="fas fa-user mr-1"></i>' . $array['ime'] . '</span></h5>

                            <h5 class="mr-5"><span><i class="fas fa-phone mr-1"></i>0' . $array['telefon'] . '</span></h5>

                            <h5><span><i class="fas fa-envelope mr-1"></i>' . $array['email'] . '</span></h5>
                        </div>
                        <div class="btn btn-dark mt-1" data-dismiss="modal">Затвори</div>
                    </div>
                </div>
            </div>
        ';}
else
{
    echo "<h3>Во моментов нема таков автомобил</h3>";
}
