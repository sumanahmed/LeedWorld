<?php
namespace App\classes;
use App\classes\Database;

class Login
{
    public static function registerUser($data){
        $link = Database::db_connection();
        $name = mysqli_real_escape_string($link, $data['name']);
        $mobile_no = mysqli_real_escape_string($link, $data['mobile_no']);
        $referral_id = mysqli_real_escape_string($link, $data['referral_id']);
        $email = mysqli_real_escape_string($link, $data['email']);
        $address = mysqli_real_escape_string($link, $data['address']);
        $password = mysqli_real_escape_string($link, md5($data['password']));

        if($name == "" || $mobile_no == "" || $referral_id == "" || $email == "" || $address == "" ||  $password == "") {
            $message = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be Empty ! </div>";
            return $message;
        }else{
            $mailQuery = "SELECT * FROM users WHERE email='$email' LIMIT 1";
            $result = mysqli_query($link, $mailQuery);
            $mailchk = mysqli_fetch_assoc($result);
            if ($mailchk != false) {
                $message = "<div class='alert alert-danger'><strong>Error ! </strong> Email Already Exist.</div>";
                return $message;
            }else{
                $sql = "INSERT INTO users (name, mobile_no, referral_id, designation, email, address, password, role) VALUES('$name','$mobile_no','$referral_id','starter', '$email','$address', '$password', 'user')";
                $result = mysqli_query($link, $sql);
                if($result){
                    $message = "<div class='alert alert-success'><strong>Success! </strong>Your Registration Complete.</div>";
                    return $message;
                }else{
                    $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_error($link)."</div>";
                    return $message;
                }
            }

        }
    }

    public static function adminLoginCheck($data)
    {
        $email = $data['email'];
        $password = md5($data['password']);

        $link = Database::db_connection();

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
        if(mysqli_query($link, $sql)){
            $queryResult = mysqli_query($link, $sql);
            $userInfo = mysqli_fetch_assoc($queryResult);
            if($userInfo){
                session_start();
                $_SESSION['id'] = $userInfo['id'];
                $_SESSION['name'] = $userInfo['name'];
                header("Location:dashboard.php");
            }else{

                $message = "<div class='alert alert-danger'><strong>Error ! </strong>Please use valid email address & password</div>";
                return $message;
            }
        }else{
            $message = "<div class='alert alert-danger'><strong>Error ! </strong>" . mysqli_error($link) . "</div>";
            return $message;
        }
    }



    public static function getAllUser(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error ! </strong>" . mysqli_error($link) . "</div>";
            return $message;
        }
    }
    public static function getUserById($id){
        $link = Database::db_connection();
        $sql = "SELECT * FROM users WHERE id ='$id'";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error ! </strong>" . mysqli_error($link) . "</div>";
            return $message;
        }
    }

    public static function adminUpdateUser($id, $data){
        $role = $data['role'];
        $link = Database::db_connection();
        $sql = "UPDATE users SET role='$role' WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error ! </strong>" . mysqli_error($link) . "</div>";
            return $message;
        }
    }

    public static function deleteUser($id){
        $link = Database::db_connection();
        $sql = "DELETE FROM users WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        if($result){
            $message = "<div class='alert alert-success'><strong>Success ! </strong> User Deleted Successfully</div>";
            return $message;
        }else{
            $message = "<div class='alert alert-danger'><strong>Error ! </strong>" . mysqli_error($link) . "</div>";
            return $message;
        }
    }

    public static function adminLogOut($user){
        session_destroy();
        header("Location:index.php");
    }

}