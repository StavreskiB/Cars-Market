<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");


//count for bmw
$bmwres = pg_query($dbconn, "select id_oglas
                                    from oglas as o 
                                    inner join marka as m 
                                    on m.id_marka = o.id_oglas
                                    where m.id_marka = 2");

$num_rowsBmw = pg_num_rows($bmwres);

//count for shevrolet
$shevroletres = pg_query($dbconn, "select id_oglas
                                    from oglas as o 
                                    inner join marka as m 
                                    on m.id_marka = o.id_oglas
                                    where m.id_marka = 12");

$num_rowsShevrolet = pg_num_rows($shevroletres);

//count for ford
$fordres = pg_query($dbconn, "select id_oglas
                                    from oglas as o 
                                    inner join marka as m 
                                    on m.id_marka = o.id_oglas
                                    where m.id_marka = 4");

$num_rowsFord = pg_num_rows($fordres);

//count for honda
$hondares = pg_query($dbconn, "select id_oglas
                                    from oglas as o 
                                    inner join marka as m 
                                    on m.id_marka = o.id_oglas
                                    where m.id_marka = 11");

$num_rowsHonda = pg_num_rows($hondares);

//count for hundai
$hundaires = pg_query($dbconn, "select id_oglas
                                    from oglas as o 
                                    inner join marka as m 
                                    on m.id_marka = o.id_oglas
                                    where m.id_marka = 13");

$num_rowsHundai = pg_num_rows($hundaires);


//count for kia
$kiares = pg_query($dbconn, "select id_oglas
                                    from oglas as o 
                                    inner join marka as m 
                                    on m.id_marka = o.id_oglas
                                    where m.id_marka = 14");

$num_rowsKia = pg_num_rows($kiares);


//count for mazda
$mazdares = pg_query($dbconn, "select id_oglas
                                    from oglas as o 
                                    inner join marka as m 
                                    on m.id_marka = o.id_oglas
                                    where m.id_marka = 15");

$num_rowsMazda = pg_num_rows($mazdares);

//count for nissan
$nissanres = pg_query($dbconn, "select id_oglas
                                    from oglas as o 
                                    inner join marka as m 
                                    on m.id_marka = o.id_oglas
                                    where m.id_marka = 16");

$num_rowsNissan = pg_num_rows($nissanres);

//count for opel
$opelres = pg_query($dbconn, "select id_oglas
                                    from oglas as o 
                                    inner join marka as m 
                                    on m.id_marka = o.id_oglas
                                    where m.id_marka = 5");

$num_rowsOpel = pg_num_rows($opelres);

//count for peugeot
$peugeotres  = pg_query($dbconn, "select id_oglas
                                    from oglas as o 
                                    inner join marka as m 
                                    on m.id_marka = o.id_oglas
                                    where m.id_marka = 18");

$num_rowsPeugeot = pg_num_rows($peugeotres);

//count for toyota
$toyotares  = pg_query($dbconn, "select id_oglas
                                    from oglas as o 
                                    inner join marka as m 
                                    on m.id_marka = o.id_oglas
                                    where m.id_marka = 17");

$num_rowsToyota = pg_num_rows($toyotares);
?>



<section class="mt-4 border-bottom border-primary border-top w-98 ml-2" id="logocars">
    <div class="row justify-content-center border-bottom-1 border-dark mt-2 mb-2">
        <div class="col-1 text-center classhover">
            <img src="images/cars_logo/bmw.png" alt="" class="logo_image">
            <small>Бмв </small><small><?php echo '(' .$num_rowsBmw.')'; ?></small>
        </div>
        <div class="col-1 text-center classhover">
            <img src="images/cars_logo/chevrolet.png" alt="" class="logo_image">
            <small>Шевролет </small><small><?php echo '(' .$num_rowsShevrolet.')'; ?></small>
        </div>
        <div class="col-1 text-center classhover">
            <img src="images/cars_logo/ford.png" alt="" class="logo_image">
            <small>Форд </small> <small> <?php echo '(' .$num_rowsFord.')'; ?></small>
        </div>
        <div class="col-1 text-center classhover">
            <img src="images/cars_logo/honda.png" alt="" class="logo_image">
            <small>Хонда</small> <small> <?php echo '(' .$num_rowsHonda.')'; ?></small>
        </div>
        <div class="col-1 text-center classhover">
            <img src="images/cars_logo/hyndai.png" alt="" class="logo_image">
            <small>Хундаи</small><small> <?php echo '(' .$num_rowsHundai.')'; ?></small>
        </div>
        <div class="col-1 text-center classhover">
            <img src="images/cars_logo/kia.png" alt="" class="logo_image">
            <small>Киа</small><small> <?php echo '(' .$num_rowsKia.')'; ?></small>
        </div>
        <div class="col-1 text-center classhover">
            <img src="images/cars_logo/mazda.png" alt="" class="logo_image">
            <small>Мазда</small><small> <?php echo '(' .$num_rowsMazda.')'; ?></small>
        </div>
        <div class="col-1 text-center classhover">
            <img src="images/cars_logo/nissan.png" alt="" class="logo_image">
            <small>Нисан</small><small> <?php echo '(' .$num_rowsNissan.')'; ?></small>
        </div>
        <div class="col-1 text-center classhover">
            <img src="images/cars_logo/opel.png" alt="" class="logo_image">
            <small>Опел</small><small> <?php echo '(' .$num_rowsOpel.')'; ?></small>
        </div>
        <div class="col-1 text-center classhover">
            <img src="images/cars_logo/peugeot.png" alt="" class="logo_image">
            <small>Пежо</small><small> <?php echo '(' .$num_rowsPeugeot.')'; ?></small>
        </div>
        <div class="col-1 text-center classhover">
            <img src="images/cars_logo/toyota.png" alt="" class="logo_image">
            <small>Тојота</small><small> <?php echo '(' .$num_rowsToyota.')'; ?></small>
        </div>
    </div>
</section>
