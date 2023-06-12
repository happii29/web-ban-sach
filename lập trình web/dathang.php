<?php
    session_start();
    include "admin/config/config.php";
    //luu gio hang
    
    foreach($_SESSION['cart'] as $key => $value){
        $product_id = $value['product_id'];
        $number_book_sold = $value['number_book_sold'];

        
        $sql_phim = "SELECT * FROM tbl_product WHERE product_id='$product_id' ";
        $query_phim = mysqli_query($mysqli,$sql_phim);
        $row_phim = mysqli_fetch_array($query_phim);

        $number_book_sold+=$row_phim['number_book_sold'];

        $sql_dathang="UPDATE tbl_product SET number_book_sold = '$number_book_sold' WHERE product_id = $product_id";
        mysqli_query($mysqli,$sql_dathang);    
    }
    header('Location:giohang.php');
    
        
    

?>