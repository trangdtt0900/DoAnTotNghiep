<?php 
    include('lib_db.php');
    session_start();
    $sql="select*from loai ";
    $loai=select_list ($sql);
    $iduser=$_SESSION['user'];
    $sqluser="select * from admin where id='$iduser' ";
    $user=select_one($sqluser);
    $error ="";
    if (isset($_POST['dang'])) 
    {
        $tensc = $_POST['ten'];
        $loais = $_POST['loais'];
        $tacgia = $_POST['tacgia'];
        $anh = $_POST['anh'];
        $mota = $_POST['mota'];
        $diem = $_POST['diem'];

        if($tensc==""||$loais==""||$tacgia==""||$anh==""||$diem==""){
         $error="1";}   

        else{
            $addS= "INSERT INTO sachcu
            VALUES (Null,'$iduser','$loais', '$tensc', '$tacgia','img/$anh', '$mota','$diem','able')";
            exec_update($addS);
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
                    <li><a id='ad' href="quanlytaikhoan.php">Quản lý tài khoản <i class="fa-solid fa-angle-right"></i></a></li>
                    <li><a href="home.php">Đăng xuất</i></a></li>
                </ul>
                </li>
               </ul>
            </div>
        </div>
        <div class="header_menu">
            <ul class="menu">
               <li class="menu_name">
                   <a href=" homea.php?page=<?php echo $user['id']; ?>">Home</a>
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
            <form action="quanlysach.php " class="search">
                <input name="q" value=""/>
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
       </div>
    </div>
    
    <div class="content" style="height:700px ;">
       <h1 style="margin-bottom: 0;">Đăng thông tin sách cũ</h1>
       <form method="post">
       <div class="right">
        <style>.nd p{float:left;}</style>
            <div class="sach">
                <div class="nd">
                    <p>Tên sách cũ </p>
                    <input name="ten"  type="text"style="width:50%;height:30px; border-radius: 3px;float: left;">
                </div>
                <div class="nd">
                    <p>Thể loai</p>
                    <select id="loai" name="loais" style="width:30%;height:30px; border-radius: 3px;float: left;border:2px solid black;" >   
                            <?php
                                 foreach ($loai as $key) 
                                 {
                                  ?>
                                     <option value="<?=$key['idl']; ?>"><?=$key['tenl']; ?></option>   
                                    <?php
                                 }
                                ?>                                                      
                    </select>
                    
                </div>
                <div class="nd">
                    <p>Tác giả </p>
                    <input name="tacgia"  type="text"style="width:50%;height:30px; border-radius: 3px;float: left;">
                </div>
                <div class="nd">
                    <p>Ảnh</p>
                    <input name="anh" type="file" value placeholder="Nhập ảnh" style="float: left;">
                </div>
                <div class="nd">
                    <p>Mô tả </p>
                    <input name="mota"  type="text"style="width:50%;height:50px; border-radius: 3px;float: left;" value=" ">
                </div>
                <div class="nd">
                    <p>Điểm thưởng </p>
                    <input name="diem" min="0"  type="number"style="width:50%;height:30px; border-radius: 3px;float: left;">
                </div>
                <label style="color: red;"><?php if($error == "1"){ echo "Không được bỏ trống trường thông tin!";} ?></label>
            </div>
            <button type="submit" name="dang"  class="dangky" style="height:50px;">Đăng thông tin</button>
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
    <script >
            $m = '<?php echo $user['chucnang'];?>';
            if($m=='admin'){
                            
                document.getElementById('ad').style.display='block';}
            else{
                document.getElementById('ad').style.display='none';}

            $error= "<?php echo $error;?>";
            if($error=="0"){
                var result = alert("Đăng thông tin sách thành công!");
                window.location.href = 'quanlysach.php'; }

    </script>
</body>
</html>