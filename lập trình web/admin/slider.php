<?php
    include "header.php";
?>
<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header('Location:/LẬP TRÌNH WEB/dangnhap.php');
    }
    if(isset($_GET['action'])=='dangxuat'){
        unset($_SESSION['dangnhap']);
        header('Location:/LẬP TRÌNH WEB/dangnhap.php');
    }

?>
<section class="admin-content">
        <div class="admin-ct-left">
            <ul>
                <li><a href="">Danh mục</a>
                    <ul>
                        <li><a href="categoryadd.php">Thêm danh mục</a></li>
                        <li><a href="categorylist.php">Danh sách Danh mục</a></li>
                    </ul>
                </li>
                    
                <li><a href="">Thể loại</a>
                    <ul>
                        <li><a href="brandadd.php">Thêm thể loại</a></li>
                        <li><a href="brandlist.php">Danh sách thể loại</a></li>
                    </ul>
                </li>
                <li><a href="">Sách</a>
                    <ul>
                        <li><a href="productadd.php">Thêm sách</a></li>
                        <li><a href="productlist.php">Danh sách sách</a></li>
                    </ul>
                </li>
                <li><a href="slider.php?action=dangxuat">Đăng xuất : <?php if(isset($_SESSION['dangnhap'])){
                    echo $_SESSION['dangnhap'];
                } ?></a></li>
            </ul>
        </div>