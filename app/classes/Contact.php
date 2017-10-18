<?php
namespace App\classes;
use App\classes\Database;

class Contact{

    public static function sendMail($data){
        $link = Database::db_connection();
        $name = mysqli_real_escape_string($link, $data['name']);
        $email = mysqli_real_escape_string($link, $data['email']);
        $subject = mysqli_real_escape_string($link, $data['subject']);
        $message = mysqli_real_escape_string($link, $data['message']);
        $from = 'Leed World';
        $to = 'leedworld2017@gmail.com';
        $body = "From :".$name."\n Email : ".$email."\n Message : \n".$message."";
        if($name == "" || $email == "" || $subject == "" || $message == ""){
            $message = "<div class='alert alert-danger'><strong>Error! </strong> Field Must Not be Empty.</div>";
            return $message;
        }else{
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                $message = "<div class='alert alert-danger'><strong>Error! </strong> Invalid Email Address.</div>";
                return $message;
            }else {
                if (mail ($to, $subject, $body, $from)) {
                    $message = "<div class='alert alert-success'><strong>Success! </strong> message has been sent.</div>";
                    return $message;
                } else {
                    $message = "<div class='alert alert-danger'><strong>Error! </strong> ".mysqli_error($link)."Something went wrong, go back and try again</div>";
                    return $message;
                }
            }
        }
    }

    public static function updateContactInfo($data){
        extract($data);
        $link = Database::db_connection();
        $sql = "UPDATE contact SET company_name='$company_name', address='$address', mobile='$mobile', email='$email' WHERE id='1'";
        $result = mysqli_query($link, $sql);
        if($result){
            $message = "<div class='alert alert-success'><strong>Success! </strong> Contact Information Updated Successfully.</div>";
            return $message;
        }else {
            $message = "<div class='alert alert-danger'><strong>Error! </strong> ".mysqli_error($link)."</div>";
            return $message;
        }
    }


    public static function getcontactInfo(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM contact WHERE id='1'";
        $result = mysqli_query($link,$sql);
        $value = mysqli_fetch_assoc($result);
        if($value){
            return $value;
        } else {
            $message = "<div class='alert alert-danger'><strong>Error! </strong> ".mysqli_error($link)."</div>";
            return $message;
        }
    }


    public static function getSocialInfo(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM socials WHERE id='1'";
        $result = mysqli_query($link,$sql);
        $value = mysqli_fetch_assoc($result);
        if($value){
            return $value;
        } else {
            $message = "<div class='alert alert-danger'><strong>Error! </strong> ".mysqli_error($link)."</div>";
            return $message;
        }
    }

    public static function updateSocialInfo($data){
        extract($data);
        $link = Database::db_connection();
        $sql = "UPDATE socials SET fb='$fb', tw='$tw', ln='$ln', gp='$gp' WHERE id='1'";
        $result = mysqli_query($link, $sql);
        if($result){
            $message = "<div class='alert alert-success'><strong>Success! </strong> Social Information Updated Successfully.</div>";
            return $message;
        }else {
            $message = "<div class='alert alert-danger'><strong>Error! </strong> ".mysqli_error($link)."</div>";
            return $message;
        }
    }

    public static function getCopyRightText(){
        $link = $link = Database::db_connection();
        $sql = "SELECT * FROM copyright WHERE id='1'";
        $result = mysqli_query($link,$sql);
        $value = mysqli_fetch_assoc($result);
        if($value){
            return $value;
        } else {
            $message = "<div class='alert alert-danger'><strong>Error! </strong> ".mysqli_error($link)."</div>";
            return $message;
        }
    }

    public static function updateCopyRightText($copyright_text){
        $link = Database::db_connection();
        $sql = "UPDATE copyright SET copyright_text='$copyright_text' WHERE id='1' AND copyright_text='$copyright_text'";
        $result = mysqli_query($link, $sql);
        if($result){
            $message = "<div class='alert alert-success'><strong>Success! </strong> Copyright Information Updated Successfully.</div>";
            return $message;
        }else {
            $message = "<div class='alert alert-danger'><strong>Error! </strong> ".mysqli_error($link)."</div>";
            return $message;
        }
    }



}