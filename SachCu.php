<?php 
    include('lib_db.php');
    $id=$_REQUEST["idsc"];
    $sql="select*from sachcu where ids='$id'";
    $sach=select_one($sql);
    $sql2="select*from loai ";
    $loai=select_list ($sql2);
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
            <i class="fas fa-book-open"></i><a href="home.php">Book Share</a>
            </div>
            <div class="login" style="margin-top:20px;">
                <a class="link" href="dangnhap.php">Đăng nhập </a>
                <a class="link" href="dangky.php" style="margin-right:4px;">Đăng ký |</a>
            </div>
        </div>
        <div class="header_menu">
            <ul class="menu">
               <li class="menu_name">
                   <a href="home.php">Home</a>
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
       <h1>Thông tin sách</h1>
       <div class="left">
          <img src="<?php echo $sach['anh']; ?>" height="100%" width="100%"> 
       </div>
       <div class="right">
            <div class="sach">
                <div class="ten" style="font-size: 23px;float: left; margin-top:20px;margin-bottom: 25px; width: 100%;">
                <b><?php echo $sach['TenS']; ?></b>
                </div>
                <div class="nd">
                    <p><b>Tác giả: </b><?php echo $sach['TacGia']; ?> </p>
                </div>
                <div class="nd">
                    <p><b>Điểm thưởng: </b><?php echo $sach['Diem']; ?></p>
                </div>
                <div class="nd">
                    <p style="margin-bottom:15px;"><b>Mô tả: </b><p><?php echo $sach['MoTa']; ?></p></p>
                </div>
            </div>
            <p style="color:red;font-size: 20px;" id="tb"></p>
            <button class="dangky" onclick="chon()" style="color:white">Nhận ngay</button>
            <script >
            function chon() {
                document.getElementById("tb").innerHTML = "Bạn cần đăng nhập để nhận sách!";}
            </script>
       </div>
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