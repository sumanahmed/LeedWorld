<?php
namespace App\classes;
use App\classes\Database;

class Product{

    public static function saveProductImage(){
        $link = Database::db_connection();
        $directory = 'uploads/product-image/';
        $imageUrl = $directory . $_FILES['product_image']['name'];

        $check = getimagesize($_FILES['product_image']['tmp_name']);
        if ($check) {
            if (file_exists($imageUrl)) {
                $message = "<div class='alert alert-danger'><strong>Error! </strong>File already Exists. Please ty another one.</div>";
                return $message;
            } else {
                if ($_FILES['product_image']['size'] > 8989000) {
                    $message = "<div class='alert alert-danger'><strong>Error! </strong>File size is too large. Maximum file size is 5MB.</div>";
                    return $message;
                } else {
                    $fileType = pathinfo($imageUrl, PATHINFO_EXTENSION);
                    if ($fileType == 'jpg' || $fileType == 'png') {
                        move_uploaded_file($_FILES['product_image']['tmp_name'], $imageUrl);
                        return $imageUrl;
                    } else{
                        $message = "<div class='alert alert-danger'><strong>Error! </strong>File type must be jpg or png.</div>";
                        return $message;
                    }
                }
            }
        } else {
            $message = "<div class='alert alert-danger'><strong>Error! </strong>Please use an image file to upload.</div>";
            return $message;
        }
    }

    public static function saveProductInfo($data){
        $link = Database::db_connection();
        $imageUrl = Product::saveProductImage();
        extract($data);
        if($imageUrl) {
            $sql = "INSERT INTO products (product_name, category_id, product_description, product_image, product_price, product_point, publication_status) VALUES('$product_name','$category_id','$product_description','$imageUrl','$product_price','100','$publication_status') ";
            $insert = mysqli_query($link, $sql);
            if($insert) {
                $message = "<div class='alert alert-success'><strong>Success! </strong>Product Info Save Successfully.</div>";
                return $message;
            }else {
                $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
                return $message;
            }
        }
    }


    public static function getAllProductInfo(){
        $link = Database::db_connection();
        $sql = "SELECT p.*,c.category_name FROM products as p, categories as c WHERE p.category_id = c.category_id ";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
            return $message;
        }
    }

    public static function getProductInfoById($id){
        $link = Database::db_connection();
        $sql = "SELECT p.*,c.category_name FROM products as p, categories as c WHERE p.category_id = c.category_id AND p.id = '$id'";
        $result = mysqli_query($link, $sql);
        $value=mysqli_fetch_assoc($result);
        if($value){
            return $value;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
            return $message;
        }
    }

    public static function unPublishedProductInfo($id){
        $link = Database::db_connection();
        $sql = "UPDATE products SET publication_status=0 WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        if($result){
            $message = "<div class='alert alert-success'><strong>Success! </strong> Product Unpublished Successfylly.</div>";
            return $message;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
            return $message;
        }
    }

    public static function publishedProductInfo($id){
        $link = Database::db_connection();
        $sql = "UPDATE products SET publication_status=1 WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        if($result){
            $message = "<div class='alert alert-success'><strong>Success! </strong> Product Published Successfylly.</div>";
            return $message;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
            return $message;
        }
    }


    public static function updateProductInfo($id, $data){
        $link = Database::db_connection();
        extract($data);
        $imageName = $_FILES['product_image']['name'];
        if($imageName){
           $imageUrl = Product::saveProductImage();

           $sql = "SELECT * FROM products WHERE id='$id'";
           $result = mysqli_query($link, $sql);
           $delImage = mysqli_fetch_assoc($result);
           unlink($delImage['product_image']);

           $sql = "UPDATE products SET product_name='$product_name', category_id='$category_id', product_description='$product_description', product_image='$imageUrl', product_price='$product_price', publication_status='$publication_status' WHERE id='$id' ";
           $update = mysqli_query($link, $sql);
           if($update){
               $message = "<div class='alert alert-success'><strong>Success! </strong>Prdouct Information Updated Successfylly.</div>";
               return $message;
           }else{
               $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
               return $message;
           }
        }else{
            $sql = "UPDATE products SET product_name='$product_name', category_id='$category_id', product_description='$product_description',  product_price='$product_price', publication_status='$publication_status' WHERE id='$id' ";
            $update = mysqli_query($link, $sql);
            if($update){
                $message = "<div class='alert alert-success'><strong>Success! </strong>Prdouct Information Updated Successfylly.</div>";
                return $message;
            }else{
                $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
                return $message;
            }
        }

    }


    public static function getSingleProduct($id){
        $link = Database::db_connection();
        $sql = "SELECT * FROM products WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
            return $message;
        }
    }

    public static function deleteProductInfoById($id){
        $link = Database::db_connection();

        $sql ="SELECT * FROM products WHERE id = '$id' ";
        $result = mysqli_query($link,$sql);
        $delImage = mysqli_fetch_assoc($result);
        $delLink = $delImage['product_image'];
        unlink($delLink);

        $sql = "DELETE FROM products WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        if($result){
            $message = "<div class='alert alert-success'><strong>Success! </strong>Product Deleted Successfully. </div>";
            return $message;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_error($link)."</div>";
            return $message;
        }
    }

    //in front post page
    public static function textShorten($text, $limit = 400){
        $text = $text. " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text.".....";
        return $text;
    }

    public static function productByCat($id){
        $link = Database::db_connection();
        $sql = "SELECT * FROM products WHERE category_id='$id'";
        $result = mysqli_query($link, $sql);;
        if($result){
            return $result;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
            return $message;
        }
    }

    public static function getProductRow(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM products";
        $result = mysqli_query($link,$sql);
        if($result){
            return $result;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
            return $message;
        }
    }

    public static function productSearch($search){
        $link = Database::db_connection();
        $sql = "SELECT * FROM products WHHERE product_name LIKE '%$search%'";
        $result = mysqli_query($link,$sql);
        if($result){
            return $result;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
            return $message;
        }
    }


}