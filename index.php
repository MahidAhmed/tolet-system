<?php
session_start();
if($_SESSION == null){
    header('Location:login.php');
}
require_once 'vendor/autoload.php';
use App\Classes\Connection;
use App\Classes\Database;
$login = new Database();

$db = new Connection();

$msg = "";
if(isset($_POST['btn'])){
    //$msg = $login->adminLogin($_POST);
}


if (isset($_GET['logout'])){
    $login = new Database();
    $login->adminLogout();
}

?>


<!DOCTYPE html>

<html>
<body>

<?php require 'inc/header.php'; ?>


<div class="carousel slide mb-2" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="image/5.jpg" alt="First slide" height="500px">
            <div class="carousel-caption">
                <!--                -->
                <h1 class="display-1 font-weight-bold">Search</h1>
                <?php
                if($_SESSION['name'] == null){
                ?>
                <form action="show.php" method="post">
                <div class="input-group">

                    <select class="form-control" id="division" name="division" required="1" onchange="change_division()">
                        <option value="" selected="selected">Select Division</option>
                        <?php
                        $q = "SELECT * FROM division";
                        $res = mysqli_query($db->dbConnection(), $q);
                        if(mysqli_num_rows($res) > 0){
                            while($rows = mysqli_fetch_array($res)){
                                ?>

                                <option value="<?php echo $rows['div_id']; ?>"><?php echo $rows['div_name']; ?></option>


                                <?php

                                ?>
                                `
                            <?php }
                        }

                        ?>

                    </select>

                    <select class="form-control" id="district" name="district" required="1" onchange="change_district()">
                        <option value="" selected="selected">Select District</option>
                    </select>
                    <select class="form-control" id="upazila" name="upazila" required="1" onchange="change_upazila() ">
                        <option value="" selected="selected">Select Upazila</option>
                    </select>
                    <select class="form-control" id="area" name="area" required="1">
                        <option value="" selected="selected">Select Area</option>
                    </select>


                            <select class="form-control" name="houseType">
                                <option>Select RentType</option>
                                <?php
                                $sql="select * from housetype";
                                $res = mysqli_query($db->dbConnection(), $sql);
                                if(mysqli_num_rows($res) > 0){
                                    while($rows = mysqli_fetch_array($res)){
                                        ?>

                                        <option value="<?php echo $rows['hou_id']; ?>"><?php echo $rows['type_name']; ?></option>


                                        <?php

                                        ?>
                                        `
                                    <?php }
                                }

                                ?>

                            </select>


                    <input class="btn btn-success input-group-append" type="submit" name="search" value="Search">

                </div>
                </form>
                <?php }else{
                 ?>
                
                <form action="show.php?email=<?php echo $_SESSION['email']; ?>" method="post">
                <div class="input-group">

                    <select class="form-control" id="division" name="division" required="1" onchange="change_division()">
                        <option value="" selected="selected">Select Division</option>
                        <?php
                        $q = "SELECT * FROM division";
                        $res = mysqli_query($db->dbConnection(), $q);
                        if(mysqli_num_rows($res) > 0){
                            while($rows = mysqli_fetch_array($res)){
                                ?>

                                <option value="<?php echo $rows['div_id']; ?>"><?php echo $rows['div_name']; ?></option>


                                <?php

                                ?>
                                `
                            <?php }
                        }

                        ?>

                    </select>

                    <select class="form-control" id="district" name="district" required="1" onchange="change_district()">
                        <option value="" selected="selected">Select District</option>
                    </select>
                    <select class="form-control" id="upazila" name="upazila" required="1" onchange="change_upazila() ">
                        <option value="" selected="selected">Select Upazila</option>
                    </select>
                    <select class="form-control" id="area" name="area" required="1">
                        <option value="" selected="selected">Select Area</option>
                    </select>


                            <select class="form-control" name="houseType">
                                <option>Select RentType</option>
                                <?php
                                $sql="select * from housetype";
                                $res = mysqli_query($db->dbConnection(), $sql);
                                if(mysqli_num_rows($res) > 0){
                                    while($rows = mysqli_fetch_array($res)){
                                        ?>

                                        <option value="<?php echo $rows['hou_id']; ?>"><?php echo $rows['type_name']; ?></option>


                                        <?php

                                        ?>
                                        `
                                    <?php }
                                }

                                ?>

                            </select>


                    <input class="btn btn-success input-group-append" type="submit" name="search" value="Search">

                </div>
                </form>
                <?php } ?>
            </div>
        </div>

    </div>

</div>

<!--<div class="container-fluid">
    <div class="mt-0 jumbotron">
        <h2>dkjdkjkjdfdfdf</h2>
    </div>
</div>-->



<div class="container col-md-10 mt-4 mb-4">
    <h2 class="text-center text-success mb-3">Recent Posts</h2>
    <div class="row">
            <?php
            $sql = "select * from advertise";
            $result = mysqli_query($db->dbConnection(), $sql);
            while($row= mysqli_fetch_assoc($result)){

                ?>

                <div class="card col-md-4">
                    <div class="card-title">
                        <h5 class="text-center">Nice flat in <?php
                            $sql = "select area_name from area where area_id ='$row[area]'";
                            $dis = mysqli_query($db->dbConnection(), $sql);
                            while ($res = mysqli_fetch_assoc($dis)){
                                echo $res['area_name'].", "; } ?></h5>
                    </div>
                    <div class="card-body">
                        <img src="<?php echo $row['image']; ?>" class="mb-1" height="250" width="200">

                        <div class="">
                            <strong><i class="fa fa-clock-o"></i> Available :</strong><span><?php echo $row['month']; ?></span>
                            <br />
                            <strong><i class="fa fa-money" aria-hidden="true"></i>BDT : ৳ <?php echo  $row['rent']; ?> /month</strong><br />
                            <strong><i class="fa fa-map-marker"></i> Location : </strong><span>
                                <?php
                                $sql = "select dis_name from district where dis_id ='$row[district]'";
                                $dis = mysqli_query($db->dbConnection(), $sql);
                                while ($res = mysqli_fetch_assoc($dis)){
                                    echo $res['dis_name'].", "; } ?>
                                <?php
                                $sql = "select area_name from area where area_id ='$row[area]'";
                                $dis = mysqli_query($db->dbConnection(), $sql);
                                while ($res = mysqli_fetch_assoc($dis)){
                                    echo $res['area_name']; } ?></span> <br>
                            <strong>RentType:</strong><span> <?php
                                $sql = "select * from housetype where hou_id ='$row[houseType]'";
                                $dis = mysqli_query($db->dbConnection(), $sql);
                                while ($res = mysqli_fetch_assoc($dis)){
                                    echo $res['type_name']; } ?></span><br>
                            <strong><i class="fa fa-phone"></i> Contact: </strong><span><?php echo $row['phone']; ?></span><br>
                        </div>
                        <div class="">
                            <!--Decription-->
                            <p><?php echo "<strong>Description:</strong>".$row['descrip']; ?></p>
                        </div>

                    </div>
                </div>

            <?php } ?>
    </div>
</div>

<?php

?>

</body>

<script type="text/javascript">

    function change_division() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "ajax.php?DivisionName="+document.getElementById("division").value, false);
        xmlhttp.send(null);
        document.getElementById("district").innerHTML=xmlhttp.responseText;


    }

    function change_district() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "ajax.php?DistrictName="+document.getElementById("district").value, false);
        xmlhttp.send(null);
        document.getElementById("upazila").innerHTML=xmlhttp.responseText;
        // alert(document.getElementById("district").value);

    }

    function change_upazila() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "ajax.php?UpazilaName="+document.getElementById("upazila").value, false);
        xmlhttp.send(null);
        document.getElementById("area").innerHTML=xmlhttp.responseText;
        // alert(document.getElementById("district").value);

    }





</script>

<?php include 'inc/footer.php'; ?>

</html>

