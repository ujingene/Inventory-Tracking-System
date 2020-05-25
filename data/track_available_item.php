<?php
require_once('../class/Employee.php'); 

$employees = $employee->get_employees();
?>
<br />
<table id="myTable" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <th>Item Name</th>
	        <th>Owner</th>
	        <th>Department</th>
	        <th>Category</th>
	        <th>Condition</th>
	    </tr>
	</thead>
    <tbody>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "ray_deped";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT *
				FROM tbl_item i
				left JOIN tbl_employee e
				ON i.emp_id = e.emp_id
				left JOIN tbl_off o
				ON e.off_id = o.off_id
				left JOIN tbl_con c 
				ON c.con_id = i.con_id
				left JOIN tbl_cat ca
				ON ca.cat_id = i.cat_id
WHERE i.emp_id = 1";
$result = $conn->query($sql);
				
		if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		?>
			<tr>
				<td><?php echo $row["item_name"]; ?></td>
				<td>
				<?php 
				if( $row['emp_fname'] == '-'){
					echo "Not Assigned";
				}else{
				echo $row['emp_fname']; 
				}
				?>
				</td>
				<td><?php echo ucwords($row['off_desc']); ?></td>
				<td><?php echo ucwords($row['cat_desc']); ?></td>
				<td <?php $cond = $row['con_id']; if($cond == 1){echo 'class="text-success"';} if($cond == 2){echo 'class="text-danger"';}?> >
					<strong>
						<?php echo ucfirst($row['con_desc']); ?>
					</strong>
				</td>
			</tr>
		<?php
		//end foreach
			}
} else {
    echo "0 results";
}
$conn->close();
		 ?>
    </tbody>
</table>

<!-- for the datatable of item -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable').DataTable();
	});




</script>
