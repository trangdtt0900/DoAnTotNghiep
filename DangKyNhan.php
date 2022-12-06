<?php 
    include('lib_db.php');
    session_start();
    $sql="select*from loai ";
    $loai=select_list ($sql);

    $iduser=$_SESSION['user'];
    $sqluser="select * from admin where id='$iduser' ";
    $user=select_one($sqluser);

    $ids=$_REQUEST['idsc'];
    $sqls="select * from sachcu where ids='$ids' ";
    $sach=select_one($sqls);

    $id=$sach['id'];
    $sqldang="select * from admin where id='$id' ";
    $userdang=select_one($sqldang);

    $error="";
    
    if (isset($_POST['nhansach'])) 
    {
        $tenn = $_POST['tennhan'];
        $sdt = $_POST['sdtnhan'];
        $dc = $_POST['diachinhan'];

        if($tenn==""||$sdt==""||$dc=="")
        {
         $error="1";}   

        else{

            $diem_user_nhan=$user['Diem'] - $sach['Diem'];
            $diem_user_dang=$userdang['Diem'] + $sach['Diem'];

            $nhan= "INSERT INTO dangkynhan VALUES (Null,'$iduser','$ids','$tenn','$dc','$sdt')";
            exec_update($nhan);

            $usernhan= "UPDATE admin SET Diem='$diem_user_nhan' where id='$iduser'" ;
            exec_update($usernhan);

            $userdang= "UPDATE admin SET Diem='$diem_user_dang'where id='$id' " ;
            exec_update($userdang);

            $sach_nhan= "UPDATE sachcu SET trangthai='disable' where ids='$ids' " ;
            exec_update($sach_nhan);
            $error="0";
            }

        }
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Chia sẻ sách cũ</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="SachCu.css"/>
<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
</head>
<body>
    <div class="header">
        <div class="header_name">
            <div class="name">
            <i class="fas fa-book-open"></i><a href="homea.php?page=<?php echo $user['id']; ?>">Book Share</a>
            </div>
            <div class="login">
              <ul class="quanly">
                <li >
                <a class="user"><i class="far fa-user-circle"></i> <?php echo $user['username']; ?></a>
                <ul class="quanly_tv">
                    <li><a href="quanlysach.php">Quản lý sách <i class="fa-solid fa-angle-right"></i></a></li>
                    <li><a id='ad' href="quanlytaikhoan.php">Quản lý tài khoản <i class="fa-solid fa-angle-right"></i></a></li>
                    <li><a href="home.php">Đăng xuất</i></a></li>
                    <script >
                        $m = "<?php echo $user['chucnang'];?>";
                        if($m=='admin'){
                            
                            document.getElementById('ad').style.display='block';
                             }
                        else{
                             document.getElementById('ad').style.display='none';
                            }

                    </script>
                </ul>
                </li>
               </ul>
            </div>
        </div>
        <div class="header_menu">
            <ul class="menu">
               <li class="menu_name">
                   <a href="homea.php?page=<?php echo $user['id']; ?>">Home</a>
               </li>
               <li class="menu_name">
                   <a href="#">Loại sách</a>
                   <ul class="menu_sach">
                    <?php foreach ($loai as $key) { ?>
                    <li><a href="loaia.php?idl=<?php echo $key['idl']; ?>"> <?php echo $key['tenl']; ?></a></li>
                    <?php } ?>
                   </ul>
               </li>
               <li class="menu_name">
                <a href=" ">Giới thiệu</a>
               </li>
            </ul>
            <form action="loaia.php " class="search">
                <input name="q" value=""/>
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
       </div>
    </div>
    <div class="content">
       <h1>Thông tin đăng ký nhận sách cũ</h1>
       <form method="post">
       <div class="left">
           <img src="<?php echo $sach['anh']; ?>" height="100%" width="100%"> 
       </div>
       <div class="right" style="margin-top: 10%;">
            <div class="sach">
                <div class="nd">
                    <p style="float:left;">Tên sách cũ: <?php echo $sach['TenS']; ?> </p>
                </div>
                <div class="nd">
                    <p style="float:left;">Điểm thưởng: <?php echo $sach['Diem']; ?>  </p>
                </div>
                <div class="nd">
                    <p style="float:left;">Họ tên người nhận: </p>
    				<input name="tennhan" type="text" name=""  style="width:50%;height: 25px; border-radius:3px;float: left;margin-left:15px;">
                </div>
                <div class="nd">
                    <p style="float:left;">Số điện thoại: </p>
    				<input name="sdtnhan" type="tel" name=""  style="width:50%;height: 25px; border-radius: 3px;float: left;margin-left:68px;">
                </div>
                <div class="nd">
                    <p style="float:left;">Địa chỉ nhận sách: </p>
    				<input name="diachinhan" type="text" name=""  style="width:50%;height: 25px; border-radius: 3px;float: left;margin-left:23px; margin-bottom: 10px;">
                </div>
                 <label style="color: red;"><?php if($error == "1"){ echo "Không được bỏ trống thông tin nhận";} ?></label>
            </div>
            <button class="dangky" name="nhansach" style="height:50px;">Đăng ký nhận</button>


            <script >
                        $error= "<?php echo $error;?>";
                        if($error=="0"){
                           alert("Chúc mừng bạn đã đăng ký nhận sách thành công!");
                           window.location.href = 'homea.php?page=<?php echo $user['id']; ?>'; }
            </script>
       </div>
       </form>
    </div>
    <div class="footer">
        <div class="footer_left">
            <h2><i class="fa-regular fa-address-book"></i> Liên hệ</h2>
            <h4>Để nhận được hỗ trợ hãy liên hệ: </h4>
            <p><i class="fa-solid fa-phone"></i> Số điện thoại: 0992716328</p>
            <p><i class="fa-regular fa-envelope"></i> Email: chiasesachcu@gmail.com</p>
        </div>
        <div class="footer_bet">
            <h2><i class="fa-solid fa-book-open"></i> Chia sẻ sách cũ</h2>
            <p>Chia sẻ sách cũ không chỉ là việc chia sẻ cũ của người này đến người khác.</p>
            <p>Mà nó còn là sự chia sẻ những tri thức của nhân loại, chia sẻ những tình cảm của con người tới còn người.</p>
        </div>
        <div class="footer_bet" style="margin-left:3%;width: 12%;">
            <h2><i class="fa-solid fa-link"></i>Liên kết</h2>
            <a href="#">Home</a>
            <a href="# ">Xem danh sách sách cũ</a>
            <a href="#">Đăng ký nhận sách cũ</a>
        </div>
        <div class="footer_right" style="margin-left:40px;">
            <p style="margin-left: 22%;margin-top:8%;">099 271 6328</p>
            <p style="margin-bottom:4%;"><i class="fa-regular fa-envelope"></i>chiasesachcu@gmail.com</p>
            <div class="foot">
                <a class="mau" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a class="mau" href="#"><i class="fa-brands fa-twitter"></i></a>
                <a class="mau" href="#"><i class="fa-brands fa-google-plus-g"></i></a>
                <a class="mau" href="#"><i class="fa-brands fa-dribbble"></i></a>
            </div>
        </div>
    </div>
</body>
</html>