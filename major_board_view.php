<html>
<title>JSLEEPROJECT</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="vendors/feather/feather.css">
<link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
<link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="css/vertical-layout-light/style.css">
<!-- endinject -->
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
<?php
$num  = $_GET["num"];
$page  = $_GET["page"];

include "db_info.php";

/*$con = mysqli_connect("localhost", "user1", "12345", "sample");*/
$sql = "select * from board where num = $num";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_array($result);
$lecture      = $row["lecture"];
$professor      = $row["professor"];
$regist_day = $row["regist_day"];
$name    = $row["name"];
$reason    = $row["reason"];
$advan    = $row["advan"];
$disadvan    = $row["disadvan"];
$rating          = $row["rating"];
$recommend          = $row["recommend"];
$id          = $row["id"];

//$content = str_replace(" ", "&nbsp;", $content);
//$content = str_replace("\n", "<br>", $content);

mysqli_query($con, $sql);
?>
<div class="about_area section_gap" style="text-align: center">
<li>강의명 : <?=$lecture?></li>
<li>교수 : <?=$professor?></li>
<li>작성자 : <?=$name?></li>
<li>수강 이유 : <?=$reason?></li>
<li>장점 : <?=$advan?></li>
<li>단점 : <?=$disadvan?></li>
<li>평점 : <?=$rating?>/5.0</li>
</div>

<div style="text-align: center">
<button type="button" class="btn btn-outline-primary" onclick="location.href='major_board_recommend.php?num=<?=$num?>&page=<?=$page?>'">추천 <?=$recommend?></button>
</div>

<div style="text-align: center">
<button type="button" class="btn btn-outline-secondary" onclick="location.href='major_board.php'">목록</button>
    <?php
    if($userid==$id){
    ?>
<button type="button" class="btn btn-outline-success" onclick="location.href='major_board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button>
<button type="button" class="btn btn-outline-danger" onclick="location.href='major_board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button>
</div>
<?php
}
?>


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

