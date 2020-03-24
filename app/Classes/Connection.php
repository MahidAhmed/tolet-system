<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 23-Mar-19
 * Time: 8:23 PM
 */

namespace App\Classes;


class Connection
{
    public static function dbConnection(){
        $link = mysqli_connect('localhost','root','','tolet');
        return $link;
    }
}