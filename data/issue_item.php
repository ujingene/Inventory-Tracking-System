<?php 
require_once('../class/Item.php'); 
require_once('../class/Employee.php'); 

$employees = $employee->get_employees();
$inventory = $item->get_all_items();

?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Issue Item</h4>
			</div>
			<div class="modal-body">
				<!-- main form -->
					<form class="form-horizontal" role="form" action="../data/assign2.php" method="post">
			
					
				    <div class="form-group">
					    <label class="control-label col-sm-3">Employee:</label>
					    <div class="col-sm-9"> 
					    	<select class="btn btn-default" name="employee">
					    		
								<?php 
									foreach ($employees as $e) {
										# code..
									$fN = $e['emp_fname'];
									$mN = $e['emp_mname'];
									$lN = $e['emp_lname'];
									$fullName = "$fN $mN $lN";
									$fullName = ucwords($fullName);
									$id = $e['emp_id'];
								?>	
									<option value="<?php echo $id; ?>"><?php echo $fullName; ?></option>}
								<?php
									}//end foreach
								 ?>					    		
					    	</select>
					    </div>
					  </div>	

					  <div class="form-group">
					    <label class="control-label col-sm-3">Inventory:</label>
					    <div class="col-sm-9"> 
					    	<select class="btn btn-default" name="inventory">
					    		<?php 
					    			foreach ($inventory as $i) {
					    				# code...
					    			$itemID = $i['item_id'];
					    			$itemName = ucwords($i['item_name']);
					    		?>
					    			<option value="<?php echo $itemID; ?>"><?php echo $itemName; ?></option>}
					    		<?php
					    			}//end foreach of category
					    		 ?>
					    	</select>
					    </div>
					  </div>

					  <div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-primary">Issue
					      <span class="glyphicon glyphicon-saved" aria-hidden="true"></span>
					      </button>
					    </div>
					  </div>
					</form>
				<!-- /main form -->
			</div>
