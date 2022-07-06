<?php

include "db_info.php";
include "library.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["id"])) {
        ErrorMessage("아이디를 입력하세요");
    } else {
        $id = test_input($_POST["id"]);
    }
    if (empty($_POST["pass"])) {
        ErrorMessage("비밀번호를 입력하세요");
    } else {
        $pass = test_input($_POST["pass"]);
    }
    if (empty($_POST["pass_confirm"])) {
        ErrorMessage("비밀번호 확인을 입력하세요");
    } else {
        $pass_confirm = test_input($_POST["pass_confirm"]);
    }
    if (empty($_POST["name"])) {
        ErrorMessage("이름을 입력하세요");
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email1"])) {
        ErrorMessage("이메일을 입력하세요");
    } else {
        $email1 = test_input($_POST["email1"]);
    }
    if (empty($_POST["email2"])) {
        ErrorMessage("이메일을 입력하세요");
    } else {
        $email2 = test_input($_POST["email2"]);
    }
    if (empty($_POST["num"])) {
        ErrorMessage("학번을 입력하세요");
    } else {
        if (is_numeric($_POST["num"])){
            $num = test_input($_POST["num"]);
        }
        else{
            ErrorMessage("학번은 숫자만 입력하세요");
        }
    }
    if (empty($_POST["nick"])) {
        ErrorMessage("닉네임을 입력하세요");
    } else {
        $nick = test_input($_POST["nick"]);
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function ErrorMessage($message, $type = "on")
{
  echo "<script> alert('$message'); ";
  if ($type == "on") echo " history.back(); ";
  echo "</script>";
  exit;
}


date_default_timezone_set('Asia/Seoul');
$email = $email1."@".$email2;
$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

//    $con = mysqli_connect("localhost", "root", "", "sample");
$sql = "select * from members where id='$id'";
$result = mysqli_query($con, $sql);

$num_record = mysqli_num_rows($result);
if ($num_record) {
    echo "
        <script>
            window.alert('해당 회원으로는 가입이 불가능합니다')
        </script>";
} else {

    $sql = "insert into members(id, pass, nick, name, num, email, regist_day) ";
    $sql .= "values('$id', '$pass', '$nick', '$name', $num, '$email', '$regist_day')";

    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);

    echo ("
	      <script>
	          window.alert('회원가입이 완료되었습니다');
	          location.href='index.php';
	      </script>
	  ");
}
?>


