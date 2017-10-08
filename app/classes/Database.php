<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop - PH
 * Date: 9/19/2017
 * Time: 12:20 PM
 */

namespace App\classes;


class Database
{
    public  function db_connection(){
        $hostName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "mlm";
        $link = mysqli_connect($hostName, $userName, $password, $dbName);
        return $link;
    }
}