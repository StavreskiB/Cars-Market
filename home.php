<?php
if(session_status()==PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cars Market</title>

    <!-- Bootstrap -->
    <script src="bootstrap-4.3.1-dist/jquery/jquery-3.5.1.min.js"></script>

    <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap-grid.css">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap-reboot.css">

    <!-- Custom JavaScript-->
    <script src="custom_js/cars-market.js"></script>
    <script src="custom_js/carImages.js"></script>
    <script src="custom_js/backToTop.js"></script>
    <script src="custom_js/sortajax.js"></script>
    <script src="custom_js/searchajax.js"></script>


    <!-- Custom css-->
    <link rel="stylesheet" href="custom_css/cars-market.css">

</head>
<body class="">
<?php?>
<?php
if($_SESSION["id_korisnik"]) {
?>
    <!-- Menu -->
    <header>
        <!--- Navbar --->
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container d-contents">
                <a class="navbar-brand btn btn-sm btn-outline-primary" href="home.php"><?php echo '<i class="fas fa-user mr-2"></i> Здраво '.$_SESSION["ime"].'!'?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nvbCollapse" aria-controls="nvbCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="nvbCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="btn btn-sm btn-outline-primary">
                            <a class="nav-link text-white" href="home.php"><i class="fas fa-car mr-2"></i>Сите огласи</a>
                        </li>
                        <?php
                        $dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");

                        $korres = pg_query($dbconn, "select*
                                            from korisnik
                                            where id_korisnik = '".$_SESSION["id_korisnik"]."' and moderator = 1");

                        $num_rows = pg_num_rows($korres);

                        if($num_rows == 1)
                        {
                            echo '<li class="btn btn-sm btn-outline-primary">
                            <a class="nav-link text-white" href="admin.php"><i class="fas fa-user mr-2"></i>Admin</a>
                                </li>';
                        }
                        ?>

                        <?php
                        $dbconn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=password");

                        $poraka = pg_query($dbconn, "select *
                                            from poraka
                                            where korisnik_do = '".$_SESSION["id_korisnik"]."'");

                        $num_poraka = pg_num_rows($poraka);

                        if($num_poraka > 0)
                        {
                                echo '<li class="btn btn-sm btn-outline-danger">
                                     <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#chat"><i class="fas fa-sms mr-2"></i>Пораки</a>
                                    </li>';
                        }
                        else
                        {
                            echo'<li class="btn btn-sm btn-outline-primary">
                            <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#chat"><i class="fas fa-sms mr-2"></i>Пораки</a>
                                </li>';
                        }

                        ?>

                        <li class="btn btn-sm btn-outline-primary">
                            <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#add"><i class="fas fa-plus mr-2"></i>Додади оглас</a>
                        </li>
                        <li class="btn btn-sm btn-outline-primary">
                            <a class="nav-link text-white" href="php/logout.php"><i class="fas fa-sign-out-alt mr-2"></i>Одјави се!</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--# Navbar #-->
    </header>

    <div class="modal" id="chat" role="dialog">
    <?php require 'php/responsemessage.php' ?>
    </div>

    <!-- Add car -->
    <?php require 'php/addcardata.php'; ?>

    <!--Carousel Wrapper-->
    <section class="mt-4" >
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

            <!--Controls-->
            <section>
                <div class="controls-top d-none">
                    <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
                    <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
                </div>
                <!--/.Controls-->

                <!--Indicators-->
                <ol class="carousel-indicators indicators_margin">
                    <li data-target="#multi-item-example" data-slide-to="0" class="active bg-dark mt-1"></li>
                    <li data-target="#multi-item-example" data-slide-to="1" class="bg-dark mt-1"></li>
                    <li data-target="#multi-item-example" data-slide-to="2" class="bg-dark mt-1"></li>
                </ol>
                <!--/.Indicators-->
            </section>

            <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <!--First slide-->
                <div class="carousel-item active">
                    <?php require 'php/slidercars1.php'?>
                </div>

                <!--Second slide-->
                <div class="carousel-item">
                    <?php require 'php/slidercars2.php'?>
                </div>

                <!--/.Third slide-->
                <div class="carousel-item">
                    <?php require 'php/slidercars3.php'?>
                </div>

            </div>

            <!--/.Slides-->
        </div>
        <!--/.Carousel Wrapper-->
    </section>
    <?php require 'php/Logslidermodals.php' ?>

    <!-- cars logo -->
    <?php require 'php/logocars.php'; ?>

    <!-- Search -->
    <section class="m-5">
        <div class="row justify-content-center" id="fastSearch">
            <div class="col-sm-2 p-1 ml-lg-5">
                <form>
                    <select name="users" class="form-control" onchange="showSort(this.value)">
                        <option value="1">Брзо пребарување</option>
                        <option value="2">Најефтини прво</option>
                        <option value="3">Најскапи прво</option>
                        <option value="4">Нововнесени прво</option>
                    </select>
                </form>
            </div>
            <div class="col-sm-4 p-1 d-inline-flex" id="buttonSearch">
                <button type="button" class="btn btn-primary wrn-btn"><span class="fas fa-search mr-1"></span>Пребарај</button>
                <button id="details" name="details" type="button" class="btn btn-primary wrn-btn ml-3"><span class="fas fa-angle-double-down mr-2"></span>Детално Пребарување</button>
            </div>
        </div>
        <?php require 'php/searchdata.php';?>
    </section>

    <!-- Cars -->
    <section>
        <div class="m-0">
            <div class="row justify-content-xl-center mt-4">

                <!-- Left side -->
                <div class="col-7 mr-5 ml-2" id="scrollbar">
                   <?php require 'php/Logleftcars.php'; ?>

                </div>
                <!-- Right side -->

                <div class="col-3">
                    <?php require 'php/Logrightcars.php'; ?>
                </div>
            </div>
        </div>

    </section>

    <a id="back-to-top" href="#" class="btn btn-dark btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>
    <?php
}
?>
</body>
</html>