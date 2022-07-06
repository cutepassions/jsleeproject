<?php
    $num = $_GET["num"];
    $page = $_GET["page"];

    $reason = $_POST["reason"];
    $advan = $_POST["advan"];
    $disadvan = $_POST["disadvan"];
    $rating = $_POST["rating"];

    include "db_info.php";
    /*$con = mysqli_connect("localhost", "user1", "12345", "sample");*/

    $sql = "update board set reason='$reason', advan='$advan', disadvan='$disadvan', rating='$rating' ";
    $sql .= " where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'major_board.php?page=$page';
	      </script>
	  ";
?>

   
