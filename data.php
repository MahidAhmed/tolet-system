<?php
require_once  "vendor/autoload.php";
use App\Classes\Connection;
use App\Classes\Database;
$db = new Connection();

$id = $_POST['id'];



$q = "SELECT * FROM district where division_id = '$id' ";
$res = mysqli_query($db->dbConnection(), $q);
if($res){
    while($rows = mysqli_fetch_array($res)){
        ?>
        <option value="<?php echo $rows['dis_id']; ?>"><?php echo $rows['dis_name']; ?></option>
    <?php } }
?>