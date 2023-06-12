<?php
session_start();
include "admin/config/config.php";
?>

<?php
$sql_danhmuc = "SELECT * FROM tbl_category";
$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
?>
<?php

if(isset($_GET['phim'])){
    $product_id = $_GET['phim'];
    $sql_phim = "SELECT * FROM tbl_product WHERE product_id='$product_id' ";
    $query_phim = mysqli_query($mysqli,$sql_phim);
    $row_phim = mysqli_fetch_array($query_phim);
}

if(isset($_POST['binhluan_submit'])){
    $product_id_bl = $_POST['product_id_binhluan'];
    $tenbinhluan=$_POST['tennguoibinhluan'];
    $binhluan =$_POST['binhluan'];
    $danhgia = $_POST['danhgia'];
    if(empty($tenbinhluan)||empty($binhluan)){
        echo "Vui lòng điền đầy đủ thông tin";
        return false;
    }else{
        $sql_binhluan = "INSERT INTO binhluan(binhluan_id,tenbinhluan,binhluan,product_id,danhgia) VALUES(NULL,'$tenbinhluan','$binhluan','$product_id_bl','$danhgia')";
        $result = mysqli_query($mysqli,$sql_binhluan);
    }
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
    <!-- Phim chiếu rạp -->
    <section class="content container" id="content">
        <div class="heading">
            <a href="" class="nav-link">
                <h2 class="heading-title">THÔNG TIN VỀ SÁCH</h2>
            </a>
        </div>

        <div class="block" id="page-info">  
          <div class="info">
              <h2 class="title fr"><?php echo $row_phim['product_name'] ?></h2>
              <div class="poster"><a href="#" title="Xem"><img src="admin/uploads/<?php echo $row_phim['product_img'] ?>"></a></div>
              <div class="dinfo">
                  <div class="col1 fr">
                      <ul>
                          <li>Giá thành: <span class="status1"><?php echo $row_phim['price'] ?>&nbsp;</span></li>
                          <li>Tác giả: <?php echo $row_phim['author'] ?></li>
                          <li>Số trang: <?php echo $row_phim['number_page'] ?></li>
                          <li>Thể loại: <?php echo $row_phim['product_category'] ?></a></li>
                      </ul>
                  </div>
                  <div class="col2">
                      <ul>
                          <li>Ngày xuất bản: <?php echo $row_phim['date'] ?></li>
                          <li>Lượt bán: <?php echo $row_phim['number_book_sold'] ?></li>
                          <li>Đăng bởi: Không xác định</li>
                      </ul>
                  </div>
              </div>
              <div class="groups-btn">
                  <a href="themsanpham.php?phim=<?php echo $row_phim['product_id'] ?>"><div class="btn-watch fr"></div></a>
              </div>
          </div>
          <div class="detail">
              <div class="blocktitle tab">Thông tin sách</div>
              <div class="content">
                  <h4>Nội dung trong sách <?php echo $row_phim['product_name'] ?>:</h4>
                  <p><?php echo $row_phim['product_desc'] ?>..</p>
              </div>
          </div>
        </div>
        <br><br>
        <h2 class="heading">Đánh giá về sản phẩm</h2><br><br>
        <div class="binhluan">
            <br>
            <?php
            $sql_phim_1 = "SELECT * FROM binhluan WHERE product_id='$product_id' ";
            $query_phim_1 = mysqli_query($mysqli,$sql_phim_1);
            if (mysqli_num_rows($query_phim_1) > 0) {
                while ($row_danhgia = mysqli_fetch_array($query_phim_1)) {
                    $ten_nguoi_danh_gia = $row_danhgia['tenbinhluan'];
                    $binh_luan = $row_danhgia['binhluan'];
                    $danh_gia = $row_danhgia['danhgia'];

                    echo "<p><strong>{$ten_nguoi_danh_gia}</strong>: {$binh_luan}</p>";
                    echo "<p>Đã đánh giá: ";
                    for ($i = 1; $i <= $danh_gia; $i++) {
                        echo "<img src='img/star.png' alt='star'>";
                    }
                    echo "</p>\n";

                }
            } else {
                echo "<p>Chưa có đánh giá nào cho sản phẩm này.</p>";
            }
            ?>
            <br><br>
        </div>
        <br><br><br><br><br><br>
        <!-- ---------------------- -->
        <div class="danhgia" >
            <h5>Ý kiến sản phẩm</h5>
            <form action="product.php?phim=<?php echo $row_phim['product_id'] ?>" method="POST" style="display:block">
                <p><input type="hidden" value="<?php echo $row_phim['product_id'] ?>" name="product_id_binhluan"></p>
                <p><input required type="text" placeholder="Điền tên" class="form-control" name="tennguoibinhluan"></p>
                <p><textarea required style="resize: none" placeholder="Bình luận về sách...." class="form-control" name="binhluan" cols="60" rows="5"></textarea></p>
                
                <div class="star">
                    <span>Đánh giá:</span>
                    <input type="radio" name="danhgia" value="1" id="star1"><label for="star1"><img src="img/star.png" alt="1 star"></label>
                    <input type="radio" name="danhgia" value="2" id="star2"><label for="star2"><img src="img/star.png" alt="2 stars"></label>
                    <input type="radio" name="danhgia" value="3" id="star3"><label for="star3"><img src="img/star.png" alt="3 stars"></label>
                    <input type="radio" name="danhgia" value="4" id="star4"><label for="star4"><img src="img/star.png" alt="4 stars"></label>
                    <input type="radio" name="danhgia" value="5" id="star5"><label for="star5"><img src="img/star.png" alt="5 stars"></label>
                </div>
                <p><input type="submit" name="binhluan_submit" class="btn btn-success" value="Gửi bình luận"></p>
            </form>
        </div>
    </section>
    
    <!-- ------------------------------- -->
    <div class="footer">
        <p>&#169 Trần Việt Hùng - Mã SV: B20DCCN301</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="./main.js"></script>
    
</body>
</html>
