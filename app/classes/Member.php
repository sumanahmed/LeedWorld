<?php
namespace App\classes;
use App\classes\Database;

class Member{


    public function userLoginCheck($data){
        $link = Database::db_connection();
        $email = $data['email'];
        $password = md5($data['password']);

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
        if(mysqli_query($link, $sql)){
            $queryResult = mysqli_query($link, $sql);
            $userInfo = mysqli_fetch_assoc($queryResult);
            if($userInfo){
                session_start();
                $_SESSION['id'] = $userInfo['id'];
                $_SESSION['name'] = $userInfo['name'];
                $_SESSION['login'] = $userInfo['login'];
                header("Location:member.php");
                //echo "<script>window.location = 'member.php'</script>";
            }else{
                $message = "<div class='alert alert-danger'><strong>Error ! </strong>Please use valid email address & password</div>";
                return $message;
            }
        }else{
            die("Query Problem".mysqli_errno($link));
        }
    }
/*
    public function getUserBySessionId($sid){
        $link = Database::db_connection();
        $sql = "SELECT * FROM users WHERE id='$sid'";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            die("Query Problem".mysqli_errno($link));
        }
    }

    public function checkPassword(){
        $link = Database::db_connection();
        $sql = "SELECT password FROM users";
        $result = mysqli_query($link, $sql);
        $value = mysqli_fetch_assoc($result);
        $password = $value['password'];
    }

    public function updateUserBySessionId($sid, $data){
        $db_pass = Login::checkPassword();
        $name = $data['name'];
        $mobile_no = $data['mobile_no'];
        $email = $data['email'];
        $address = $data['address'];
        $city = $data['city'];
        $zip = $data['zip'];
        $old_password = md5($data['password']);
        $new_password = md5($data['new_password']);
        if($name == "" || $mobile_no == "" || $email == "" || $address == "" || $city == "" || $zip == "") {
            $message = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be Empty ! </div>";
            return $message;
        }else{
            if($old_password == $db_pass){
                $link = Database::db_connection();
                $sql = "UPDATE users SET name='$name', mobile_no='$mobile_no', email='$email', address='$address', city='$city', zip='$zip', password='$new_password' WHERE id='$sid'";
                $update = mysqli_query($link, $sql);
                if($update){
                    $message = "<div class='alert alert-success'><strong>Successs ! </strong>User Information Updated Successfylly.</div>";
                    return $message;
                }else{
                    $message = "<div class='alert alert-danger'><strong>Error ! </strong>".mysqli_error($link)."</div>";
                    return $message;
                }
            }else{
                $message = "<div class='alert alert-danger'><strong>Error ! </strong>Password does not match.</div>";
                return $message;
            }
        }

    }*/

    public  function userLogOut(){
        session_destroy();
        header("Location:index.php");
    }
}