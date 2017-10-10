<?php
namespace App\classes;
use App\classes\Database;

class Cart{

    public function addToCart($quantity, $id){
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


    public function getCartProduct(){
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

    public function updateCartQty($cartId, $quantity){
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

    public function deleteCart($delid){
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

    public function checkCartTable(){
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


}




