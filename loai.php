<?php 
    include('lib_db.php');
    $idl=$_REQUEST["idl"];
    $sql="select*from sachcu where idl='$idl'";
    $sach=select_list($sql);
    $sql1="select*from loai where idl='$idl'";
    $loais=select_one ($sql1);
    $sql2="select*from loai ";
    $loai=select_list ($sql2);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Chia sẻ sách cũ</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
            <form action=" " class="search">
                <input name="q" value=""/>
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
       </div>
    </div>
    <style>
    .TT{border-top:0px;height: 430px;background-color:#F0F0F0;float:left;}
    .sachcu{border-top: 0px; width: 100%;}
    .sachcu:hover{border:3px solid #ffac13;}</style>
    <div class="content">
        <div class="noidung">
            <h1 style="font-size:35px;width: 100%; color:#ffac13;"><?php echo $loais['tenl']; ?></h1>  
            <div class="sach">
            <?php foreach ($sach as $key) { ?>
                <div class="TT">
                    <div class="sachcu">
                        <a href="SachCu.php?idsc=<?php echo $key['ids']; ?>"> <img src="<?php echo $key['anh']; ?>"></a>
                        <a href="SachCu.php?idsc=<?php echo $key['ids']; ?>"><h2><?php echo $key['TenS']; ?></h2></a>
                        <p>Tác giả: <?php echo $key['TacGia']; ?> </p>
                        <p>Điểm thưởng: <?php echo $key['Diem']; ?> </p>
                    </div>
                </div>
            <?php } ?>

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
</body>
</html>