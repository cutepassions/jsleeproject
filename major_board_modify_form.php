<!doctype html>
<html lang="en">
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

<link rel="stylesheet" type="text/css" href="./css/login.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
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
<script>

    function check_input() {
        x = isNaN(document.board_form.rating.value)
        if (!document.board_form.reason.value)
        {
            alert("수강이유를 입력하세요");
            document.board_form.reason.focus();
            return;
        }
        if (!document.board_form.advan.value)
        {
            alert("장점을 입력하세요");
            document.board_form.advan.focus();
            return;
        }
        if (!document.board_form.disadvan.value)
        {
            alert("단점을 입력하세요");
            document.board_form.disadvan.focus();
            return;
        }
        /*
        if (!document.board_form.rating.value)
        {
            alert("평점을 선택하세요");
            document.board_form.rating.focus();
            return;
        }*/
        if (x==true)
        {
            alert("평점을 선택하세요");
            document.board_form.rating.focus();
            return;
        }
        document.board_form.submit();
    }
</script>

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

//$content = str_replace(" ", "&nbsp;", $content);
//$content = str_replace("\n", "<br>", $content);

?>
<div id="main_content">
    <div id="join_box">
        <form name="board_form" method="post" action="major_board_modify.php?num=<?=$num?>&page=<?=$page?>">
            <h2>평가 항목</h2>
            <div class="form id">
                <div class="col1">강의명</div>
                <div class="col2">
                    <?=$lecture?>
                </div>
            </div>
            <div class="clear"></div>

            <div class="form">
                <div class="col1">교수</div>
                <div class="col2">
                    <?=$professor?>
                </div>
            </div>
            <div class="clear"></div>
            <div class="form">
                <div class="col1">작성자</div>
                <div class="col2">
                    <?=$username?>
                </div>
            </div>
            <div class="clear"></div>
            <div class="form">
                <span class="col1">장점</span>
                <span class="col2"><input name="reason" type="text" value="<?=$reason?>"></span>
            </div>
            <div class="form">
                <span class="col1">장점</span>
                <span class="col2"><input name="advan" type="text" value="<?=$advan?>"></span>
            </div>
            <div class="form">
                <span class="col1">장점</span>
                <span class="col2"><input name="disadvan" type="text" value="<?=$disadvan?>"></span>
            </div>
            <div class="clear"></div>
            <div class="form email">
                <div class="col1">평점</div>
                <div class="col2">
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="rating">
                        <option selected value="#">-----------------------------평점을 선택해주세요-----------------------------</option>
                        <option value=0.0>O.0</option>
                        <option value=0.5>0.5</option>
                        <option value=1.0>1.0</option>
                        <option value=1.5>1.5</option>
                        <option value=2.0>2.0</option>
                        <option value=2.5>2.5</option>
                        <option value=3.0>3.0</option>
                        <option value=3.5>3.5</option>
                        <option value=4.0>4.0</option>
                        <option value=4.5>4.5</option>
                        <option value=5.0>5.0</option>
                    </select>
                </div>
            </div>
            <div class="clear"></div>
            <div class="bottom_line"> </div>
            <div class="buttons">
                <a class="primary_btn tr-bg" onclick="check_input()"><span>수정완료</span></a>
            </div>
        </form>
    </div> <!-- join_box -->
</div> <!-- main_content -->




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

