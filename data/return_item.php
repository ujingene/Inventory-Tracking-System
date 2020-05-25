<?php
include "../database/db.php";
include "../database/functions.php";
if(isset($_GET['inventoryID']))
{

$status1=$_GET['inventoryID'];
$staff=1;
$sql = "SELECT * from tbl_item_assigned where id='$status1' ";
if ($result=mysqli_query($con,$sql))
  {
  while ($obj=mysqli_fetch_object($result))
    {
        $status_var=$obj->assign_status;
        $item=$obj->item_id;

        if($status_var=='0')
        {
        $status_state=1;
        }
        else
        {
        $status_state=0;
        }

        $sql = "UPDATE tbl_item_assigned SET assign_status='$status_state', date_returned = Now() WHERE id='$status1' ";

        if ($con->query($sql)) {

            $sql = "UPDATE tbl_item SET emp_id='$staff' where item_id='$item' ";

            if ($con->query($sql)) {
            redirect("../admin/available.php");
            echo "Inventory returned successfully";
        }
     } else {
            
            redirect("../admin/track.php");
            echo "Error updating record: " . $con->error;
        }

$con->close();

        }
    }
}
?>