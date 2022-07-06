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

$sql = "select * from members where id='$id'";
$result = mysqli_query($con, $sql);

$num_match = mysqli_num_rows($result);

if(!$num_match)
{
    echo("
           <script>
             window.alert('등록되지 않은 아이디입니다!')
             history.go(-1)
           </script>
         ");
}
else
{
    $row = mysqli_fetch_array($result);
    $db_pass = $row["pass"];

    mysqli_close($con);

    if($pass != $db_pass)
    {

        echo("
              <script>
                window.alert('비밀번호가 틀립니다!')
                history.go(-1)
              </script>
           ");
        exit;
    }
    else
    {
        session_start();
        $_SESSION["userid"] = $row["id"];
        $_SESSION["username"] = $row["name"];
        $_SESSION["userlevel"] = $row["level"];
        $_SESSION["userpoint"] = $row["point"];
        if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
        if ($id == 'admin'){
            echo("
                <script>
                window.alert('관리자로 로그인하였습니다.');
                location.href='index.php';
                </script>");
        }
        else{

            echo("    
              <script>
              location.href = 'index.php';
              </script>
            ");}
    }
}

?>