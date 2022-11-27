<?php
	include("lib_db.php");
    $id = $_REQUEST['idsc'];
    $sql= "DELETE FROM sachcu WHERE ids=$id";
    exec_update($sql);
    session_start();
    $iduser=$_SESSION['user'];
    header("Location:quanlysach.php");
?>