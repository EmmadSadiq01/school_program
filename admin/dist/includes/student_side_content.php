<style>
    .contact {
        font-size: 12px;
        font-family: cursive;

    }

    .name {
        text-transform: capitalize;
        font-size: 20px;
        font-weight: 400;
        font-family: times new roman;
    }
</style>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="page_header">
                <h1 class="mt-4 hideMe">STUDENTS</h1>
                <h1 class="mt-4 showOnPrint">DAR-UL-ISLAH ACADEMY</h1>
                <div class="header_button hideMe">


                    <?php
                    echo (isset($_GET['action']) && @$_GET['action'] == "add" || @$_GET['action'] == "edit" || @$_GET['action'] == "print") ?
                        ' <a href="student.php" class="btn btn-primary btn-sm pull-right">Back <i class="glyphicon glyphicon-arrow-right"></i></a>' :
                        '<a href="student.php?action=print" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Go for Print </a>
                    <a href="student.php?action=add" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add </a>';
                    ?>
                </div>

            </div>
            <ol class="breadcrumb mb-4 hideMe">
                <li class="breadcrumb-item"><a href="index.php">Students</a></li>
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

                    <div class="col-sm-12 col-sm-offset-1">
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
                                        $gr_no = $row['gr_no'];
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
                                        $institute = $row['institute'];
                                        $placeOfBirth = $row['place_of_birth'];
                                        $labCharges = $row['lab_charges'];
                                    }
                                    echo '<input type="hidden" name="edit_std" value="' . $std_id . '">';
                                }
                                ?>

                                <div class="panel-body">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Personal Information:</legend>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">GR Number* </label>
                                            <?php
                                            $sql_gr = "SELECT * FROM students";
                                            $result_gr = mysqli_query($connection, $sql_gr);
                                            $genetrate_gr_no = mysqli_num_rows($result_gr);

                                            ?>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="gr_no" name="gr_no" value="<?php echo (@$_GET['action'] == "edit") ? "$gr_no" : $genetrate_gr_no + 1  ?>" />
                                            </div>
                                            <label class="col-sm-2 control-label" for="Old">Roll No.* </label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="roll_no" name="roll_no" value="100<?php echo (@$_GET['action'] == "edit") ? $std_id : $genetrate_gr_no + 1  ?>" readonly />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Student Name* </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="sname" name="sname" value="<?php echo (@$_GET['action'] == 'edit') ? $std_name : ''  ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Place Of Birth* </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="placeOfBirth" name="placeOfBirth" value="<?php echo (@$_GET['action'] == 'edit') ? $placeOfBirth : ''  ?>" />
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
                                                <select class="form-control" id="class" name="class">
                                                    <option value="">Select...</option>
                                                    <?php
                                                    $sql = "SELECT * FROM classes ORDER BY class_name ASC";
                                                    $result = mysqli_query($connection, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <option value="<?php echo $row['id'] ?>" <?php echo (@$_GET['action'] == "edit" && $class == $row['id']) ? "selected" : ""  ?>> <?php echo $row['class_name'] ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <!-- <input type="text" class="form-control" id="class" name="class" value="" /> -->
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
                                            <div class="col-sm-9">
                                                <textarea name="address" class="form-control" id="address" cols="30" rows="4"><?php echo (@$_GET['action'] == "edit") ? $address : '' ?></textarea>
                                            </div>
                                        </div>




                                    </fieldset>

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Addmission Details:</legend>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="dateofjoin">Last Institute </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="last_institute" name="institute" value="<?php echo (@$_GET['action'] == "edit") ? "$institute" :   ""  ?>" />

                                            </div>
                                            <label class="col-sm-2 control-label" for="dateofjoin">Date OF Admission </label>
                                            <div class="col-sm-2">
                                                <?php $current_date = date('yy-m-d') ?>
                                                <input type="date" class="form-control" id="dateofjoin" name="dateofjoin" value="<?php echo (@$_GET['action'] == "edit") ? "$doj" :   "$current_date"  ?>" />

                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <label class="col-sm-2 control-label" for="AdmissionFee">Admission Fee </label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="admissionFee" name="admissionFee" value="<?php echo (@$_GET['action'] == "edit") ? $add_fees : '' ?>" />

                                            </div>
                                            <label class="col-sm-2 control-label" for="tutionFee">Tution Fee</label>
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" id="tutionFee" name="tutionFee" value="<?php echo (@$_GET['action'] == "edit") ? $tutionFee : '' ?>" />

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="labCharges">Lab Charges</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="labCharges" name="labCharges" value="<?php echo (@$_GET['action'] == "edit") ? $labCharges : '' ?>" />

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
            } else if (isset($_GET['action']) && @$_GET['action'] == "print") {
            ?>
                <div class="container">
                    <h4>Students Sheet</h4>

                    <table class="table table-bordered" id="item_table">
                        <thead>
                            <tr>
                                <th scope="col">GR #</th>
                                <th scope="col">Name</th>
                                <th scope="col">Father Name</th>
                                <th scope="col">Class</th>
                                <th scope="col">DOA</th>
                                <th scope="col">Monthly Fees</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $class_divider = "";

                            $sql = "SELECT * FROM `students` ORDER BY class ASC";
                            $result = mysqli_query($connection, $sql);
                            $sno = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $sno = $sno + 1;
                                $std_class = $row['class'];
                                $sql_class = "SELECT class_name FROM classes WHERE id='$std_class'";
                                $result_class = mysqli_query($connection, $sql_class);
                                while ($row_class = mysqli_fetch_assoc($result_class)) {
                                    $result_class = $row_class['class_name'];
                                    break;
                                }
                                if ($class_divider != $std_class) {
                            ?>
                                    <tr>
                                        <th class="text-center" colspan="6"><?php echo $result_class ?></th>
                                    </tr>
                                <?php
                                    $class_divider = $std_class;
                                }
                                ?>


                                <tr>
                                    <td>
                                        <p class='name'> <?php echo  $row['gr_no']  ?></p>
                                        <!-- <p class='contact'></p>
                                                <p class='contact'></p> -->
                                    </td>
                                    <td>
                                        <p class='name'> <?php echo  $row['name']  ?></p>
                                        <p class='contact'> <?php echo $row['fnumber'] ?></p>
                                    </td>
                                    <td>
                                        <p class='name'> <?php echo  $row['fname'] ?></p>
                                    </td>
                                    <td>
                                        <p class='name'> <?php echo $result_class;
                                                            ?></p>
                                    </td>
                                    <td>
                                        <p class='name'> <?php echo  $row['doj'] ?></p>
                                    </td>


                                    <td><?php echo $row['tutionFee']; ?></td>
                                </tr>
                            <?php
                            }

                            ?>


                        </tbody>
                    </table>
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
                                        <th scope="col">GR #</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Father Name</th>
                                        <th scope="col">Class</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">DOA</th>
                                        <th scope="col">Monthly Fees</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `students`";
                                    $result = mysqli_query($connection, $sql);
                                    $sno = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sno = $sno + 1; ?>
                                        <tr>
                                            <td>
                                                <p class='name'> <?php echo  $row['gr_no']  ?></p>
                                                <!-- <p class='contact'></p>
                                                <p class='contact'></p> -->
                                            </td>
                                            <td>
                                                <p class='name'> <?php echo  $row['name']  ?></p>
                                                <p class='contact'> <?php echo $row['fnumber'] ?></p>
                                            </td>
                                            <td>
                                                <p class='name'> <?php echo  $row['fname'] ?></p>
                                            </td>
                                            <td>
                                                <p class='name'> <?php
                                                                    $std_class = $row['class'];
                                                                    $sql_class = "SELECT class_name FROM classes WHERE id='$std_class'";
                                                                    $result_class = mysqli_query($connection, $sql_class);
                                                                    while ($row_class = mysqli_fetch_assoc($result_class)) {
                                                                        $result_class = $row_class['class_name'];
                                                                        break;
                                                                    }
                                                                    echo $result_class;
                                                                    ?></p>
                                            </td>
                                            <td>
                                                <p class='name'> <?php echo  $row['dob'] ?></p>
                                            </td>
                                            <td>
                                                <p class='name'> <?php echo  $row['doj'] ?></p>
                                            </td>
                                            <!-- <td style='text-transform:capitalize' class='students-Photo'>
                                                <div class="std_img"><?php
                                                                        // if ($row['img_dir'] == '') {
                                                                        //     if ($row['gender'] == 'Male') {
                                                                        //         echo '<img src="images/avatar.jpg" alt="" class="img-thumbnail">';
                                                                        //     }
                                                                        //     if ($row['gender'] == 'Female') {
                                                                        //         echo '<img src="images/girl avatar.jpg" alt="" class="img-thumbnail">';
                                                                        //     }
                                                                        // } else {
                                                                        //     echo '<img src="images/' . $row['img_dir'] . ' " alt="" class="img-thumbnail">';
                                                                        // }
                                                                        ?></div>
                                            </td> -->


                                            <td><?php echo $row['tutionFee'];
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


<footer class="py-4 bg-light mt-auto hideMe">
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