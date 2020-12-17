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
                <?php
                if (isset($_GET['action']) && @$_GET['action'] == "add") {
                    echo '<li class="breadcrumb-item"><a href="student.php">Student</a></li>';
                    echo '<li class="breadcrumb-item active">Add</li>';
                } else {
                    echo '<li class="breadcrumb-item">Student</li>';
                }
                ?>
            </ol>
            <?php
            if (isset($_GET['action']) && @$_GET['action'] == "add" || @$_GET['action'] == "edit") {
            ?>
                <div class="row">

                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <?php
                                echo (@$_GET['action'] == "add") ? "Add Student" : "Edit Student";
                                ?>
                            </div>

                            <form action="student.php" method="post" id="signupForm1" class="form-horizontal" enctype="multipart/form-data">
                                <?php
                                if (@$_GET['action'] == "edit") {
                                    $std_id = $_GET['edit'];
                                    $sql = "SELECT * FROM students WHERE `id` = '$std_id'";
                                    $result = mysqli_query($connection, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $std_name = $row['name'];
                                        $nationality = $row['nationality'];
                                        $religion = $row['religion'];
                                        $gender = $row['gender'];
                                        $dob = $row['dob'];
                                        $class = $row['class'];
                                        $session = $row['session'];
                                        $address = $row['address'];
                                        $fname = $row['fname'];
                                        $fcnic = $row['fcnic'];
                                        $foccupation = $row['foccupation'];
                                        $feducation = $row['feducation'];
                                        $mname = $row['mname'];
                                        $mcnic = $row['mcnic'];
                                        $moccupation = $row['moccupation'];
                                        $meducation = $row['meducation'];
                                        $fnumber = $row['fnumber'];
                                        $mnumber = $row['mnumber'];
                                        $doj = $row['doj'];
                                        $add_fees = $row['add_fees'];
                                        $tutionFee = $row['tutionFee'];
                                        $annualCharges = $row['annualCharges'];
                                    }
                                    echo '<input type="hidden" name="edit_std" value="' . $std_id . '">';
                                }
                                ?>

                                <div class="panel-body">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Personal Information:</legend>



                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Student Name* </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="sname" name="sname" value="<?php echo (@$_GET['action'] == 'edit') ? $std_name : ''  ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Nationality* </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="nationality" name="nationality" value="<?php echo (@$_GET['action'] == "edit") ? "$nationality" : "Pakistani"  ?>" />
                                            </div>
                                            <label class="col-sm-1 control-label" for="Old">Religion* </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="religion" name="religion" value="<?php echo (@$_GET['action'] == "edit") ? "$religion" : "Islam"  ?>" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="gender">Gender* </label>
                                            <div class="col-sm-4">
                                                <select id="inputState" class="form-control" name="gender" required>

                                                    <option>Select...</option>

                                                    <option <?php echo (@$_GET['action'] == "edit" && $gender == "Male") ? "selected" : ""  ?>>Male</option>
                                                    <option <?php echo (@$_GET['action'] == "edit" && $gender == "Female") ? "selected" : ""  ?>>Female</option>
                                                </select>
                                            </div>
                                            <label class="col-sm-1 control-label" for="Old">DOB* </label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control" id="dateofbirth" name="dob" placeholder="dd/mm/yy" value="<?php echo (@$_GET['action'] == "edit") ? "$dob" : ""  ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Class* </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="class" name="class" value="<?php echo (@$_GET['action'] == "edit") ? "$class" : ""  ?>" />
                                            </div>
                                            <label class="col-sm-1 control-label" for="Old">Session* </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="session" name="session" value="<?php echo (@$_GET['action'] == "edit") ? "$session" : ""  ?>" />
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
                                        <legend class="scheduler-border">Parent`s Detail:</legend>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="fname">Father Name* </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo (@$_GET['action'] == "edit") ? "$fname" : ""  ?>" />
                                            </div>
                                            <label class="col-sm-2 control-label" for="fcnic">Father CNIC* </label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="fcnic" name="fcnic" value="<?php echo (@$_GET['action'] == "edit") ? "$fcnic" : ""  ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="foccupation">Father Occupation* </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="foccupation" name="foccupation" value="<?php echo (@$_GET['action'] == "edit") ? "$foccupation" : ""  ?>" />
                                            </div>
                                            <label class="col-sm-2 control-label" for="feducation">Father Education* </label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="feducation" name="feducation" value="<?php echo (@$_GET['action'] == "edit") ? "$feducation" : ""  ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="mname">Mother Name* </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="mname" name="mname" value="<?php echo (@$_GET['action'] == "edit") ? "$mname" : ""  ?>" />
                                            </div>
                                            <label class="col-sm-2 control-label" for="mcnic">Mother CNIC* </label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="mcnic" name="mcnic" value="<?php echo (@$_GET['action'] == "edit") ? "$mcnic" : ""  ?>" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="moccupation">Mother Occupation* </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="moccupation" name="moccupation" value="<?php echo (@$_GET['action'] == "edit") ? "$moccupation" : ""  ?>" />
                                            </div>
                                            <label class="col-sm-2 control-label" for="meducation">Mother Education* </label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="meducation" name="meducation" value="<?php echo (@$_GET['action'] == "edit") ? "$meducation" : ""  ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="fnumber">Father`s Call No.* </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="fnumber" name="fnumber" value="<?php echo (@$_GET['action'] == "edit") ? "$fnumber" : ""  ?>" />
                                            </div>
                                            <label class="col-sm-2 control-label" for="mnumber">Mother`s Call No* </label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="mnumber" name="mnumber" value="<?php echo (@$_GET['action'] == "edit") ? "$mnumber" : ""  ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="moccupation">Address* </label>
                                            <div class="col-sm-10">
                                                <textarea name="address" class="form-control" id="address" cols="30" rows="4"><?php echo (@$_GET['action'] == "edit") ? $address : '' ?></textarea>
                                            </div>
                                        </div>




                                    </fieldset>

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Addmission Details:</legend>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="dateofjoin">Date OF Admission </label>
                                            <div class="col-sm-4">
                                                <?php $current_date = date('yy-m-d') ?>
                                                <input type="date" class="form-control" id="dateofjoin" name="dateofjoin" value="<?php echo (@$_GET['action'] == "edit") ? "$doj" :   "$current_date"  ?>" />

                                            </div>
                                            <label class="col-sm-2 control-label" for="AdmissionFee">Admission Fee </label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" id="admissionFee" name="admissionFee" value="<?php echo (@$_GET['action'] == "edit") ? $add_fees : '' ?>" />

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="tutionFee">Tution Fee</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="tutionFee" name="tutionFee" value="<?php echo (@$_GET['action'] == "edit") ? $tutionFee : '' ?>" />

                                            </div>
                                            <label class="col-sm-2 control-label" for="annualCharges">Annual Charges</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" id="annualCharges" name="annualCharges" value="<?php echo (@$_GET['action'] == "edit") ? $annualCharges : '' ?>" />

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


                        </form>
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
                                        <!-- <th scope="col">Total Balance</th>
                                        <th scope="col">Balance Months</th> -->
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `classes` inner join `students` on classes.class_name=students.class";
                                    $result = mysqli_query($connection, $sql);
                                    $sno = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sno = $sno + 1; ?>
                                        <tr>
                                            <th scope='row'> <?php echo $sno  ?> </th>
                                            <td>
                                                <p class='name'> <?php echo  $row['name']  ?></p>
                                                <p class='contact'> <?php echo $row['fnumber']   ?></p>
                                                <p class='contact'> <?php echo $row['mnumber']   ?></p>
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


                                            <td> <?php echo $row['monthly_fees'];
                                                    $std_id = $row['id'];
                                                    ?></td>


                                            <?php
                                            // $sql_balance = "SELECT * FROM balance where std_id='$std_id'";
                                            // $result_balance = mysqli_query($connection, $sql_balance);
                                            // $total_ammount = 0;
                                            // while ($row_balance = mysqli_fetch_assoc($result_balance)) {
                                            //     $total_ammount += $row_balance['amount'];
                                            // }
                                            ?>
                                            <!-- <td><?php echo $total_ammount ?></td> -->
                                            <!-- <td> -->
                                            <?php
                                            //  $sql_balance1 = "SELECT * FROM balance where std_id='$std_id'";
                                            //  $result_balance1 = mysqli_query($connection, $sql_balance1);
                                            // while ($row_balance1 = mysqli_fetch_array($result_balance1)) {
                                            //     echo $row_balance1['months']. " | ";

                                            // }
                                            ?>
                                            <!-- </td> -->
                                            <td>
                                                <!-- <button type='button' class='updateButton btn btn-primary'>Edit</button> 
                                                <button type='button' class='View btn btn-danger'>View</button> -->
                                                <a href="student.php?action=edit&edit=<?php echo $std_id ?>" class="btn btn-primary btn-sm pull-right">Edit </a>
                                                <button class="del btn btn-primary" id="d<?php echo $std_id ?>">Delete</button>
                                            </td>
                                        </tr>
                                    <?php
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