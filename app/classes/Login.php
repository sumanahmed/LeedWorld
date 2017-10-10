<?php
namespace App\classes;
use App\classes\Database;

class Login
{
    public function registerUser($data){
        $link = Database::db_connection();
        $name = mysqli_real_escape_string($link, $data['name']);
        $mobile_no = mysqli_real_escape_string($link, $data['mobile_no']);
        $email = mysqli_real_escape_string($link, $data['email']);
        $address = mysqli_real_escape_string($link, $data['address']);
        $city = mysqli_real_escape_string($link, $data['city']);
        $zip = mysqli_real_escape_string($link, $data['zip']);
        $password = mysqli_real_escape_string($link, md5($data['password']));

        if($name == "" || $mobile_no == "" || $email == "" || $address == "" || $city == "" || $zip == "" || $password == "") {
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
                $sql = "INSERT INTO users (name, mobile_no, email, address, city, zip, password, role) VALUES('$name','$mobile_no','$email','$address','$city','$zip','$password', 'user')";
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

    public function adminLoginCheck($data)
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
            die("Query Problem".mysqli_errno($link));
        }
    }



    public function getAllUser(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            die("Query Problem".mysqli_errno($link));
        }
    }
    public function getUserById($id){
        $link = Database::db_connection();
        $sql = "SELECT * FROM users WHERE id ='$id'";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            die("Query Problem".mysqli_errno($link));
        }
    }

    public function adminUpdateUser($id, $data){
        $role = $data['role'];
        $link = Database::db_connection();
        $sql = "UPDATE users SET role='$role' WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            die("Query Problem".mysqli_errno($link));
        }
    }





    public  function adminLogOut($user){
        session_destroy();
        header("Location:index.php");
    }

}