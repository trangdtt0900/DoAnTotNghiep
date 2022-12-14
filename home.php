<?php 
    include('lib_db.php');
    $sql="select*from loai  ";
    $loai=select_list ($sql);
    $sql1 = "select * from sachcu where idl=1 and trangthai='able' LIMIT 6 ";
    $sach1 = select_list($sql1);
    $sql2="select * from sachcu where idl=2 and trangthai='able' LIMIT 6";
    $sach2=select_list($sql2);
    $sql3="select * from sachcu where idl=3 and trangthai='able' LIMIT 6 ";
    $sach3=select_list($sql3);
    $sql4="select * from sachcu where idl=4 and trangthai='able' LIMIT 6 ";
    $sach4=select_list($sql4);
    $sql5="select * from sachcu where idl=5 and trangthai='able' LIMIT 6 ";
    $sach5=select_list($sql5);
    $sql6="select * from sachcu where idl=6 and trangthai='able' LIMIT 6 ";
    $sach6=select_list($sql6);
?>
    
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Chia sẻ sách cũ</title>
<link rel="stylesheet" href="home.css"/>
<link rel="stylesheet" href="reponsive.css"/>
<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
</head>
<body>
    <div class="header">
        <div class="header_name">
            <div class="name">
            <i class="fas fa-book-open"></i><a href=" "> Book Share</a>
            </div>
            <div class="login" style="margin-top:20px;">
                <a class="link" href="dangnhap.php">Đăng nhập </a>
                <a class="link" href="dangky.php" style="margin-right:4px;">Đăng ký |</a>
            </div>
        </div>
        <div class="header_menu">
            <ul class="menu">
               <li class="menu_name">
                   <a href=" ">Home</a>
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
        <div class="anh" style="background-color:white;">
            <div class="slide_show">
                <div class="slide">
                   <img src="img/anh.png">
                </div>
                <div class="slide">
                    <img src="img/anh4.jpg">
                </div>
                <div class="slide">
                    <img src="img/anh5.jpg">
                </div>
            </div>
        </div>
        <div class="home">
            <ul class="home_menu">
                <li><a href="loai.php?idl=3 "><img src="http://ecom14.topwebviet.com/images/ecom14/1/images/icon-4.png">Tâm lý</a></li>
                <li><a href="loai.php?idl=2 "><img src="http://ecom14.topwebviet.com/images/ecom14/1/images/icon-2.png">Lịch sử</a></li>
                <li><a href=" loai.php?idl=4"><img src="http://ecom14.topwebviet.com/images/ecom14/1/images/icon-5.png">Thiếu nhi</a></li>
                <li><a href=" loai.php?idl=1"><img src="http://ecom14.topwebviet.com/images/ecom14/1/images/icon-3.png">Khoa học</a></li>
                <li><a href="loai.php?idl=5 "><img src="http://ecom14.topwebviet.com/images/ecom14/1/images/icon-1.png">Tiểu thuyết</a></li>
                <li><a href=" loai.php?idl=6"><img src="http://ecom14.topwebviet.com/images/ecom14/1/images/icon-1.png">Loại khác</a></li>
            </ul>
        </div>
        <div class="noidung">
            <h1 style="margin-top:60px;" ><a style="color:#ffac13;" href="loai.php?idl=3">Tâm lý</a></h1>
            <div class="sach">
                <?php foreach ($sach3 as $key) { ?>
                <div class="sachcu">
                    <a href="SachCu.php?idsc=<?php echo $key['ids']; ?>"> <img src="<?php echo $key['anh']; ?>"></a>
                    <a href="SachCu.php?idsc=<?php echo $key['ids']; ?>"><h2  style="font-size: 23px"><?php echo $key['TenS']; ?></h2></a>
                    <p>Tác giả: <?php echo $key['TacGia']; ?></p>
                    <p>Điểm thưởng: <?php echo $key['Diem']; ?></p>
                </div>
                <?php } ?>
            </div>
            <div class="them">
            <a style="border-radius: 15px; height: 30px;font-size: 21px;background-color:#ffac13;padding: 8px 27px;color:white ;" href="loai.php?idl=3">Xem thêm</i></a>
            </div>
        </div>

        <div class="noidung">
            <h1 style="margin-top:40px;" ><a style="color:#ffac13;" href="loai.php?idl=2">Lịch sử </a></h1>
            <div class="sach">
                <?php foreach ($sach2 as $key) { ?>
                <div class="sachcu">
                    <a href="SachCu.php?idsc=<?php echo $key['ids']; ?>"> <img src="<?php echo $key['anh']; ?>"></a>
                    <a href="SachCu.php?idsc=<?php echo $key['ids']; ?>"><h2  style="font-size: 23px"><?php echo $key['TenS']; ?></h2></a>
                    <p>Tác giả: <?php echo $key['TacGia']; ?></p>
                    <p>Điểm thưởng: <?php echo $key['Diem']; ?></p>
                </div>
                <?php } ?>
            </div>
            <div class="them">
            <a style="border-radius: 15px; height: 30px;font-size: 21px;background-color:#ffac13;padding: 8px 27px;color:white ;" href="loai.php?idl=2">Xem thêm</i></a>
            </div>
        </div>

        <div class="noidung">
            <h1 style="margin-top:60px;" ><a style="color:#ffac13;" href="loai.php?idl=4">Thiếu nhi</a></h1>
            <div class="sach">
                <?php foreach ($sach4 as $key) { ?>
                <div class="sachcu">
                    <a href="SachCu.php?idsc=<?php echo $key['ids']; ?>"> <img src="<?php echo $key['anh']; ?>"></a>
                    <a href="SachCu.php?idsc=<?php echo $key['ids']; ?>"><h2  style="font-size: 23px"><?php echo $key['TenS']; ?></h2></a>
                    <p>Tác giả: <?php echo $key['TacGia']; ?></p>
                    <p>Điểm thưởng: <?php echo $key['Diem']; ?></p>
                </div>
                <?php } ?>
            </div>
            <div class="them">
            <a style="border-radius: 15px; height: 30px;font-size: 21px;background-color:#ffac13;padding: 8px 27px;color:white ;" href="loai.php?idl=4">Xem thêm</i></a>
            </div>
        </div>
        <div class="noidung">
            <h1 style="margin-top:60px;" ><a style="color:#ffac13;" href="loai.php?idl=1">Khoa học</a></h1>
            <div class="sach">
                <?php foreach ($sach1 as $key) { ?>
                <div class="sachcu">
                    <a href="SachCu.php?idsc=<?php echo $key['ids']; ?>"> <img src="<?php echo $key['anh']; ?>"></a>
                    <a href="SachCu.php?idsc=<?php echo $key['ids']; ?>"><h2  style="font-size: 23px"><?php echo $key['TenS']; ?></h2></a>
                    <p>Tác giả: <?php echo $key['TacGia']; ?></p>
                    <p>Điểm thưởng: <?php echo $key['Diem']; ?></p>
                </div>
                <?php } ?>
            </div>
            <div class="them">
            <a style="border-radius: 15px; height: 30px;font-size: 21px;background-color:#ffac13;padding: 8px 27px;color:white ;" href="loai.php?idl=1">Xem thêm</i></a>
            </div>
        </div>

        <div class="noidung">
            <h1 style="margin-top:60px;" ><a style="color:#ffac13;" href="loai.php?idl=5">Tiểu thuyết</a></h1>
            <div class="sach">
                <?php foreach ($sach5 as $key) { ?>
                <div class="sachcu">
                    <a href="SachCu.php?idsc=<?php echo $key['ids']; ?>"> <img src="<?php echo $key['anh']; ?>"></a>
                    <a href="SachCu.php?idsc=<?php echo $key['ids']; ?>"><h2  style="font-size: 23px"><?php echo $key['TenS']; ?></h2></a>
                    <p>Tác giả: <?php echo $key['TacGia']; ?></p>
                    <p>Điểm thưởng: <?php echo $key['Diem']; ?></p>
                </div>
                <?php } ?>
            </div>
            <div class="them">
            <a style="border-radius: 15px; height: 30px;font-size: 21px;background-color:#ffac13;padding: 8px 27px;color:white ;" href="loai.php?idl=5">Xem thêm</i></a>
            </div>
        </div>
        <div class="back_top">
            <button onclick="topFunction()" id="top" title="Go to top"><i class="fa-solid fa-angle-up"></i></button>
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

<script>
     //back to top
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
        if (document.body.scrollTop >700 || document.documentElement.scrollTop > 700) {
            document.getElementById("top").style.display = "block";
        } 
        else {
        document.getElementById("top").style.display = "none";
        }
    }
    function topFunction() {
        document.documentElement.scrollTo(0,0);
    }
</script>
</body>
</html>