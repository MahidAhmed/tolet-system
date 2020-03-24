<?php
namespace App\classes;
use App\Classes\Connection;

	class Database{

		public function saveUserData(){
            $pass = md5($_POST[password]);
            if(($_POST['name'] != "") || ($_POST['email'] != "") || ($_POST['phone'] != "") || ($_POST['password'] != "")) {
                $sql = "insert into user(name,email,phone,password) values('$_POST[name]','$_POST[email]', '$_POST[phone]', '$pass')";

                if (mysqli_query(Connection::dbConnection(), $sql)) {
                    header('Location:login.php');
                } else {
                    die('query problem' . mysqli_error(Connection::dbConnection()));
                }
            }else{
                $msg = "First Insert User Information";
                return $msg;
            }
		}

        public function saveAdvertise($data){
		    /*$email = $data['email'];
		    $name = $data['name'];
		    $division = $data['division'];
		    $district = $data['district'];
		    $upazila = $data['upazila'];
		    $area = $data['area'];
		    $house = $data['house'];
		    $houseType = $data['status'];
		    $rent = $data['rent'];
		    $descrip = $data['descrip'];*/

            $fileName = $_FILES['image']['name'];
            $directory = "./assets/images/";
            $imageUrl = $directory . $fileName;
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            $check = getimagesize($_FILES['image']['tmp_name']);
            if ($check) {
                if (file_exists($imageUrl)) {
                    die('already exist');
                } else {
                    if ($_FILES['image']['size'] > 10000000) {
                        die('file is too large.upload an image within 10kb');
                    } else {
                        if ($fileType != 'jpg' && $fileType != 'png') {
                            die('Image type is not supported');
                        } else {
                            move_uploaded_file($_FILES['image']['tmp_name'], $imageUrl);

                            $sql = "insert into advertise(email,name, phone, division, district, upazila, area, house, houseTYpe, month, rent, image, descrip)
                  values('$_POST[email]','$_POST[name]', '$_POST[phone]', '$_POST[division]', '$_POST[district]', '$_POST[upazila]', '$_POST[area]',
                   '$_POST[house]', '$_POST[houseType]', '$_POST[month]', '$_POST[rent]', '$imageUrl', '$_POST[descrip]')";

                            if(mysqli_query(Connection::dbConnection(), $sql)){
                                $msg = "Advertise info saved successfully";
                                return $msg;
                            }else{
                                die('Query problem'.mysqli_error(Connection::dbConnection()));
                            }
                        }
                    }
                }
            } else {
                die('please upload a image file');
            }

/*
            $sql = "insert into advertise(email,name, division, district, upazila, area, house, houseTYpe, rent, image, descrip)
                  values('$email','$name', '$division', '$district', '$upazila', '$area', '$house', '$houseType', '$rent', '$image', '$descrip')";

            if(mysqli_query(Connection::dbConnection(), $sql)){
                header('Location:advertise.php');
            }else{
                die('query problem'.mysqli_error(Connection::dbConnection()));
            }*/
        }

        public function viewToletInfo(){
            $sql = "SELECT * FROM advertise";
            if (mysqli_query(Connection::dbConnection(),$sql)){
                $result = mysqli_query(Connection::dbConnection(),$sql);
                return $result;
            } else{
                die ('Query Problem'.mysqli_error(Connection::dbConnection()));
            }
        }

        public  function  adminLogin($data){
            $email = $data['email'];
            $password = md5($data['password']);
            $sql = "SELECT * FROM user where email='$email' AND password = '$password' ";
            if(mysqli_query(Connection::dbConnection(), $sql)){
                $result = mysqli_query(Connection::dbConnection(), $sql);
                $use = mysqli_fetch_assoc($result);
                if($use){
                   session_start();
                    $_SESSION['id'] = $use['id'];
                    //$_SESSION['login'] = true;
                    $_SESSION['name'] = $use['name'];
                    $_SESSION['email'] = $use['email'];
                    header("Location:advertise.php?email=$email");
                }else{
                    $msg = "use valid email & password";
                    return $msg;
                }
            }else{
                die('Query problem'.mysqli_error(Connection::dbConnection()));
            }

        }

        public function adminLogout(){
            unset($_SESSION['id']);
            unset($_SESSION['name']);

            header('Location:login.php');
        }

     public  function updateAdvertiseInfo($id){
         $fileName = $_FILES['image']['name'];
         if(!empty($fileName)) {
             $directory = "./assets/images/";
             $imageUrl = $directory . $fileName;
             $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
             $check = getimagesize($_FILES['image']['tmp_name']);
             if ($check) {
                 if (file_exists($imageUrl)) {
                     die('already exist');
                 } else {
                     if ($_FILES['image']['size'] > 100000000) {
                         die('file is too large.upload an image within 10kb');
                     } else {
                         if ($fileType != 'jpg' && $fileType != 'png') {
                             die('Image type is not supported');
                         } else {
                             move_uploaded_file($_FILES['image']['tmp_name'], $imageUrl);

                             $sql = "update advertise set 
                              email='$_POST[email]',
                               name='$_POST[name]', 
                               division='$_POST[division]', 
                               district='$_POST[district]',
                               upazila='$_POST[upazila]', 
                               area='$_POST[area]', 
                               house='$_POST[house]', 
                               houseType='$_POST[houseType]', 
                               month='$_POST[month]',
                               rent='$_POST[rent]', 
                               image= '$imageUrl' ,
                                descrip='$_POST[descrip]' where id='$id' ";


                             if (mysqli_query(Connection::dbConnection(), $sql)) {
                                  /*$msg = "Updated successfully";
                                  return $msg;*/
                                 header("Location:advertise.php?email=$_POST[email]");
                             } else {
                                 die('Query problem' . mysqli_error(Connection::dbConnection()));
                             }
                         }
                     }
                 }
             }
         }else {
             $sql = "update advertise set email='$_POST[email]', name='$_POST[name]', division='$_POST[division]', district='$_POST[district]',
                   upazila='$_POST[upazila]', area='$_POST[area]', house='$_POST[house]', houseType='$_POST[houseType]', month='$_POST[month]',
                   rent='$_POST[rent]', descrip='$_POST[descrip]' where id='$id' ";


             if(mysqli_query(Connection::dbConnection(), $sql)){
                 header("Location:advertise.php?email=$_POST[email]");
                 /*$msg = "Updated successfully";
                 return $msg;*/
             }else{
                 die('Query problem'.mysqli_error(Connection::dbConnection()));
             }
         }

     }

        /*public function deletePostInfo($id){

            $sql = "DELETE FROM advertise WHERE id ='$id'";
            if (mysqli_query(Connection::dbConnection(),$sql)){
                header("Location:advertise.php?email=$_POST[email]");
            } else{
                die ('Connection Problem'.mysqli_error(Connection::dbConnection()));
            }
        }*/


    }
?>