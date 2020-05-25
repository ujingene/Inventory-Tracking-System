<?php
include "../database/db.php";
include "../database/functions.php";
if(isset($_GET['inventoryID']))
{

$status1=$_GET['inventoryID'];

$sql = "SELECT * from tbl_item where item_id='$status1' ";
if ($result=mysqli_query($con,$sql))
  {
  while ($obj=mysqli_fetch_object($result))
    {
        $InventoryID=$obj->item_id;
        $InventName=$obj->item_name;
        $staff=$obj->emp_id;
        $serNo=$obj->item_serno;
        $brand=$obj->item_brand;

        $status=1;
        $date = Now();


        if($sql = "UPDATE tbl_item SET emp_id='$staff' where item_id='$status1' "){

            $sql = "INSERT INTO tbl_item_assigned (item_id, item_name, item_serno, item_model, emp_id, assign_status, date_assigned) 
            VALUES ('$InventoryID', '$InventName', '$serNo', '$brand', '$staff', '$status', '$date')";

            if ($con->query($sql)) {
                
                redirect("item.php");
                echo "Inventory returned successfully";
            } else {
                
                redirect("available.php");
                echo "Error updating record: " . $con->error;
            }
        }

$con->close();

        }
    }
}
?>