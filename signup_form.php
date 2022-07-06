<html>
<title>jsleeproject</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/login.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<script type="text/javascript" src="./js/login.js"></script>
<script type="text/javascript" src="./js/member_modify.js"></script>
<link rel="stylesheet" href="css/style.css">


<head>
    <script>
        function check_id() {
            window.open("member_check_id.php?id=" + document.member_form.id.value,
                "IDcheck",
                "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
        }
    </script>
</head>
<body>
<div id="login_logo_home">
    <a href="index.php"><img src="./img/logo2.png"></a>
</div>
<div id="main_content">
    <div id="join_box">
        <form name="member_form" method="post" action="signup.php">
            <h2>회원 가입</h2>
            <div class="form id">
                <div class="col1">아이디</div>
                <div class="col2">
                    <input type="text" name="id">
                </div>
                <div class="col3">
                    <a href="#"><img src="./img/check_id.gif"
                                     onclick="check_id()"></a>
                </div>
            </div>
            <div class="clear"></div>

            <div class="form">
                <div class="col1">비밀번호</div>
                <div class="col2">
                    <input type="password" name="pass">
                </div>
            </div>
            <div class="clear"></div>
            <div class="form">
                <div class="col1">비밀번호 확인</div>
                <div class="col2">
                    <input type="password" name="pass_confirm">
                </div>
            </div>
            <div class="clear"></div>
            <div class="form">
                <div class="col1">이름</div>
                <div class="col2">
                    <input type="text" name="name">
                </div>
            </div>
            <div class="form">
                <div class="col1">닉네임</div>
                <div class="col2">
                    <input type="text" name="nick">
                </div>
            </div>
            <div class="form">
                <div class="col1">학번</div>
                <div class="col2">
                    <input type="text" name="num">
                </div>
            </div>
            <div class="clear"></div>
            <div class="form email">
                <div class="col1">이메일</div>
                <div class="col2">
                    <input type="text" name="email1">@<input type="text" name="email2">
                </div>
            </div>
            <div class="clear"></div>
            <div class="bottom_line"> </div>
            <div class="buttons">
                <a class="primary_btn tr-bg" onclick="check_input()"><span>회원가입</span></a>
            </div>
        </form>
    </div> <!-- join_box -->
</div> <!-- main_content -->

</body>

</html>
