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

if(isset($_POST['search'])){
    $area = $_POST['area'];
    $houseType = $_POST['houseType'];

}

if (isset($_GET['logout'])){
    $login = new Database();
    $login->adminLogout();
}

?>

<!DOCTYPE html>
<html>
<?php require 'inc/header.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 m-auto">
            <h3>Available</h3>
            <?php
            $sql = "select * from advertise where area = '$area' AND houseType = '$houseType' ";
            $result = mysqli_query($db->dbConnection(), $sql);
            while($row= mysqli_fetch_assoc($result)){

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
                        <img src="<?php echo $row['image']; ?>" class="mb-1" height="250" width="100%">

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
                            <strong>RentType:</strong><span><?php
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

</div>

</body>

<?php include 'inc/footer.php'; ?>

</html>