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


    if (!$userid)
    {
        echo("
                    <script>
                    alert('로그인 후 이용해주세요');
                    history.go(-1)
                    </script>
        ");
                exit;
    }



    $lecture = $_POST["lecture"];
    $professor = $_POST["professor"];
    $reason = $_POST["reason"];
    $advan = $_POST["advan"];
    $disadvan = $_POST["disadvan"];
    $rating = $_POST["rating"];

    if (is_numeric($rating)) {


        //$subject = htmlspecialchars($subject, ENT_QUOTES);
        //$content = htmlspecialchars($content, ENT_QUOTES);

        date_default_timezone_set('Asia/Seoul');
        // 또는 php.ini 에서 date.timezone=Asia/Seoul 로 설정

        $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

        include "db_info.php";

        /*$con = mysqli_connect("localhost", "user1", "12345", "sample");*/

        $sql = "insert into board (lecture, professor, name, reason, advan,  disadvan, rating, regist_day,recommend,id) ";
        $sql .= "values('$lecture', '$professor', '$username', '$reason', '$advan', '$disadvan', '$rating','$regist_day',0,'$userid')";

        mysqli_query($con, $sql);
        mysqli_close($con);                // DB 연결 끊기

        echo "
	   <script>
	    location.href = 'major_board.php';
	   </script>
	";
    }
    else{
        echo"
        <script>
        alert('평점을 선택해주세요');
        location.href='major_board_form.php'
        </script>
        ";
    }
?>

  
