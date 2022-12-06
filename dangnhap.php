<?php
include("lib_db.php");
session_start();
$sql2="select*from loai ";
$loai=select_list ($sql2);
$error ="";
if( isset($_POST['login']))
{
    $name = $_REQUEST['username'];
	$pass = $_REQUEST['password'];
    if ($name == "" || $pass =="") {
         $error="1";  }
    else{
		$sql = "select * from admin where (username ='$name' or email='$name') and password = '$pass'";
		$data = select_one($sql);
		if($data != "")
		{   if($data['trangthai']=="disable")
                    { $error="2";}
                    else{
                        header("location:homea.php?page=$data[id]");
                    }
		}
		else{ $error = "3";}
    }
}

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Chia sẻ sách cũ</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="User.css"/>
<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
</head>
<body>
    <div class="header">
        <div class="header_name">
            <div class="name">
            <i class="fas fa-book-open"></i><a href="home.php ">Book Share</a>
            </div>
            <div class="login">
                <a class="link" href="dangnhap.php">Đăng nhập </a>
                <a class="link" href="dangky.php" style="margin-right:4px;">Đăng ký |</a>
            </div>
        </div>
        <div class="header_menu">
            <ul class="menu">
               <li class="menu_name">
                   <a href="home.php ">Home</a>
               </li>
               <li class="menu_name">
                   <a href="#">Loại sách</a>
                   <ul class="menu_sach">
                   <?php foreach ($loai as $key) { ?>
                   <li><a href="loai.php?idl=<?php echo $key['idl']; ?>"> <?php echo $key['tenl']; ?></a></li>
                   <?php } ?>
                   </ul>
               </li>
               <li class="menu_name">
                <a href=" ">Giới thiệu</a>
               </li>
            </ul>
            <form action="loai.php " class="search">
                <input name="q" value=""/>
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
       </div>
    </div>
    <div class="content">
       <div class="left">
            <h1 style="font-size:45px;">Đăng nhập</h1>
       </div>
<form method="post">
       <div class="right">
            <div class="sach">
                <div class="nd">
                    <p>Tên đăng nhập/   Email </p>
                    <input name="username" type="username" value="">
                </div>
                <div class="nd">
                    <p>Mật khẩu </p>
                    <input name="password"  type="password" value="">
                </div>
                <label style="color: red;"><?php if($error == "1"){ echo "Không được bỏ trống trường thông tin!";} ?></label>
                <label style="color: red;"><?php if($error == "2"){ echo "Tài khoản của bạn đã bị khóa!";} ?></label>
                <label style="color: red;"><?php if($error == "3"){ echo "Tên đăng nhập hoặc mật khẩu không chính xác!";} ?></label>              
            </div>
            <button type="submit" class="dangky" name="login" style="height:50px;">Đăng nhập</button>
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