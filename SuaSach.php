<?php 
    include('lib_db.php');
    session_start();
    $sql="select*from loai ";
    $loai=select_list ($sql);

    $iduser=$_SESSION['user'];
    $sqluser="select * from admin where id='$iduser' ";
    $user=select_one($sqluser);

    $idsc = $_REQUEST['idsc'];
    $sql1 = "select * from sachcu where ids = '$idsc'";
    $sach = select_one($sql1);
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Chia sẻ sách cũ</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="dangS.css"/>
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
                    <li><a href="home.php">Đăng xuất </i></a></li>
                </ul>
                <ul class="quanly_ad">
                    <li><a href="">Quản lý tài khoản <i class="fa-solid fa-angle-right"></i></a></li>
                    <li><a href="quanlysach.php">Quản lý sách <i class="fa-solid fa-angle-right"></i></a></li>
                    <li><a href="home.php">Đăng xuất </a></li>
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
                   <li><a href="">Khoa học</a></li>
                   <li><a href="">Lịch sử</a></li>
                   <li><a href="">Tâm lý</a></li>
                   <li><a href="">Thiếu nhi</a></li>
                   <li><a href="">Tiểu thuyết</a></li>
                   <li><a href="">Loại khác</a></li>
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
    <div class="content" style="height:700px ;">
       <h1 style="margin-bottom: 0;">Sửa thông tin sách cũ</h1>
       <div class="right">
        <style>.nd p{float:left;}</style>
            <div class="sach">
                <div class="nd">
                    <p>Tên sách cũ </p>
                    <input name="ten" value="<?= $sach['TenS']?>" type="text"style="width:50%;height:30px; border-radius: 3px;float: left;">
                </div>
                <div class="nd">
                    <p>Thể loai</p>
                    <select id="loai" name="loai" style="width:30%;height:30px; border-radius: 3px;float: left;border:2px solid black;" >   
                           <?php
                                 foreach ($loai as $key) 
                                 {
                                  ?>
                                     <option value="<?=$key['idl']; ?>" <?php if($key['idl'] == $sach["idl"]) echo "selected"?> ><?=$key['tenl']; ?></option>   
                                    <?php
                                 } ?>                                                        
                    </select>
                    
                </div>
                <div class="nd">
                    <p>Tác giả </p>
                    <input name="tacgia" value="<?= $sach['TacGia']?>" type="text"style="width:50%;height:30px; border-radius: 3px;float: left;">
                </div>
                <div class="nd">
                    <p>Ảnh</p>
                    <input name="anh" value="<?= $sach['anh']?>" type="file" value placeholder="Nhập ảnh" style="float: left;">
                </div>
                <div class="nd">
                    <p>Mô tả </p>
                    <input name="mota" value="<?= $sach['MoTa']?>" type="text"style="width:50%;height:50px; border-radius: 3px;float: left;" value=" ">
                </div>
                <div class="nd">
                    <p>Điểm thưởng </p>
                    <input name="diem" value="<?= $sach['Diem']?>" min="0"  type="number"style="width:50%;height:30px; border-radius: 3px;float: left;">
                </div>
            </div>
            <button class="dangky">Đăng thông tin</button>
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
            <p style="margin-left: 22%;margin-top:8%;">0992716328</p>
            <p style="margin-bottom:4%;"><i class="fa-regular fa-envelope"></i> chiasesachcu@gmail.com</p>
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