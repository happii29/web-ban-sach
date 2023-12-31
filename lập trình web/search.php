<?php
session_start();
include "admin/config/config.php";
?>

<?php
if(isset($_POST['timkiem'])){
    $tukhoa = $_POST['tukhoa'];
}
$sql_phim_1 = "SELECT * FROM tbl_product WHERE tbl_product.product_name LIKE '%".$tukhoa."%'";
$query_phim_1 = mysqli_query($mysqli,$sql_phim_1);
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
             <!-- ---------Navbar--------- -->
            <div class="navbar">
                <a href="index.php" class="nav-link"><i class='bx bx-home'></i><span class="nav-link-title">Trang chủ</span></a>
                <a href="category.php?danhmuc=1" class="nav-link"><i class='bx bx-book'></i><span class="nav-link-title">Sách</span></a>
                <a href="category.php?danhmuc=2" class="nav-link"><i class='bx bx-book-open'></i><span class="nav-link-title">Truyện tranh</span></a>
             </div>
        </div>
    </header>
    <br><br><br>
    <!-- Phim chiếu rạp -->
    <section class="movies container" id="movies">
        <div class="heading">
            <a href="" class="nav-link">
                <h2 class="heading-title">Tìm kiếm sách: <?php echo $_POST['tukhoa']; ?></h2>
            </a>  
        </div>
        <div class="movies-content">
            <?php
                while($row_phim = mysqli_fetch_array($query_phim_1)){
            ?>
            <div class="movie-box">
                <img src="admin/uploads/<?php echo $row_phim['product_img'] ?>" class="movie-box-img">
                <div class="box-text">
                    <h2 class="movie-title"><?php echo $row_phim['product_name'] ?></h2>
                    <span class="movie-type"><?php echo $row_phim['author'] ?></span>
                    <a href="product.php?phim=<?php echo $row_phim['product_id'] ?>" class="watch-btn play-btn">
                        <i class="bx bx-play"></i>
                    </a>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </section>
    <div class="footer">
        <p>&#169 Trần Việt Hùng - Mã SV: B20DCCN301</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="./main.js"></script>
    
</body>
</html>