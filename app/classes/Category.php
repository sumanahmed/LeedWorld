<?php
namespace App\classes;
use App\classes\Database;

class Category {

    public static function addCategory($data){
        $link = Database::db_connection();
        $categoryName = mysqli_real_escape_string($link, $data['category_name']);

        if($categoryName == "" ){
            $message = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be Empty ! </div>";
            return $message;
        }else{
            $sql = "INSERT INTO categories (category_name) VALUES('$categoryName')";
            $result = mysqli_query($link, $sql);
            if($result){
                $message = "<div class='alert alert-success'><strong>Success! </strong>Category Inserted Successfully. </div>";
                return $message;
            }else{
                $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_error($link)."</div>";
                return $message;
            }
        }
    }


    public static function getAllCategory(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM categories ORDER BY category_id ASC";
        $result = mysqli_query($link, $sql);
        return $result;
    }

    public static function getCategoryById($id){
        $link = Database::db_connection();
        $sql = "SELECT * FROM categories WHERE category_id = '$id'";
        $result = mysqli_query($link, $sql);
        $value = mysqli_fetch_assoc($result);
        return $value;
    }

    public static function updateCategory($id, $data){
        $link = Database::db_connection();
        $categoryName = mysqli_real_escape_string($link, $data['category_name']);

        if($categoryName == "" ){
            $message = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be Empty ! </div>";
            return $message;
        }else {
            $sql = "UPDATE categories SET category_name='$categoryName' WHERE category_id = '$id'";
            $result = mysqli_query($link, $sql);
            if($result){
                $message = "<div class='alert alert-success'><strong>Success! </strong>Category Updated Successfully. </div>";
                return $message;
            }else{
                $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_error($link)."</div>";
                return $message;
            }
        }
    }

    public static function deleteCategoryById($id){
        $link = Database::db_connection();
        $sql = "DELETE FROM categories WHERE category_id = '$id'";
        $result = mysqli_query($link, $sql);
        if($result){
            $message = "<div class='alert alert-success'><strong>Success! </strong>Category Deleted Successfully. </div>";
            return $message;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_error($link)."</div>";
            return $message;
        }
    }


}
