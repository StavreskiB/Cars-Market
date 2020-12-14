<?php
ob_start();
if(session_status()==PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
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

    <!-- Menu -->
<header>
    <!--- Navbar --->
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container d-contents">
            <a class="navbar-brand btn btn-sm btn-outline-primary" href="index.php">Продажба на половни автомобили</a>
            <button class="navbar-toggler bg-primary" type="button" data-toggle="collapse" data-target="#nvbCollapse" aria-controls="nvbCollapse">
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="collapse navbar-collapse" id="nvbCollapse">
                <ul class="navbar-nav ml-auto">
                    <a class="btn btn-sm btn-outline-primary navbar-brand m-0" href="index.php"><i class="fas fa-car mr-2"></i>Сите огласи</a>
                    <a class="navbar-brand btn btn-sm btn-outline-primary m-0" href="#" data-toggle="modal" data-target="#LoginModal"><i class="fas fa-sign-in-alt mr-2"></i>Најава и регистрација</a>
                </ul>
            </div>
        </div>
    </nav>
    <!--# Navbar #-->
</header>



<!-- Login Modal -->
<div class="modal" id="LoginModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header justify-content-end">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 text-center border-right">
                        <h3>Најава</h3>
                        <form class="text-left mt-5" method="post">
                            <div class="control-group">
                                <div class="form-group">
                                    <span for="email">Емаил Адреса</span>
                                    <input type="email" class="form-control validated" name="email" id="email">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group">
                                    <label for="lozinka">Лозинка</label>
                                    <input type="password" name="lozinka" class="form-control validate" id="lozinka">
                                    <small id="emailHelp" class="form-text text-muted"><a href="#">Заборавена лозинка?</a></small>
                                </div>
                            </div>
                            <button type="submit" id="btnLogin" name="btnLogin" class="btn btn-primary float-right"><i class="fas fa-sign-in-alt mr-2"></i> Најави се</button>
                        </form>
                    </div>
                    <?php require 'php/login.php'?>

                    <div class="col-6 text-center">
                        <h3>Регистрација</h3>
                        <form class="text-left mt-5" method="post">
                            <div class="form-group">
                                <label for="reg_ime">Име и презиме</label>
                                <input type="text" name="reg_ime" class="form-control" id="reg_ime">
                            </div>
                            <div class="form-group">
                                <label for="reg_kime">Корисничко име</label>
                                <input type="text" name="reg_kime" class="form-control" id="reg_kime">
                            </div>
                            <div class="form-group">
                                <label for="reg_email">Емаил</label>
                                <input type="email" name="reg_email"  class="form-control" id="reg_email">
                            </div>
                            <div class="form-group">
                                <label for="reg_grad">Град на живеење</label>
                                <select id="reg_grad" name="reg_grad"  class="form-control">
                                    <option>Град</option>
                                    <option>Скопје</option>
                                    <option>Охрид</option>
                                    <option>Кичево</option>
                                    <option>Битола</option>
                                    <option>Велес</option>
                                    <option>Куманово</option>
                                    <option>Струмица</option>
                                    <option>Штип</option>
                                    <option>Гевгелија</option>
                                    <option>Тетово</option>
                                    <option>Гостивар</option>
                                    <option>Струга</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="telefon">Телефон</label>
                                <input type="number" name="telefon" class="form-control" id="telefon">
                            </div>

                            <div class="form-group">
                                <label for="reg_lozinka">Лозинка</label>
                                <input type="password" name="reg_lozinka" class="form-control" id="reg_lozinka">
                            </div>

                            <button type="submit" id="registrationBtn" name="registrationBtn" class="btn btn-primary float-right mt-5"><i class="fas fa-sign-in-alt mr-2 "></i> Регистрирај се</button>
                        </form>
                    </div>
                    <?php require 'php/registration.php'?>
                </div>
            </div>
        </div>
    </div>
</div>




<!--Carousel Wrapper-->
<section class="mt-4" id="myslider">
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
<?php require 'php/slidermodals.php'?>

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
            <div class="col-sm-7 mr-5 ml-2" id="scrollbar">
            <?php require 'php/leftcars.php'; ?>
            </div>
            <!-- Right side -->

            <div class="col-sm-3" id="rightcars">
                <?php require 'php/rightcars.php'; ?>
            </div>
        </div>
    </div>

</section>

<a id="back-to-top" href="#" class="btn btn-dark btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>
</body>
</html>
<?php
ob_end_flush();
?>