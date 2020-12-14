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

    <!-- Custom css-->
    <link rel="stylesheet" href="custom_css/cars-market.css">


</head>
<body class="">
<?php
if($_SESSION["id_korisnik"]) {
    ?>






        <div class="row w-100 m-0 p-0">
            <div class="col-2 bg-dark">
                <div class="ml-2 mt-3 text-white">
                    <a class="navbar-brand btn btn-sm btn-outline-light" href="#"><?php echo 'Здраво '.$_SESSION["ime"].'!'?>     <?php
                        }
                        ?></a>
                </div>
                <div class="ml-1 mt-3 text-white">
                    <a class="nav-link text-white" href="home.php"><i class="fas fa-home mr-2"></i>Почетна</a>
                    <form method="post" style="text-align-last: left">
                        <button id="getUsers" name="getUsers" type="submit" class="w-100 text-white btn wrn-btn"><i class="fas fa-user mr-2"></i> Корисници</button>
                        <button id="getCars" name="getCars" type="submit" class=" w-100 btn text-white wrn-btn"><i class="fas fa-car mr-2"></i> Огласи</button>
                        <button id="getnewCars" name="getnewCars" type="submit" class=" w-100 btn text-white wrn-btn"><i class="fas fa-check mr-2"></i> Нови огласи</button>
                        <a class="nav-link text-white" href="php/logout.php"><i class="fas fa-sign-out-alt mr-2"></i>Одјави се!</a>
                    </form>
                </div>
            </div>
            <div class="col-10 bg-light">
                <div class="row w-100 mt-5 text-center">
                    <?php require 'php/getdetails.php'?>
                </div>
                <div class="row w-100 mt-5 ml-1">
                    <?php require 'php/getusers.php'?>
                    <?php require 'php/getcars.php'?>
                    <?php require 'php/getnewcars.php'?>
                </div>
            </div>
        </div>


    <a id="back-to-top" href="#" class="btn btn-dark btn-lg back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>

</body>
</html>