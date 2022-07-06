<html>
<title>JSLEEPROJECT</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/vertical-layout-light/style.css">

<link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
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
</head>

<body>
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

<div class="about_area section_gap">
    <a class="primary_btn" href="major_board_select.php" style="margin-left: 250px"><span>평가하기</span></a>
    <div class="content-wrapper">
    <div class="row">
        <div class="col-md-9 grid-margin transparent" style="margin-left: 250px">
            <div class="row">
                <?php

                if (isset($_GET["page"]))
                    $page = $_GET["page"];  //$page : 현재 페이지 번호
                else
                    $page = 1;              //$page : 현재 페이지 번호

                include "db_info.php";

                /* $con = mysqli_connect("localhost", "user1", "12345", "sample"); */
                $sql = "select * from board order by num desc";
                $result = mysqli_query($con, $sql);
                $total_record = mysqli_num_rows($result); // 전체 글 수

                $scale = 12;   // 한 페이지에 보여주고자 하는 글의 갯수

                // 전체 페이지 수($total_page) 계산
                if ($total_record % $scale == 0)
                    $total_page = floor($total_record/$scale);
                else
                    $total_page = floor($total_record/$scale) + 1;

                // 표시할 페이지($page)에 따라 $start 계산
                $start = ($page - 1) * $scale;

                $number = $total_record - $start;

                for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
                {
                mysqli_data_seek($result, $i);
                // 가져올 레코드로 위치(포인터) 이동
                $row = mysqli_fetch_array($result);
                // 하나의 레코드 가져오기
                $num         = $row["num"];
                $professor         = $row["professor"];
                $lecture          = $row["lecture"];
                $name        = $row["name"];
                $rating         = $row["rating"];
                $recommend         = $row["recommend"];
                ?>
                <div class="col-md-3 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <h3 style="text-align: center"><a href="major_board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$lecture?></a></h3>
                            <h5 style="text-align: center"><?=$professor?></h5>
                            <h5 style="text-align: center"><?=$name?></h5>
                            <h5 style="text-align: right"><?=$rating?>/5.0</h5>
                            <h5 style="text-align: left">추천 수 : <?=$recommend?></h5>
                        </div>
                    </div>
                </div>
                    <?php
                    $number--;
                }
                mysqli_close($con);

                ?>
            </div>
        </div>

    </div>


</div>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <?php
            if ($total_page>=2 && $page >= 2)
            {
            $new_page = $page-1;
            echo "
            <a class='page-link' href='major_board.php?page=$new_page' aria-label='Previous'>
                <span aria-hidden='true'>&laquo;</span>
            </a>";
            }
            else
		echo "<li>&nbsp;</li>";
            	for ($i=1; $i<=$total_page; $i++)
   	{
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<li class='page-item active' aria-current='page'><a class='page-link' href='#'>$i</a></li>";
		}
		else
		{
            echo "
        </li>
        <li class='page-item'><a class='page-link' href='major_board.php?page=$i'>$i</a></li>";
        }
       }
                if ($total_page>=2 && $page != $total_page)
   	{
		$new_page = $page+1;
        echo "
        <li class='page-item'>
            <a class='page-link' href='major_board.php?page=$new_page' aria-label='Next'>
                <span aria-hidden='true'>&raquo;</span>
            </a>
        </li>";
        }
                else
                    echo "<li>&nbsp;</li>";
            ?>
    </ul>
</nav>




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
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="js/gmaps.min.js"></script>
<script src="js/theme.js"></script>
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

