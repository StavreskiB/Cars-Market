<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");

$countkorisnici = pg_query($dbconn, " select count(ime) as vkupno
                                        from korisnik
                                ");

$korisnici = pg_fetch_all($countkorisnici);

foreach ($korisnici as $array)
{
   $vkupno_korisnici = $array["vkupno"];
}

$countoglasi = pg_query($dbconn, " select count(id_oglas) as vkupno_o
                                          from oglas
                                ");

$oglasi = pg_fetch_all($countoglasi);

foreach ($oglasi as $array)
{
    $vkupno_oglasi = $array["vkupno_o"];
}

$countmod = pg_query($dbconn, " select count(id_korisnik) as moderatori
                                        from korisnik
                                        where moderator = 1
                                ");

$moderatori = pg_fetch_all($countmod);

foreach ($moderatori as $array)
{
    $moderatori = $array["moderatori"];
}



echo'
<div class="col-4">
                        <h3>Вкупен број на корисници</h3>
                        <img class="adminimage" src="images/admin/korisnici.png">
                        <h3 class="mt-3">'.$vkupno_korisnici.'</h3>
                    </div>
                    <div class="col-4">
                        <h3>Вкупен број на огласи</h3>
                        <img class=" mt-5 adminimage" src="images/admin/oglasi.png">
                        <h3 class=""> '.$vkupno_oglasi.' </h3>
                    </div>
                    <div class="col-4">
                        <h3>Вкупно модератори</h3>
                        <img class=" mt-5 adminimage" src="images/admin/marka.png">
                        <h3 class=""> '.$moderatori.' </h3>
                    </div>';
?>