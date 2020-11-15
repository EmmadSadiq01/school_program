
    <?php
					echo (isset($_GET['action']) && @$_GET['action'] == "add" || @$_GET['action'] == "edit") ?
						' <a href="student.php" class="btn btn-primary btn-sm pull-right">Back <i class="glyphicon glyphicon-arrow-right"></i></a>' : '<a href="student.php?action=add" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add </a>';
                    ?>
                    



    	<?php
		if (isset($_GET['action']) && @$_GET['action'] == "add" || @$_GET['action'] == "edit") {
		?>
    		<form action="student.php" method="post" id="signupForm1" class="form-horizontal">
							<div class="panel-body">
								<fieldset class="scheduler-border">
									<legend class="scheduler-border">Personal Information:</legend>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="Old">Name* </label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="sname" name="sname" value="<?php echo $sname; ?>" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="Old">Contact* </label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="contact" name="contact" value="<?php echo $contact; ?>" maxlength="10" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label" for="Old">Branch* </label>
										<div class="col-sm-10">
											<select class="form-control" id="branch" name="branch">
												<option value="">Select Branch</option>
												<?php
												$sql = "select * from branch where delete_status='0' order by branch.branch asc";
												$q = $conn->query($sql);

												while ($r = $q->fetch_assoc()) {
													echo '<option value="' . $r['id'] . '"  ' . (($branch == $r['id']) ? 'selected="selected"' : '') . '>' . $r['branch'] . '</option>';
												}
												?>

											</select>
										</div>
									</div>


									<div class="form-group">
										<label class="col-sm-2 control-label" for="Old">DOJ* </label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="joindate" name="joindate" value="<?php echo ($joindate != '') ? date("Y-m-d", strtotime($joindate)) : ''; ?>" style="background-color: #fff;" readonly />
										</div>
									</div>
								</fieldset>


								<fieldset class="scheduler-border">
									<legend class="scheduler-border">Fee Information:</legend>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="Old">Total Fees* </label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="fees" name="fees" value="<?php echo $fees; ?>" <?php echo ($action == "update") ? "disabled" : ""; ?> />
										</div>
									</div>

									<?php
									if ($action == "add") {
									?>
										<div class="form-group">
											<label class="col-sm-2 control-label" for="Old">Advance Fee* </label>
											<div class="col-sm-10">
												<input type="text" class="form-control" id="advancefees" name="advancefees" readonly />
											</div>
										</div>
									<?php
									}
									?>

									<div class="form-group">
										<label class="col-sm-2 control-label" for="Old">Balance </label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="balance" name="balance" value="<?php echo $balance; ?>" disabled />
										</div>
									</div>




									<?php
									if ($action == "add") {
									?>
										<div class="form-group">
											<label class="col-sm-2 control-label" for="Password">Fee Remark </label>
											<div class="col-sm-10">
												<textarea class="form-control" id="remark" name="remark"><?php echo $remark; ?></textarea>
											</div>
										</div>
									<?php
									}
									?>

								</fieldset>

								<fieldset class="scheduler-border">
									<legend class="scheduler-border">Optional Information:</legend>
									<div class="form-group">
										<label class="col-sm-2 control-label" for="Password">About Student </label>
										<div class="col-sm-10">
											<textarea class="form-control" id="about" name="about"><?php echo $about; ?></textarea>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label" for="Old">Email Id </label>
										<div class="col-sm-10">

											<input type="text" class="form-control" id="emailid" name="emailid" value="<?php echo $emailid; ?>" />
										</div>
									</div>
								</fieldset>

								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-2">
										<input type="hidden" name="id" value="<?php echo $id; ?>">
										<input type="hidden" name="action" value="<?php echo $action; ?>">

										<button type="submit" name="save" class="btn btn-primary">Save </button>



									</div>
								</div>





							</div>
						</form>
    
   
   <?php
		} else {
		?>

			<link href="css/datatable/datatable.css" rel="stylesheet" />




			<div class="panel panel-default">
				<div class="panel-heading">
					Manage Student
				</div>
				<div class="panel-body">
					<div class="table-sorting table-responsive">
						<table class="table table-striped table-bordered table-hover" id="tSortable22">
							<thead>
								<tr>
									<th>#</th>
									<th>Name/Contact</th>
									<th>DOJ</th>
									<th>Fees</th>
									<th>Balance</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "select * from student where delete_status='0'";
								$q = $conn->query($sql);
								$i = 1;
								while ($r = $q->fetch_assoc()) {

									echo '<tr ' . (($r['balance'] > 0) ? 'class="danger"' : '') . '>
                                            <td>' . $i . '</td>
                                            <td>' . $r['sname'] . '<br/>' . $r['contact'] . '</td>
                                            <td>' . date("d M y", strtotime($r['joindate'])) . '</td>
                                            <td>' . $r['fees'] . '</td>
											<td>' . $r['balance'] . '</td>
											<td>
											
											

											<a href="student.php?action=edit&id=' . $r['id'] . '" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
											
											<a onclick="return confirm(\'Are you sure you want to delete this record\');" href="student.php?action=delete&id=' . $r['id'] . '" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a> </td>
											
                                        </tr>';
									$i++;
								}
								?>



							</tbody>
						</table>
					</div>
				</div>
            </div>
            
                            <?php
                        }?>