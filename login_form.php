<html>
<title>JSLEEPROJECT</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" type="text/css" href="./css/login.css">
<script type="text/javascript" src="./js/login.js"></script>
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
<body>
<div id="login_logo_home">
    <a href="index.php"><img src="./img/logo2.png"></a>
</div>

<div id="main_content">
    <div id="login_box">
        <div id="login_title">
            <span>로그인</span>
        </div>
        <div id="login_form">
            <form  name="login_form" method="post" action="login.php">
                <div class="mb-3">
                    <input type="text" class="form-control" id="id" name="id" placeholder="아이디">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="비밀번호">
                </div>
                <a class="primary_btn tr-bg" onclick="check_input()"><span>로그인</span></a>
                <a class="primary_btn" href="signup_form.php"><span>회원가입</span></a>
            </form>
        </div> <!-- login_form -->
    </div> <!-- login_box -->
</div> <!-- main_content -->


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

</body>

</html>
