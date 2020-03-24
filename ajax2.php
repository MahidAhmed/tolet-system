<?php

require_once  "vendor/autoload.php";
use App\Classes\Connection;
use App\Classes\Database;

$db = new Connection();
$division = $_GET["editDivisionName"];
$district = $_GET["editDistrictName"];
$upazila = $_GET["editUpazilaName"];



    if ($division != "") {

        $res = mysqli_query(Connection::dbConnection(), "select * from district where division_id = $division");


        echo "<select id='district' onchange='edit_district()' >";
        echo "<option>Select District </option>";
        while ($row = mysqli_fetch_array($res)) {

            echo "<option value='$row[dis_id]'>";
            echo $row["dis_name"];
            echo "</option>";
        }
        echo "</select>";

    }


if($district !="") {

    $res = mysqli_query(Connection::dbConnection(), "select * from upazila where district_id = $district");
    echo "<select id='upazila' onchange='edit_upazila()' >";
    echo "<option>Select Upazila </option>";
    while ($row = mysqli_fetch_array($res)) {
        echo "<option value='$row[up_id]'>";
        echo $row["up_name"];
        echo "</option>";
    }
    echo "</select>";

}

if($upazila !="") {

    $res = mysqli_query(Connection::dbConnection(), "select * from area where upazila_id = $upazila");
    echo "<select>";
    echo "<option>Select Area</option>";
    while ($row = mysqli_fetch_array($res)) {
        echo "<option value='$row[area_id]'>";
        echo $row["area_name"];
        echo "</option>";
    }
    echo "</select>";

}


?>