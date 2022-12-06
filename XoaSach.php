<?php
	include("lib_db.php");
    $idsc = $_REQUEST['idsc'];
    $sql= "DELETE FROM sachcu WHERE ids=$idsc";
    exec_update($sql);
    session_start();
    $iduser=$_SESSION['user'];
    
?>
<script>
    var result = alert("Bạn đã xóa thông tin sách khỏi hệ thống!");
    window.location.href = 'quanlysach.php'; 
</script>