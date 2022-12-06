<?php
	include("lib_db.php");
    session_start();
    $iduser=$_SESSION['user'];
    $id = $_REQUEST['idusers'];

    $sqluser="select * from admin where id='$id' ";
    $user=select_one($sqluser);

    $thongbao="";
    if($user['trangthai']=='able')
    {
    $khoa= " UPDATE admin SET trangthai='disable' where id='$id'";
    exec_update($khoa); 
    $thongbao="1";
     } 
    else
    {
     $thongbao="2";
    }
?>
<script>
     $thongbao="<?php echo $thongbao;?>";
     if($thongbao=="2"){
        alert("Tài khoản' <?php echo $user['username'] ?> ' đã ở trang thái khóa  ");
        window.location.href = 'quanlytaikhoan.php';  

     }
     else
     {
        alert("Khóa tài khoản ' <?php echo $user['username'] ?> ' thành công ");
        window.location.href = 'quanlytaikhoan.php'; }
</script>