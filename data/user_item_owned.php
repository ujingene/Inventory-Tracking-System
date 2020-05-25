<?php 
require_once('../class/Employee.php');

$item_owned = $employee->item_owned();

// echo '<pre>';
// 	print_r($item_owned);
// echo '</pre>';

?>

<table id="myTable-item-owned" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <th>Item Name</th>
	        <th>Brand</th>
	        <th>Category</th>
	        <th><center>Request Description</center></th>
	    </tr>
	</thead>
    <tbody>
		<?php 
			foreach ($item_owned as $owned) {
				$iID = $owned['item_id'];
				$name = $owned['item_name'];
				$brand = $owned['item_brand'];
				$cat = $owned['cat_desc'];
				$status = $owned['status_desc'];
				$stat_id = $owned['status_id'];
		?>
			<tr>
				<td><?php echo $name; ?></td>
				<td><?php echo $brand; ?></td>
				<td><?php echo $cat; ?></td>
				<td align="center">

				<select name="req_purpose" id="selectmenu">        
						<option value="1" onclick="request('<?php echo $iID; ?>', '1');">Repair / Troubleshoot Error</option>
						<option value="2" onclick="request('<?php echo $iID; ?>', '2');">Software Installation</option>
						<option value="3" onclick="request('<?php echo $iID; ?>', '3');">Report Faulty/Unusable</option>
						<option value="4" onclick="request('<?php echo $iID; ?>', '4');"> Passwords</option>
				</select>
			</td> 
			</tr>
		<?php
			}//end foreach
		 ?>
    </tbody>
</table>


<?php 
$employee->Disconnect();
 ?>

<!-- for the datatable of employee -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable-item-owned').DataTable();
	});

	
</script>

