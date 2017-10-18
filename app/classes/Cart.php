<?php
namespace App\classes;
use App\classes\Database;

class Cart{

    public static function addToCart($quantity, $id){
        $link = Database::db_connection();
        $quantity = mysqli_real_escape_string($link, $quantity);
        $id = mysqli_real_escape_string($link, $id);
        $sess_id = session_id();

        $sql = "SELECT * FROM products WHERE id ='$id'";
        $result=mysqli_query($link, $sql);
        $value = mysqli_fetch_assoc($result);
        $product_name  = $value['product_name'];
        $product_price = $value['product_price'];
        $product_image = $value['product_image'];

        //check cart
        $chkQuery = "SELECT * FROM cart WHERE product_id='$id' AND sess_id='$sess_id'";
        $result = mysqli_query($link, $chkQuery);
        $value = mysqli_fetch_assoc($result);
        if($value){
            $message = "<div class='alert alert-danger'><strong>Error! </strong>Product Already Added to Cart !</div>";
            return $message;
        }else{
            $sql = "INSERT INTO cart (sess_id, product_id, product_name, product_price, quantity, product_image) VALUES('$sess_id','$id','$product_name','$product_price','$quantity','$product_image')";
            $insert = mysqli_query($link, $sql);
            if($insert){
                header("Location:cart.php");
                echo "<script>window.location='cart.php'</script>";
            }else{
                header("Location:404.php");
            }
        }
    }


    public static function getCartProduct(){
        $link = Database::db_connection();
        $sess_id = session_id();
        $sql = "SELECT * FROM cart WHERE sess_id ='$sess_id'";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
            return $message;
        }
    }

    public static function updateCartQty($cartId, $quantity){
        $link = Database::db_connection();
        $cartId = mysqli_real_escape_string($link, $cartId);
        $quantity = mysqli_real_escape_string($link, $quantity);
        $sql = "UPDATE cart SET quantity='$quantity' WHERE cart_id='$cartId'";
        $result = mysqli_query($link, $sql);
        if($result){
            header("Location:cart.php");
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
            return $message;
        }
    }

    public static function deleteCart($delid){
        $link = Database::db_connection();
        $delid = mysqli_real_escape_string($link, $delid);
        $sql = "DELETE FROM cart WHERE cart_id='$delid'";
        $result = mysqli_query($link, $sql);
        if($result){
            //header("Location:cart.php");
            echo "<script>window.location=cart.php</script>";
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong> Product not Deleted".mysqli_errno($link)."</div>";
            return $message;
        }
    }

    public static function checkCartTable(){
        $link = Database::db_connection();
        $sess_id = session_id();
        $sql = "SELECT * FROM cart WHERE sess_id='$sess_id'";
        $result = mysqli_query($link, $sql);
        $value = mysqli_fetch_assoc($result);
        if($value){
            return $value;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
            return $message;
        }

    }

    public static function orderProduct($cmrId, $agent_id){
        $link = Database::db_connection();
        $sess_id = session_id();
        $cmrId = $cmrId;
        $agent_id = $agent_id;

        $sql = "SELECT * FROM cart WHERE sess_id='$sess_id'";
        $result = mysqli_query($link, $sql);
        $value = mysqli_fetch_assoc($result);

        $productId = $value['product_id'];
        $product_name = $value['product_name'];
        $product_price = $value['product_price'];
        $product_quantity = $value['quantity'];
        $product_image = $value['product_image'];
        if($agent_id == ""){
            $message = "<div class='alert alert-danger'><strong>Error! </strong>Field Must not Empty.</div>";
            return $message;
        }else{
            $query = "INSERT INTO orders (cmrId, agent_id, productId, product_name, product_quantity, product_price, product_image) VALUES ('$cmrId', '$agent_id', '$productId','$product_name','$product_quantity','$product_price','$product_image')";
            $insert = mysqli_query($link, $query);
            if($insert){
                $message = "<div class='alert alert-success'><strong>Success! </strong> Product Ordered Successfully. </div>";
                return $message;
            }else{
                $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
                return $message;
            }
        }


    }

    public static function delCustomerCart(){
        $link = Database::db_connection();
        $sess_id = session_id();
        $query = "DELETE FROM cart WHERE sess_id='$sess_id'";
        $delete = mysqli_query($link, $query);
        if($delete){
            echo "<script>window.location='index.php'</script>";
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
            return $message;
        }
    }

    public static function getOrderProduct(){
        $link = Database::db_connection();
        $sql = "SELECT o.*, u.* 
                FROM orders as o, users as u 
                WHERE o.agent_id = u.id 
                ORDER BY o.id DESC";

        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
            return $message;
        }
    }


}




