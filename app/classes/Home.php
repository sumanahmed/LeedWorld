<?php

namespace App\classes;
use App\classes\Database;


class Home{
    public function getAllPublishedBlogInfo(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM blogs WHERE publication_status='1' ORDER BY id DESC";
        $result = mysqli_query($link, $sql);
        return $result;
    }

    public  function getSingleBlog($id){
        $link = Database::db_connection();
        $sql = "SELECT * FROM blogs WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        return $result;
    }

}