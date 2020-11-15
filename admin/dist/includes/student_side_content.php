<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="page_header">
                <h1 class="mt-4">STUDENTS</h1>
                <?php
                echo (isset($_GET['action']) && @$_GET['action'] == "add" || @$_GET['action'] == "edit") ?
                    ' <a href="student.php" class="btn btn-primary btn-sm pull-right">Back <i class="glyphicon glyphicon-arrow-right"></i></a>' :
                    '<a href="student.php?action=add" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add </a>';
                ?>

            </div>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Student</li>
            </ol>
            <?php
            if (isset($_GET['action']) && @$_GET['action'] == "add" || @$_GET['action'] == "edit") {
            ?>
                <div class="row">

                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <?php echo ($action == "add") ? "Add Student" : "Edit Student"; ?>
                            </div>
                            <form action="student.php" method="post" id="signupForm1" class="form-horizontal" enctype="multipart/form-data">
                                <div class="panel-body">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Personal Information:</legend>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Name* </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="sname" name="name" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Contact* </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="contact" name="contact" maxlength="12" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="gender">Gender* </label>
                                            <div class="col-sm-10">
                                                <select id="inputState" class="form-control" name="gender" required>

                                                    <option>Select...</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">DOJ* </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="joindate" name="doj" style="background-color: #fff;" value="<?php echo date("d/m/y"); ?>" placeholder="dd/mm/yy" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">DOB* </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="js-date form-control" style="background-color: #fff;" maxlength="10" placeholder="dd/mm/year" name="dob" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="name">Address* </label>
                                            <div class="col-sm-10">
                                                <textarea cols="30" rows="2" class="form-control" id="name" name="address"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Upload Photo </label>
                                            <div class="col-sm-10">
                                                <input type="file" name="image">

                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Fee Information:</legend>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Admission Fees* </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="fees" name="add_fees" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Monthly Fees* </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="fees" name="monthly_fees" />
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
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Class* </label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="class" name="class">
                                                    <option value="">Select Class</option>
                                                    <?php
                                                    $sql = "select * from classes order by classes.class_name asc";
                                                    $q = $connection->query($sql);

                                                    while ($r = $q->fetch_assoc()) {
                                                        echo '<option value="' . $r['class_name'] . '" > ' . $r['class_name'] . '</option>';
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>

                                    </fieldset>

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Optional Information:</legend>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Password">About Student </label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="about" name="about"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Email Id </label>
                                            <div class="col-sm-10">

                                                <input type="text" class="form-control" id="emailid" name="email" />
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <input type="hidden" name="id">
                                            <input type="hidden" name="action">

                                            <button type="submit" name="save" class="btn btn-primary">Save </button>



                                        </div>
                                    </div>





                                </div>
                            </form>

                        </div>
                    </div>


                </div>

            <?php
            } else {
            ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Students Data
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">S.no</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Class</th>
                                        <th scope="col">Monthly Fees</th>
                                        <th scope="col">Balance</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM students";
                                    $result = mysqli_query($connection, $sql);
                                    $sno = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sno = $sno + 1; ?>
                                        <tr>
                                            <th scope='row'> <?php echo $sno  ?> </th>
                                            <td>
                                                <p class='name'> <?php echo  $row['name']  ?></p>
                                                <p class='contact'> <?php echo $row['contact']   ?></p>
                                            </td>
                                            <td style='text-transform:capitalize' class='students-Photo'>
                                                <div class="std_img"><?php
                                                                        if ($row['img_dir'] == '') {
                                                                            if ($row['gender'] == 'Male') {
                                                                                echo '<img src="images/avatar.jpg" alt="" class="img-thumbnail">';
                                                                            }
                                                                            if ($row['gender'] == 'Female') {
                                                                                echo '<img src="images/girl avatar.jpg" alt="" class="img-thumbnail">';
                                                                            }
                                                                        } else {
                                                                            echo '<img src="images/' . $row['img_dir'] . ' " alt="" class="img-thumbnail">';
                                                                        } ?></div>
                                            </td>


                                            <td><?php echo $row['gender'] ?></td>
                                            <td><?php echo $row['class'] ?></td>

                                            <?php
                                            $class = $row['class'];
                                            $sql_fees = "SELECT * FROM classes where class_name='$class'";
                                            $result_fees = mysqli_query($connection, $sql_fees);
                                            while ($row_fees = mysqli_fetch_assoc($result_fees)) {
                                            ?>
                                                <td> <?php echo $row_fees['monthly_fees'] ?></td>
                                            <?php
                                            }
                                            ?>

                                        <?php
                                        echo " <td>" . $row['balance'] . "</td>
                                        <td><button type='button' class='updateButton btn btn-primary' onclick='handleSubmit' >Update</button> <button type='button' class='View btn btn-danger'>View</button></td>
                                        </tr>";
                                    }

                                        ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </main>
<?php
            }
?>


<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy;M. Emmad Sadiq</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>

</div>
</div>