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
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">교양</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="">교양 필수</a></li>
                                <li class="nav-item"><a class="nav-link" href="">교양 선택</a></li>
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
