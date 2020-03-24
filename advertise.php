<?php
session_start();
if($_SESSION == null){
    header('Location:login.php');
}

require_once  "vendor/autoload.php";
use App\Classes\Connection;
use App\Classes\Database;

$db = new Connection();
?>

<?php
$email = $_GET['email'];

$msg = "";
if(isset($_POST['btn'])){
    $ad = new Database();
    $msg = $ad->saveAdvertise($_POST);

}


if (isset($_GET['logout'])){
    $login = new Database();
    $login->adminLogout();
}

?>


<?php require 'inc/header.php';?>
	<!-- Slider Section Start Here -->

	<!-- Jumbotron -->

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-title">
                    <h3 class="text-center">Fill up the following info</h3>
                </div>

                <div class="card-body">
                    <?php echo $msg; ?>
                    <?php
                    $sql = "select * from user where email = '$email' ";
                    $get = mysqli_query($db->dbConnection(), $sql);
                    while($row = mysqli_fetch_assoc($get)){
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="email">Email Address</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo  $row['email'];?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="name">Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo  $row['name'];?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="phone">Phone</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo  $row['phone'];?>">
                            </div>
                        </div>
                        <?php } ?>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="division">Division</label>
                            <div class="col-md-9">
                                <select class="form-control" id="division" name="division" onchange="change_division()">
                                    <option>Select Division</option>
                                    <?php
                                    $q = "SELECT * FROM division";
                                    $res = mysqli_query($db->dbConnection(), $q);
                                    if(mysqli_num_rows($res) > 0){
                                        while($rows = mysqli_fetch_array($res)){
                                            ?>

                                            <option value="<?php echo $rows['div_id']; ?>"><?php echo $rows['div_name']; ?></option>


                                            <?php

                                            ?>
                                            
                                        <?php }
                                    }

                                    ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="district">District</label>
                            <div class="col-md-9">
                                <select class="form-control" id="district" name="district" onchange="change_district()">
                                    <option>Select District</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="upazila">Upazila</label>
                            <div class="col-md-9">
                                <select class="form-control" id="upazila" name="upazila" onchange="change_upazila()">
                                    <option>Select Upazila</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="area">Area</label>
                            <div class="col-md-9">
                                <select class="form-control" id="area" name="area">
                                    <option>Select Area</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="hNo">House No</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="house" id="hNo"  value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="houseType">House Type</label>
                            <div class="col-md-9">
                                <select class="form-control" id="houseType" name="houseType">
                                    <option>Select House Type</option>
                                    <?php
                                        $sql = "select * from housetype";
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
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="avail">Available Month</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="month" id="avail"  value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="rent">Rent</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="rent" id="rent" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="image">Image</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control-file border" name="image" id="image" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="descrip">Description</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="descrip" id="descrip" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-3 col-md-9">
                                <button type="submit" class="btn btn-success btn-block" name="btn">
                                    Post Ad</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <h3 class="text-center">Previous Posts</h3>
            <?php
            $sql = "select * from advertise where email = '$email' ";
            $div = mysqli_query($db->dbConnection(), $sql);
            if(mysqli_num_rows($div)>0){
            while($row= mysqli_fetch_assoc($div)){

                ?>
                <div class="card">
                    <div class="card-title">
                        <h3 class="text-center">Nice flat in <?php
                            $sql = "select area_name from area where area_id ='$row[area]'";
                            $dis = mysqli_query($db->dbConnection(), $sql);
                            while ($res = mysqli_fetch_assoc($dis)){
                                echo $res['area_name'].", "; } ?></h3>
                    </div>
                    <div class="card-body">
                        <img src="<?php echo $row['image']; ?>" class="mb-1" height="100" width="100">

                        <div class="">
                            <strong><i class="fa fa-clock-o"></i> Available :</strong><span><?php echo $row['month']; ?></span>
                            <br />
                            <strong><i class="fa fa-money" aria-hidden="true"></i>BDT : ৳ <?php echo  $row['rent']; ?> /month</strong><br />
                            <strong><i class="fa fa-map-marker"></i> Location : </strong><span><?php
                                $sql = "select dis_name from district where dis_id ='$row[district]'";
                                $dis = mysqli_query($db->dbConnection(), $sql);
                                while ($res = mysqli_fetch_assoc($dis)){
                                echo $res['dis_name'].", "; } ?>
                                <?php
                                $sql = "select area_name from area where area_id ='$row[area]'";
                                $dis = mysqli_query($db->dbConnection(), $sql);
                                while ($res = mysqli_fetch_assoc($dis)){
                                    echo $res['area_name'].", "; } ?></span> <br>
                        </div>
                        <div class="">
                            <!--Decription-->
                            <p><?php echo $row['descrip']; ?></p>
                        </div>


                        <div class="card-footer">
                            <tr>
                               <td> <a href="editAd.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                               <td> <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                            </tr>
                        </div>

                    </div>
                    <?php } }  ?>

                </div>
        </div>
	</div>
</div>

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
   /* $(document).ready(function(){
        $('#division').on('change', function() {
            var value = $('#division').val();
            var getId = 'div_id='+value;

            $.ajax({
                type: "POST",
                url: "data.php",
                data: {id: getId},
                cache:false,
                success: function(data){
                    $('#district').html(data);
                    //console.log(data);
                }
            })

        });
    )};*/



</script>
  

