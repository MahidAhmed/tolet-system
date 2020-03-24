<?php
session_start();
if($_SESSION == null){
    header('Location:login.php');
}
require_once  "vendor/autoload.php";
use App\Classes\Connection;
use App\Classes\Database;

$db = new Connection();

$id = $_GET['id'];
$ad = new Database();


if(isset($_POST['btn'])){
    $ad->updateAdvertiseInfo($id);
}

?>

<?php require 'inc/header.php';?>
<!-- Slider Section Start Here -->

<!-- Jumbotron -->

<div class="container">
    <div class="row">
        <div class="col-md-8">
        <?php
            $sql = "Select * from advertise where id = '$id' ";
            $result = mysqli_query($db->dbConnection(), $sql);
            if($result) {
            while ($row = mysqli_fetch_assoc($result)){
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

                     <div class="form-group row">
                            <label class="col-form-label col-md-3" for="division">Division</label>
                            <div class="col-md-9">
                                <select class="form-control" id="division" name="division" onchange="edit_division()">

                                    <option value="" selected="selected">Select Division</option>
                                    <?php
                                        $sql = "select * from division";
                                        $div = mysqli_query($db->dbConnection(), $sql);
                                        if($div){
                                            while ($result = mysqli_fetch_assoc($div)){
                                    ?>

                                            <option
                                             <?php
                                                if($row['division']== $result['div_id']){ ?>
                                                selected = "selected"
                                                <?php } ?>
                                                value="<?php echo $result['div_id']; ?>"><?php echo $result['div_name']; ?></option>


                                            <?php } } ?>

                             
                                </select>
                            </div>
                        </div><div class="form-group row">
                            <label class="col-form-label col-md-3" for="district">District</label>
                            <div class="col-md-9">
                                <select class="form-control" id="district" name="district" onchange="edit_district()">

                                    <option value="" selected="selected">Select District</option>
                                   <?php
                                        $sql = "select * from district where division_id = '$row[division]' ";
                                        $div = mysqli_query($db->dbConnection(), $sql);
                                        if($div){
                                            while ($result = mysqli_fetch_assoc($div)){
                                    ?>

                                            <option
                                             <?php
                                                if($row['district']== $result['dis_id']){ ?>
                                                selected = "selected"
                                                <?php } ?>
                                                value="<?php echo $result['dis_id']; ?>"><?php echo $result['dis_name']; ?></option>


                                            <?php } } ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="upazila">Upazila</label>
                            <div class="col-md-9">
                                <select class="form-control" id="upazila" name="upazila" onchange="edit_upazila()">
                                    <option value="" selected="selected">Select Upazila</option>
                                    <?php
                                   $sql = "select * from upazila where district_id = '$row[district]'";
                                    $div = mysqli_query($db->dbConnection(), $sql);
                                    if($div){
                                        while ($result = mysqli_fetch_assoc($div)){
                                            ?>

                                            <option
                                                <?php
                                                if($row['upazila']== $result['up_id']){ ?>
                                                    selected = "selected"
                                                <?php } ?>
                                                value="<?php echo $result['up_id']; ?>"><?php echo $result['up_name']; ?></option>


                                        <?php } } ?>

                                    </select>
                            </div>
                        </div>

                    <div class="form-group row">
                            <label class="col-form-label col-md-3" for="area">Area</label>
                            <div class="col-md-9">
                                <select class="form-control" id="area" name="area">
                                    <option>Select Area</option>
                                    <?php
                                   $sql = "select * from area where upazila_id = '$row[upazila]'";
                                    $div = mysqli_query($db->dbConnection(), $sql);
                                    if($div){
                                        while ($result = mysqli_fetch_assoc($div)){
                                            ?>

                                            <option
                                                <?php
                                                if($row['area']== $result['area_id']){ ?>
                                                    selected = "selected"
                                                <?php } ?>
                                                value="<?php echo $result['area_id']; ?>"><?php echo $result['area_name']; ?></option>


                                        <?php } } ?>
                                  </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="hNo">House No</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="house" id="hNo"  value="<?php echo $row['house']; ?>">
                            </div>
                        </div>

                    <div class="form-group row">
                            <label class="col-form-label col-md-3" for="houseType">House Type</label>
                            <div class="col-md-9">
                                <select class="form-control" id="houseType" name="houseType">
                                    <option>Select House Type</option>
                                 <?php
                                   $sql = "select * from housetype";
                                    $div = mysqli_query($db->dbConnection(), $sql);
                                    if($div){
                                        while ($result = mysqli_fetch_assoc($div)){
                                            ?>
                                            <option
                                                <?php
                                                if($row['houseType']== $result['hou_id']){ ?>
                                                    selected = "selected"
                                                <?php } ?>
                                                value="<?php echo $result['hou_id']; ?>"><?php echo $result['type_name']; ?></option>


                                        <?php } } ?>
                               </select>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label class="col-form-label col-md-3" for="avail">Available Month</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="month" id="avail"  value="<?php echo $row['month']; ?>">
                            </div>
                        </div>
                    
                    <div class="form-group row">
                            <label class="col-form-label col-md-3" for="rent">Rent</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="rent" id="rent" value="<?php echo $row['rent']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-md-3" for="image">Image</label>
                            <div class="col-md-9">
                                <img src="<?php echo $row['image']; ?>" height="80px" width="80px">
                                <input type="file" class="form-control-file border" name="image" id="image" accept="image/*">
                            </div>
                        </div>
                    
                    <div class="form-group row">
                            <label class="col-form-label col-md-3" for="descrip">Description</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="descrip" id="descrip" value="<?php echo $row['descrip']; ?>">
                            </div>
                        </div>
                     <div class="form-group row">
                            <div class="offset-3 col-md-9">
                                <button type="submit" class="btn btn-success btn-block" name="btn">
                                    Edit Ad</button>
                            </div>
                        </div>    

                  
            </form>
            <?php } } ?>
        </div>


    </div>

</div>



</body>


<script type="text/javascript">

    function edit_division() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "ajax2.php?editDivisionName="+document.getElementById("division").value, false);
        xmlhttp.send(null);
        document.getElementById("district").innerHTML=xmlhttp.responseText;


    }

    function edit_district() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "ajax2.php?editDistrictName="+document.getElementById("district").value, false);
        xmlhttp.send(null);
        document.getElementById("upazila").innerHTML=xmlhttp.responseText;
        // alert(document.getElementById("district").value);

    }

    function edit_upazila() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "ajax2.php?editUpazilaName="+document.getElementById("upazila").value, false);
        xmlhttp.send(null);
        document.getElementById("area").innerHTML=xmlhttp.responseText;
        // alert(document.getElementById("district").value);

    }



</script>

<?php include 'inc/footer.php'; ?>

</html>