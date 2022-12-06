<?php 
    include('lib_db.php');
    session_start();
    $sql="select*from loai ";
    $loai=select_list ($sql);

    $iduser=$_SESSION['user'];
    $sqluser="select * from admin where id='$iduser' ";
    $user=select_one($sqluser);

    if(isset( $_REQUEST['q'])){
        $tim_kiem = $_REQUEST['q']; 
        if( $user['chucnang']=='admin'){
            $sqls="select * from sachcu where trangthai='able'and TenS like '%$tim_kiem%' ";
            $sach=select_list($sqls);
        }
        else{
            $sqls="select * from sachcu where id='$iduser' and trangthai='able' and TenS like '%{$tim_kiem}%'";
            $sach=select_list($sqls);}
        }
    else{
    
        if($user['chucnang']=='admin'){
            $sqls="select * from sachcu where trangthai='able' ";
            $sach=select_list($sqls);
        }
        else{
            $sqls="select * from sachcu where id='$iduser' and trangthai='able'";
            $sach=select_list($sqls);}
        }


    
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Chia sẻ sách cũ</title>
<link rel="stylesheet" href="quanlysach.css"/>
<script language="javascript" src="js.js"></script>
<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
</head>
<body>
    <div class="header">
        <div class="header_name">
            <div class="name">
            <i class="fas fa-book-open"></i><a href="homea.php?page=<?php echo $user['id'];?> ">Book Share</a>
            </div>
            <div class="login">
                <ul class="quanly">
                <li >
                <a class="user"><i class="far fa-user-circle"></i> <?php echo $user['username']; ?></a>
                <ul class="quanly_tv">
                   <li><a href="quanlysach.php">Quản lý sách <i class="fa-solid fa-angle-right"></i></a></li>
                    <li><a id='ad'href="quanlytaikhoan.php">Quản lý tài khoản <i class="fa-solid fa-angle-right"></i></a></li>
                    <li><a href="home.php">Đăng xuất</i></a></li>
                    <script >
                        $m="<?php echo $user['chucnang'];?>";
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
                   <a href="homea.php?page=<?php echo $user['id'];?> ">Home</a>
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
            <form action="quanlysach.php " class="search">
                <input name="q" value=""/>
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
       </div>
    </div>
    <div class="content">
        <div class="cont" style="padding-bottom:40px;">
            <div class="quanly" style="font-size:25px; padding:30px;">Quản lý sách cũ</div>
            <table class="table" width="90%" border="1">
                <button style="float: right;margin-right: 5%; margin-bottom: 2%;">
                    <a href="dangsach.php " class="button" style="font-size: 20px;">Đăng thông tin sách</a>
                </button> 
                <thead>
                  <tr>
                    <th>Tên sách cũ</th>
                    <th>Tác giả</th>        
                    <th>Điểm thưởng</th>
                    <th>Ảnh</th>
                    <th>Mô tả</th>
                    <th>Chức năng</th> 
                  </tr>
                </thead>
                <tbody>
                        <?php foreach ($sach as $key) { ?>
                           <tr style="text-align:left;">
                                <td style="padding:0 1%;" ><?php echo $key['TenS']; ?></td>
                                <td style="padding:0 1%;"><?php echo $key['TacGia']; ?></td>    
                                <td style="text-align:center;"><?php echo $key['Diem']; ?></td> 
                                <td><img src="<?php echo $key['anh']; ?>"></td>
                                <td style="width:48%;padding:0 1%;"><?php echo $key['MoTa']; ?></td>
                                <td style="width:10%; text-align: center;">
                                    <button style="width:40%;"><a href="SuaSach.php?idsc=<?php echo $key['ids']; ?> " >Sửa</a></button>
                                    <button style="width:40%;"><a href=" XoaSach.php?idsc=<?php echo $key['ids']; ?> ">Xóa</a></button>
                                </td>                                                                                                 
                          </tr>
                         <?php } ?>
                </tbody>
            </table>      
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