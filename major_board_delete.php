<?php

    $num   = $_GET["num"];
    $page   = $_GET["page"];

    include "db_info.php";

    /*$con = mysqli_connect("localhost", "user1", "12345", "sample");*/



    $sql = "delete from board where num = $num";
    $sql2 = "delete from recommend where num = $num";
    mysqli_query($con, $sql);
    mysqli_query($con, $sql2);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'major_board.php?page=$page';
	     </script>
	   ";
?>

