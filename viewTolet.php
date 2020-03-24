<?php
require_once "vendor/autoload.php";
use App\Classes\Database;
use App\Classes\Connection;

$db = new Connection();

$show = new Database();
$result = $show->viewToletInfo();


?>


<table border="1" width="700">
    <tr>
        <td>SL No</td>
        <td>Name</td>
        <td>Division</td>
        <td>District</td>
        <td>Upazila</td>
        <td>Area</td>
        <td>House</td>
        <td>Month</td>
        <td>Rent</td>
        <td>image</td>

    </tr>
    <?php while ($show = mysqli_fetch_assoc($result)){?>
        <tr>
            <td><?php echo $show ['id'] ?></td>
            <td><?php echo $show ['name'] ?></td>
            <td><?php echo $show ['division'] ?></td>
            <td><?php echo $show ['district'] ?></td>
            <td><?php echo $show ['upazila'] ?></td>
            <td><?php echo $show ['area'] ?></td>
            <td><?php echo $show ['house'] ?></td>
            <td><?php echo $show ['month'] ?></td>
            <td><?php echo $show ['rent'] ?></td>
            <td><?php echo "<div>";
                        echo "<img src='image/".$show['image']."'>";
                    echo  "</div>";
                    ?></td>
            <!--<td>
                <a href="editStudent.php?id=<?php /*echo $student ['id']; */?>">Edit || </a>
                <a href="?status=delete&id=<?php /*echo $student ['id']; */?>" onclick="return confirm('You mujhko turan delete korogi')">Delete</a>
            </td>-->
        </tr>
    <?php } ?>
</table>