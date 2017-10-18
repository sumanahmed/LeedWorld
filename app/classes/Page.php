<?php
namespace App\classes;
use App\classes\Database;

class Page
{
    public static function updateAboutContent($data){
        $link = Database::db_connection();
        $about_content = $data['about_content'];
        $sql = "UPDATE about SET about_content='$about_content' WHERE id='1'";
        $result = mysqli_query($link, $sql);
        if($result){
            $message = "<div class='alert alert-success'><strong>Success! </strong>About Content Update Successfully</div>";
            return $message;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_error($link)."</div>";
            return $message;
        }

    }


    public static function getAboutContent(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM about WHERE id = '1'";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_error($link)."</div>";
            return $message;
        }
    }
}