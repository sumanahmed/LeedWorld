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
                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION['id'] = $userInfo['id'];
                $_SESSION['name'] = $userInfo['name'];
                header("Location:member.php");
                //echo "<script>window.location = 'member.php'</script>";
            }else{
                $message = "<div class='alert alert-danger'><strong>Error ! </strong>Invalid Email Address or Password</div>";
                return $message;
            }
        }else{
            $message = "<div class='alert alert-danger'><strong>Error! </strong>".mysqli_errno($link)."</div>";
            return $message;
        }
    }

    public function getUserBySessionId($id){
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



    public function updateUserInfo($data, $userid){
        $link = Database::db_connection();
        $name = $data['name'];
        $mobile_no = $data['mobile_no'];
        $email = $data['email'];
        $address = $data['address'];
        $city = $data['city'];
        $zip = $data['zip'];
        if($name == "" || $mobile_no == "" || $email == "" || $address == "" || $city == "" || $zip == "") {
            $message = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be Empty ! </div>";
            return $message;
        }else {
            $link = Database::db_connection();
            $sql = "UPDATE users SET name='$name', mobile_no='$mobile_no', email='$email', address='$address', city='$city', zip='$zip' WHERE id='$userid'";
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


    public function updatePassword($data, $id){
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

    public  function userLogOut(){
        session_destroy();
        header("Location:login.php");
    }
}