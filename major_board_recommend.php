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

$num = $_GET['num'];

include "db_info.php";

$sql = "select * from recommend where num='$num' and id='$userid'";
$result = mysqli_query($con, $sql);
$num_record = mysqli_num_rows($result);

$sql2 = "select * from board where num = $num";
$result2 = mysqli_query($con, $sql2);
$row = mysqli_fetch_array($result2);
$recommend = $row["recommend"];
$id2 = $row["id"];

if ($num_record) {
    echo "
        <script>
            window.alert('이미 추천을 한 게시글입니다')
            history.go(-1)
        </script>";
} else {

    $sql = "insert into recommend(num,id) ";
    $sql .= "values('$num', '$userid')";
    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

    $sql2 = "update board set recommend='$recommend'+1 ";
    $sql2 .= " where num=$num";


    mysqli_query($con, $sql2);  // $sql 에 저장된 명령 실행
    mysqli_close($con);

    echo ("
	      <script>
	          location.href = 'major_board.php';
	      </script>
	  ");
}
?>
