<?php
session_start();
include "admin/config/config.php";
?>
<?php
    if(!isset($_SESSION['dangnhap'])){
        header('Location:dangnhap.php');
    }
    if(isset($_SESSION['dangnhap']) &&($_SESSION['dangnhap']=='admin')){
        header("Location:admin/slider.php");
    }
    if(isset($_GET['action'])=='dangxuat'){
        unset($_SESSION['dangnhap']);
        header('Location:dangnhap.php');
    }

?>



<?php
$sql_danhmuc = "SELECT * FROM tbl_brand";
$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
$sql_phim = "SELECT * FROM tbl_product WHERE category_id='1' ";
$query_phim = mysqli_query($mysqli,$sql_phim);
$row_title_product = mysqli_fetch_array($query_phim);
?>
<?php
if(isset($_GET['theloai'])){
    $brand_id = $_GET['theloai'];
    $sql_theloai_1 = "SELECT * FROM tbl_brand WHERE brand_id='$brand_id' ";
    $query_theloai_1 = mysqli_query($mysqli,$sql_theloai_1);
    $row_title = mysqli_fetch_array($query_theloai_1);
}
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
</head>
<body>
    <header>
        <div class="nav container">
            <!-- logo -->
            <a href="index.php" class="logo">BookShop <span>Website</a>
             <!-- Tìm kiếm    -->
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
             
             <!-- NavBar -->
             <div class="navbar">
                <a href="index.php" class="nav-link"><i class='bx bx-home'></i><span class="nav-link-title">Trang chủ</span></a>
                <a href="category.php?danhmuc=1" class="nav-link"><i class='bx bx-book'></i><span class="nav-link-title">Sách</span></a>
                <a href="category.php?danhmuc=2" class="nav-link"><i class='bx bx-book-open'></i><span class="nav-link-title">Truyện tranh</span></a>
             </div>
        </div>
    </header>
    <br><br><br>
    <!-- Phim chiếu rạp -->
    <?php
            while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
    ?>
    <section class="chieurap container" id="chieurap">
        <div class="heading">
            <a href="brand.php?danhmuc=<?php echo $row_danhmuc['brand_id']?>" class="nav-link">
                <h2 class="heading-title"><?php echo $row_danhmuc['brand_name'] ?></h2>
            </a>
            
        </div>
        <div class="swiper chieurap-content">
            <div class="swiper-wrapper">
                <?php
                    $row_danhmuc_1=$row_danhmuc['brand_id'];
                    $sql_phim = "SELECT * FROM tbl_product WHERE brand_id='$row_danhmuc_1'";
                    $query_phim = mysqli_query($mysqli,$sql_phim);
                    while($row_phim = mysqli_fetch_array($query_phim)){
                ?>
                    
                    <div class="swiper-slide">
                        <div class="movie-box">
                            <img src="admin/uploads/<?php echo $row_phim['product_img'] ?>" class="movie-box-img">
                            <div class="box-text">
                                <h2 class="movie-title"><?php echo $row_phim['product_name'] ?></h2>
                                <span class="movie-type"><?php echo $row_phim['author'] ?></span>
                                <a href="product.php?phim=<?php echo $row_phim['product_id'] ?>" class="watch-btn play-btn"><i class="bx bx-play"></i></a>
                            </div>
                        </div>
                    </div>

                <?php
                    }
                ?>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
              
            </div>
        </div>
    </section>
    <?php
    } 
    ?>
    <div class="footer">
        <p>&#169 Trần Việt Hùng - Mã SV: B20DCCN301</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="./main.js"></script>
    
</body>
</html>