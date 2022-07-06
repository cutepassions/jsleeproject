<html>
<title>JSLEEPROJECT</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="img/favicon.png" type="image/png">
<title>JSLEEPROJECT</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="vendors/linericon/style.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
<!-- main css -->
<link rel="stylesheet" href="css/style.css">

<head>

</head>
<?php
session_start();
if (isset($_SESSION["userid"]))
    $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"]))
    $username = $_SESSION["username"];
else $username = "";
if (isset($_SESSION["userlevel"]))
    $userlevel = $_SESSION["userlevel"];
else $userlevel = "";
if (isset($_SESSION["userpoint"]))
    $userpoint = $_SESSION["userpoint"];
else $userpoint = "";
?>
<?php
if ( !$userid )
{
    echo("
<script>
    alert('로그인 후 이용해주세요');
    history.go(-1)
</script>
");
    exit;
}
?>

<body>
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.php"><img src="img/logo2.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-end">
                        <li class="nav-item active"><a class="nav-link" href="index.php">홈</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">소개</a></li>
                        <!--li class="nav-item"><a class="nav-link" href="services.html">Services</a></li-->
                        <li class="nav-item"><a class="nav-link" href="professor.php">교수진</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">전공</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="major_board.php">1학년</a></li>
                                <li class="nav-item"><a class="nav-link" href="major_board.php">2학년</a></li>
                                <li class="nav-item"><a class="nav-link" href="major_board.php">3학년</a></li>
                                <li class="nav-item"><a class="nav-link" href="major_board.php">4학년</a></li>
                            </ul>
                        </li>
                        <?php
                        if(!$userid) {
                            ?>
                            <li class="nav-item"><a class="nav-link" href="login_form.php">로그인</a></li>
                        <?php } ?>
                        <?php
                        if ($userid=='admin') {
                            ?>
                            <li class="nav-item"><a class="nav-link" href="#">회원관리</a></li>
                        <?php } ?>
                        <?php
                        if($userid){
                            ?>
                            <li class="nav-item"><a class="nav-link" href="logout.php">로그아웃</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<div class="container-fluid bg-gradient p-5">
    <div class="row m-auto text-center w-75">

        <div class="col-3 princing-item green">
            <div class="pricing-divider ">
                <h4 class="my-0 display-4 text-light font-weight-normal mb-3"><span class="h3">$</span> 450 <span class="h5">/mo</span></h4>
                <svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'></svg>
            </div>
            <div class="card-body bg-white mt-0 shadow">
                <ul class="list-unstyled mb-5 position-relative">
                    <br>
                    <form name = 'lecture1' action="major_board_form.php" method="post">
                    <li>
                        <h3>데이터분석과프로그래밍</h3>
                        <input type="hidden" name="lecture" value="데이터분석과프로그래밍">
                    </li>
                    <br>
                    <li>최숙영</li>
                        <input type="hidden" name="professor" value="최숙영">

                </ul>
                <button type="button" class="btn btn-lg btn-block  btn-custom " onclick="document.lecture1.submit();">평가하기</button>
                </form>
            </div>
        </div>

        <div class="col-3 princing-item green">
            <div class="pricing-divider ">
                <h4 class="my-0 display-4 text-light font-weight-normal mb-3"><span class="h3">$</span> 450 <span class="h5">/mo</span></h4>
                <svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'></svg>
            </div>
            <div class="card-body bg-white mt-0 shadow">
                <ul class="list-unstyled mb-5 position-relative">
                    <br>
                    <form name = 'lecture2' action="major_board_form.php" method="post">
                        <li>
                            <h3>보안데이터베이스프로젝트</h3>
                            <input type="hidden" name="lecture" value="보안데이터베이스프로젝트">
                        </li>
                        <br>
                        <li>윤여창</li>
                        <input type="hidden" name="professor" value="윤여창">

                </ul>
                <button type="button" class="btn btn-lg btn-block  btn-custom " onclick="document.lecture2.submit();">평가하기</button>
                </form>
            </div>
        </div>

        <div class="col-3 princing-item green">
            <div class="pricing-divider ">
                <h4 class="my-0 display-4 text-light font-weight-normal mb-3"><span class="h3">$</span> 450 <span class="h5">/mo</span></h4>
                <svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'></svg>
            </div>
            <div class="card-body bg-white mt-0 shadow">
                <ul class="list-unstyled mb-5 position-relative">
                    <br>
                    <form name = 'lecture3' action="major_board_form.php" method="post">
                        <li>
                            <h3>보안컴퓨터네트워크</h3>
                            <input type="hidden" name="lecture" value="보안컴퓨터네트워크">
                        </li>
                        <br>
                        <li>이성원</li>
                        <input type="hidden" name="professor" value="이성원">

                </ul>
                <button type="button" class="btn btn-lg btn-block  btn-custom " onclick="document.lecture3.submit();">평가하기</button>
                </form>
            </div>
        </div>

        <div class="col-3 princing-item green">
            <div class="pricing-divider ">
                <h4 class="my-0 display-4 text-light font-weight-normal mb-3"><span class="h3">$</span> 450 <span class="h5">/mo</span></h4>
                <svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'></svg>
            </div>
            <div class="card-body bg-white mt-0 shadow">
                <ul class="list-unstyled mb-5 position-relative">
                    <br>
                    <form name = 'lecture4' action="major_board_form.php" method="post">
                        <li>
                            <h3>웹서버구축및운영</h3>
                            <input type="hidden" name="lecture" value="웹서버구축및운영">
                        </li>
                        <br>
                        <li>윤여창</li>
                        <input type="hidden" name="professor" value="윤여창">

                </ul>
                <button type="button" class="btn btn-lg btn-block  btn-custom " onclick="document.lecture4.submit();">평가하기</button>
                </form>
            </div>
        </div>

        <div class="col-3 princing-item green">
            <div class="pricing-divider ">
                <h4 class="my-0 display-4 text-light font-weight-normal mb-3"><span class="h3">$</span> 450 <span class="h5">/mo</span></h4>
                <svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'></svg>
            </div>
            <div class="card-body bg-white mt-0 shadow">
                <ul class="list-unstyled mb-5 position-relative">
                    <br>
                    <form name = 'lecture5' action="major_board_form.php" method="post">
                        <li>
                            <h3>웹어플리케이션보안</h3>
                            <input type="hidden" name="lecture" value="웹어플리케이션보안">
                        </li>
                        <br>
                        <li>이진선</li>
                        <input type="hidden" name="professor" value="이진선">

                </ul>
                <button type="button" class="btn btn-lg btn-block  btn-custom " onclick="document.lecture5.submit();">평가하기</button>
                </form>
            </div>
        </div>

        <div class="col-3 princing-item green">
            <div class="pricing-divider ">
                <h4 class="my-0 display-4 text-light font-weight-normal mb-3"><span class="h3">$</span> 450 <span class="h5">/mo</span></h4>
                <svg class='pricing-divider-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'></svg>
            </div>
            <div class="card-body bg-white mt-0 shadow">
                <ul class="list-unstyled mb-5 position-relative">
                    <br>
                    <form name = 'lecture6' action="major_board_form.php" method="post">
                        <li>
                            <h3>정보보안현장실습2</h3>
                            <input type="hidden" name="lecture" value="정보보안현장실습2">
                        </li>
                        <br>
                        <li>윤여창</li>
                        <input type="hidden" name="professor" value="윤여창">

                </ul>
                <button type="button" class="btn btn-lg btn-block  btn-custom " onclick="document.lecture6.submit();">평가하기</button>
                </form>
            </div>
        </div>



    </div>
</div>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/stellar.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="vendors/isotope/isotope-min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/mail-script.js"></script>
</body>
<footer class="footer_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="footer_top flex-column">
                    <div class="footer_logo">
                        <h4>Follow Me</h4>
                    </div>
                    <div class="footer_social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer_bottom justify-content-center">
            <p class="col-lg-8 col-sm-12 footer-text">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
    </div>
</footer>
</html>

