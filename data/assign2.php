<?php
include "../database/db.php";
include "../database/functions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (empty($_POST['inventory']) || empty($_POST['employee']) ) {

    die ('Fill all fields as required!');
    }

    $item=$_POST['inventory'];
    $staff=$_POST['employee'];

    $sql = "SELECT * from tbl_item where item_id='$item' ";
    if ($result=mysqli_query($con,$sql))
    {
    while ($obj=mysqli_fetch_object($result))
        {
            $InventoryID=$obj->item_id;
            $InventName=$obj->item_name;
            $serNo=$obj->item_serno;
            $brand=$obj->item_brand;

            $status=0;

            $sql = "INSERT INTO tbl_item_assigned (item_id, item_name, item_serno, item_model, emp_id, assign_status, date_assigned) 
                VALUES ('$InventoryID', '$InventName', '$serNo', '$brand', '$staff', '$status', Now())";

                if ($con->query($sql)) {

                    $sql = "UPDATE tbl_item SET emp_id='$staff' where item_id='$item' ";

                    if($con->query($sql)){
                    redirect("../admin/item.php");
                    echo "Inventory returned successfully";
                }
             } else {
                    
                    redirect("../admin/available.php");
                    echo "Error updating record: " . $con->error;
                }

    $con->close();

            }
        }
}
?>