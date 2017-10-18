<?php
namespace App\classes;
use App\classes\Database;

class Member{


    public static function userLoginCheck($data){
        $link = Database::db_connection();
        $user_id = $data['user_id'];
        $password = md5($data['password']);

        $sql = "SELECT * FROM users WHERE user_id = '$user_id' AND password = '$password' ";
        if(mysqli_query($link, $sql)){
            $queryResult = mysqli_query($link, $sql);
            $userInfo = mysqli_fetch_assoc($queryResult);
            if($userInfo){
                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION['id'] = $userInfo['id'];
                $_SESSION['name'] = $userInfo['name'];
                //header("Location:member.php");
                echo "<script>window.location = 'member.php'</script>";
            }else{
                $message = "<div class='alert alert-danger'><strong>Error ! </strong>Invalid User ID or Password</div>";
                return $message;
            }
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
            return $message;
        }
    }

    public static function registerUser($data){
        $link = Database::db_connection();
        $name = mysqli_real_escape_string($link, $data['name']);
        $mobile_no = mysqli_real_escape_string($link, $data['mobile_no']);
        $referral_id = mysqli_real_escape_string($link, $data['referral_id']);
        $email = mysqli_real_escape_string($link, $data['email']);
        $address = mysqli_real_escape_string($link, $data['address']);
        $user_id = mysqli_real_escape_string($link, $data['user_id']);
        $password = mysqli_real_escape_string($link,md5($data['password']));

        if($name == "" || $mobile_no == "" || $referral_id == "" || $email == "" || $address == "" || $user_id == "" || $password == "") {
            $message = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be Empty ! </div>";
            return $message;
        }else {
            $link = Database::db_connection();
            $sql = "SELECT * FROM users WHERE user_id='$user_id' LIMIT 1";
            $usrId = mysqli_query($link, $sql);
            $value = mysqli_fetch_assoc($usrId);
            if($value == TRUE){
                $message = "<div class='alert alert-danger'><strong>Error ! </strong> User ID Already Exist.</div>";
                return $message;
            }else{
                $sql = "INSERT INTO users (name, mobile_no, referral_id, designation, email, address, user_id, password, role) VALUES ('$name', '$mobile_no', '$referral_id', 'starter', '$email', '$address',  '$user_id', '$password', 'user')";
                $insert = mysqli_query($link, $sql);
                if ($insert) {
                    $message = "<div class='alert alert-success'><strong>Successs ! </strong>User Information Save Successfylly.</div>";
                    return $message;
                } else {
                    $message = "<div class='alert alert-danger'><strong>Error ! </strong>" . mysqli_error($link) . "</div>";
                    return $message;
                }
            }


        }
    }

    public static function getUserBySessionId($id){
        $link = Database::db_connection();
        $sql = "SELECT * FROM users WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
            return $message;
        }
    }



    public static function updateUserInfo($data, $userid){
        $link = Database::db_connection();
        $name = $data['name'];
        $mobile_no = $data['mobile_no'];
        $email = $data['email'];
        $address = $data['address'];
        if($name == "" || $mobile_no == "" || $email == "" || $address == "" ) {
            $message = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be Empty ! </div>";
            return $message;
        }else {
            $link = Database::db_connection();
            $sql = "UPDATE users SET name='$name', mobile_no='$mobile_no', email='$email', address='$address' WHERE id='$userid'";
            $update = mysqli_query($link, $sql);
            if ($update) {
                $message = "<div class='alert alert-success'><strong>Successs ! </strong>User Information Updated Successfylly.</div>";
                return $message;
            } else {
                $message = "<div class='alert alert-danger'><strong>Error ! </strong>" . mysqli_error($link) . "</div>";
                return $message;
            }
        }
    }


    public static function updatePassword($data, $id){
        $link = Database::db_connection();
        $old_password = md5($data['old_password']);
        $new_password = md5($data['new_password']);

        $sql = "SELECT password FROM users WHERE password='$old_password'";
        $result = mysqli_query($link, $sql);
        $value = mysqli_fetch_assoc($result);
        $db_password = $value['password'];
        if($old_password = $db_password){
            $sql = "UPDATE users SET password='$new_password' WHERE id='$id'";
            $result = mysqli_query($link, $sql);
            if($result){
                $message = "<div class='alert alert-success'><strong>Successs ! </strong> Password Updated Successfylly.</div>";
                return $message;
            }else{
                $message = "<div class='alert alert-danger'><strong>Error ! </strong>" . mysqli_error($link) . "</div>";
                return $message;
            }
        }
    }

    public static function getAgentNameWithAddress(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM users WHERE role='agent'";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
            return $message;
        }
    }

    public static function userLogOut(){
        session_destroy();
        header("Location:login.php");
    }
}