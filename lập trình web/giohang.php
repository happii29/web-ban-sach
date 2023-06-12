<?php
    session_start();
    include "admin/config/config.php";

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Website</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./font/fontawesome-free-6.3.0/css/all.min.css">

    <!-- Latest compiled and minified CSS
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    Latest compiled and minified JavaScript
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->

</head>
<body>
    <header>
        <div class="nav container">
        
            <a href="index.php" class="logo">BookShop <span>Website</a>
             
             <div class="search-box">
                <form action="search.php?timkiem" method="POST">
                    <input type="search" name="tukhoa" id="search-input" placeholder="Nhập từ khóa">
                    <input type="submit" name="timkiem" value="Tìm kiếm">     
                </form>
            </div>  
             <a href="#" class="user"><img src="./img/top-phim-hay-nhat-moi-thoi-dai-e1624773261842-1920x1070.jpg" class="user-img"></a>
             <div class="others">
                <li><a href="dangnhap.php" class="fa-solid fa-user"></a></li>
                <li><a href="giohang.php" class="fa-solid fa-lock"></a></li>
                <li><a href="logout.php">Đăng xuất : <?php if(isset($_SESSION['dangnhap'])){
                    echo $_SESSION['name'];
                } ?></a></li>
                
            </div>
            
             <div class="navbar">
                <a href="index.php" class="nav-link"><i class='bx bx-home'></i><span class="nav-link-title">Trang chủ</span></a>
                <a href="category.php?danhmuc=1" class="nav-link"><i class='bx bx-book'></i><span class="nav-link-title">Sách</span></a>
                <a href="category.php?danhmuc=2" class="nav-link"><i class='bx bx-book-open'></i><span class="nav-link-title">Truyện tranh</span></a>
             </div>
        </div>
    </header>
    <br><br><br><br><br><br><br><br><br><br><br>
    <!-- Gio hàng -->
    <section class="content container" id="content">
        <div class="heading">
            <a href="" class="nav-link">
                <h2 class="heading-title">Giỏ hàng của bạn</h2>
            </a>
        </div>

        <div class="cart">
            <table style="width:100%">
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Số lượng</th>
                <th>Giá thành</th>
                <th>Quản lý</th>
            </tr>
            <?php
            if(isset($_SESSION['cart'])){
                $i = 0;
                $tongtien=0;
                foreach($_SESSION['cart'] as $cart_item){
                    $thanhtien = $cart_item['number_book_sold']*$cart_item['price'];
                    $tongtien+=$thanhtien;
                    $i++;
            ?>
            <tr>
                <td><?php echo $cart_item['product_id']; ?></td>
                <td><?php echo $cart_item['product_name']; ?></td>
                <td><img src="admin/uploads/<?php echo $cart_item['product_img'];?>"></td>
                <td>
                    <a href="themsanpham.php?tru=<?php echo $cart_item['product_id'] ?>">-</a>
                    <?php echo $cart_item['number_book_sold']; ?>
                    <a href="themsanpham.php?cong=<?php echo $cart_item['product_id'] ?>">+</a>
                </td>
                <td><?php echo number_format($thanhtien,0,',','.').'vnđ'; ?></td>
                <td><a href="themsanpham.php?xoa=<?php echo $cart_item['product_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xoá</a></td>
            </tr>
            <?php
                }
            ?>
            <tr>
                <td colspan="8">
                    <p style="float: left;">Tổng tiền: <?php echo number_format($tongtien,0,',','.').'vnđ'; ?></p><br>
                    <p style="float: right;"><a href="themsanpham.php?xoatatca=1" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa tất cả</a></p>
                    <p style="float: right;padding-right: 20px;"><a href="dathang.php" onclick="return confirm('Bạn có chắc chắn muốn lưu?')">Lưu giỏ hàng</a></p>
                </td>
            </tr>
            <?php
            }else{
            ?>
            <tr>
                <td colspan="8"><p>Hiện tại giỏ hàng trống</p></td>
            </tr>
            <?php
            }
            ?>
            </table>
        </div>
    <!-- ---------------------- -->
        
    </section>
    
    <!-- ------------------------------- -->
    <div class="footer">
        <p>&#169 Trần Việt Hùng - Mã SV: B20DCCN301</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="./main.js"></script>
    
</body>
</html>







