<?php
 session_start();   
 include "admin/config/config.php";
 
 //them so luong
 if(isset($_GET['cong'])){
    $id = $_GET['cong'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['product_id']!=$id){
            $product[]=array('product_id'=>$cart_item['product_id'],'product_name'=>$cart_item['product_name'],'number_book_sold'=>$cart_item['number_book_sold'],'price'=>$cart_item['price'],'product_img'=>$cart_item['product_img'],);
            $_SESSION['cart'] = $product;
        }else{
            $tangsoluong = $cart_item['number_book_sold'] + 1;
            if($cart_item['number_book_sold']<9){
                $product[]=array('product_id'=>$cart_item['product_id'],'product_name'=>$cart_item['product_name'],'number_book_sold'=>$tangsoluong,'price'=>$cart_item['price'],'product_img'=>$cart_item['product_img'],);
            }else{
                $product[]=array('product_id'=>$cart_item['product_id'],'product_name'=>$cart_item['product_name'],'number_book_sold'=>$cart_item['number_book_sold'],'price'=>$cart_item['price'],'product_img'=>$cart_item['product_img'],);
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location:giohang.php');
 }
 //tru so luong
 if(isset($_GET['tru'])){
    $id = $_GET['tru'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['product_id']!=$id){
            $product[]=array('product_id'=>$cart_item['product_id'],'product_name'=>$cart_item['product_name'],'number_book_sold'=>$cart_item['number_book_sold'],'price'=>$cart_item['price'],'product_img'=>$cart_item['product_img'],);
            $_SESSION['cart'] = $product;
        }else{
            $tangsoluong = $cart_item['number_book_sold'] - 1;
            if($cart_item['number_book_sold']>1){
                $product[]=array('product_id'=>$cart_item['product_id'],'product_name'=>$cart_item['product_name'],'number_book_sold'=>$tangsoluong,'price'=>$cart_item['price'],'product_img'=>$cart_item['product_img'],);
            }else{
                $product[]=array('product_id'=>$cart_item['product_id'],'product_name'=>$cart_item['product_name'],'number_book_sold'=>$cart_item['number_book_sold'],'price'=>$cart_item['price'],'product_img'=>$cart_item['product_img'],);
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location:giohang.php');
 }
 //xoa san pham
 if(isset($_SESSION['cart'])&&isset($_GET['xoa'])){
    $id=$_GET['xoa'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['product_id']!=$id){
            $product[]=array('product_id'=>$cart_item['product_id'],'product_name'=>$cart_item['product_name'],'number_book_sold'=>$cart_item['number_book_sold'],'price'=>$cart_item['price'],'product_img'=>$cart_item['product_img'],);
        }
        $_SESSION['cart'] = $product;
        header('Location:giohang.php');
    }
 }
 //xoa tat ca san pham
 if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1){
    unset($_SESSION['cart']);
    header('Location:giohang.php');
 }
 //them san pham vao gio hang
 if(isset($_GET['phim'])){
    $id = $_GET['phim'];
    $soluong=1;
    $sql="SELECT * FROM tbl_product WHERE product_id='".$id."' LIMIT 1" ;
    $query = mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($query);
    if($row){
        $new_product = array(array('product_id'=>$row['product_id'],'product_name'=>$row['product_name'],'number_book_sold'=>$soluong,'price'=>$row['price'],'product_img'=>$row['product_img'],));
        //kiem tra session gio hang ton tai
        if(isset($_SESSION['cart'])){
            $found = false;
            foreach($_SESSION['cart'] as $cart_item){
                //neu du lieu trung
                if($cart_item['id']==$id){
                    $product[]=array('product_id'=>$cart_item['product_id'],'product_name'=>$cart_item['product_name'],'number_book_sold'=>$soluong+1,'price'=>$cart_item['price'],'product_img'=>$cart_item['product_img'],);
                    $found= true;
                }else{
                    //neu du lieu ko trung
                    $product[]=array('product_id'=>$cart_item['product_id'],'product_name'=>$cart_item['product_name'],'number_book_sold'=>$soluong,'price'=>$cart_item['price'],'product_img'=>$cart_item['product_img'],);
                }
            }
            if($found==false){
                //lien ket du lieu new_product voi product
                $_SESSION['cart']=array_merge($product,$new_product);
            }else{
                $_SESSION['cart']=$product;
            }
        }else{
            $_SESSION['cart']=$new_product;
        }
    }
    header('Location:giohang.php');
 }
?>