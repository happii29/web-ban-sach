<?php
include "database.php";
?>
<?php

class product {
    private $db;

    public function __construct(){
        $this -> db = new Database();
    }

    public function show_category(){
            $query = "SELECT * FROM tbl_category ORDER BY category_id DESC";
            $result = $this ->db->select($query);
            return $result;
    }
    public function show_brand(){
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT tbl_brand.*, tbl_category.category_name
        FROM tbl_brand INNER JOIN tbl_category ON tbl_brand.category_id = tbl_category.category_id
        ORDER BY tbl_brand.brand_id DESC";
        $result = $this ->db->select($query);
        return $result;
    }
    public function show_brand_ajax($category_id){
        $query = "SELECT * FROM tbl_brand WHERE category_id = '$category_id'";
        $result = $this ->db->select($query);
        return $result;
    }
    public function show_product(){
        $query = "SELECT tbl_product.*,tbl_brand.brand_name ,tbl_category.category_name
        FROM tbl_product INNER JOIN tbl_brand INNER JOIN tbl_category ON tbl_product.brand_id = tbl_brand.brand_id AND tbl_brand.category_id = tbl_category.category_id
        ORDER BY tbl_product.product_id DESC";
        $result = $this ->db->select($query);
        return $result;
    }
    public function get_product($product_id){
        $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this ->db->select($query);
        return $result;
    }
    public function insert_product() {
        $product_name=$_POST['product_name'];
        $category_id=$_POST['category_id'];
        $brand_id=$_POST['brand_id'];
        $product_author=$_POST['product_author'];
        $product_desc=$_POST['product_desc'];
        $product_date=$_POST['product_date'];
        $product_price=$_POST['product_price'];
        $product_category=$_POST['product_category'];
        $product_number_page=$_POST['product_number_page'];
        $product_img_desc=$_FILES['product_img_desc']['name'];
        move_uploaded_file($_FILES['product_img_desc']['tmp_name'],"uploads/".$_FILES['product_img_desc']['name']);


        if (empty($product_name) ||empty($product_desc) || empty($category_id) || empty($brand_id) || empty($product_author) || empty($product_date) || empty($product_price)|| empty($product_category)||empty($product_number_page)||empty($product_img_desc)) {
            echo "Vui lòng điền đầy đủ thông tin.";
            return false;
        }

        

        $query_A = "SELECT * FROM tbl_product WHERE product_name = '$product_name' AND author = '$product_author'";
        $result_A = $this->db->select($query_A);

        if ($result_A->num_rows > 0) {
            echo "Sách đã tồn tại trong CSDL.";
            return false;
        }

        

        $query = "INSERT INTO tbl_product (
            product_name,
            category_id,
            brand_id,
            author,
            product_desc,
            date,
            price,
            product_category,
            number_page,
            product_img)
            VALUE (
                '$product_name',
                '$category_id',
                '$brand_id',
                '$product_author',
                '$product_desc',
                '$product_date',
                '$product_price',
                '$product_category',
                '$product_number_page',
                '$product_img_desc')";
        $result = $this ->db->insert($query);
        header('Location:productlist.php');
        return $result;
    }
    public function delete_product($product_id){
        $query = "DELETE FROM tbl_product WHERE product_id = '$product_id' ";
        $result = $this ->db->delete($query);
        header('Location:productlist.php');
        return $result;
    }
    public function update_product() {
        $product_name=$_POST['product_name'];
        $category_id=$_POST['category_id'];
        $brand_id=$_POST['brand_id'];
        $product_author=$_POST['product_author'];
        $product_desc=$_POST['product_desc'];
        $product_date=$_POST['product_date'];
        $product_price=$_POST['product_price'];
        $product_category=$_POST['product_category'];
        $product_number_page=$_POST['product_number_page'];
        $product_img_desc=$_FILES['product_img_desc']['name'];
        move_uploaded_file($_FILES['product_img_desc']['tmp_name'],"uploads/".$_FILES['product_img_desc']['name']);
        
        $query = "UPDATE tbl_product SET
            product_name='$product_name',
            category_id='$category_id',
            brand_id='$brand_id',
            author='$product_author',
            product_desc='$product_desc',
            date='$product_date',
            price='$product_price',
            product_category='$product_category',
            number_page='$product_number_page',
            product_img='$product_img_desc' WHERE product_id = $_GET[product_id] ";
            
        $result = $this ->db->insert($query);
        header('Location:productlist.php');
        return $result;
    }


























    public function insert_brand($category_id,$brand_name) {
        $query = "INSERT INTO tbl_brand (category_id,brand_name) VALUE ('$category_id','$brand_name')";
        $result = $this ->db->insert($query);
        header('Location:brandlist.php');
        return $result;
    }
    
    
    public function get_brand($brand_id){
        $query = "SELECT * FROM tbl_brand WHERE brand_id = '$brand_id'";
        $result = $this ->db->select($query);
        return $result;
    }
    public function update_brand($category_id,$brand_name,$brand_id){
        $query = "UPDATE tbl_brand SET brand_name ='$brand_name',category_id = '$category_id' WHERE brand_id = '$brand_id' ";
        $result = $this ->db->update($query);
        header('Location:brandlist.php');
        return $result;
    }
    public function delete_brand($brand_id){
        $query = "DELETE FROM tbl_brand WHERE brand_id = '$brand_id' ";
        $result = $this ->db->delete($query);
        header('Location:brandlist.php');
        return $result;
    }



    public function get_category($category_id){
        $query = "SELECT * FROM tbl_category WHERE category_id = '$category_id'";
        $result = $this ->db->select($query);
        return $result;
    }
    public function update_category($category_name,$category_id){
        $query = "UPDATE tbl_category SET category_name ='$category_name' WHERE category_id = '$category_id' ";
        $result = $this ->db->update($query);
        header('Location:categorylist.php');
        return $result;
    }
    public function delete_category($category_id){
        $query = "DELETE FROM tbl_category WHERE category_id = '$category_id' ";
        $result = $this ->db->delete($query);
        header('Location:categorylist.php');
        return $result;
    }
}

?>