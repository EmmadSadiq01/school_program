<style>
    fieldset.scheduler-border {
    padding: 0px 35px 0px 15px !important;
    }
</style>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="page_header">
                <h1 class="mt-4">School Staff</h1>
                <?php
                echo (isset($_GET['action']) && @$_GET['action'] == "add" || @$_GET['action'] == "edit") ?
                    ' <a href="teacher.php" class="btn btn-primary btn-sm pull-right">Back <i class="glyphicon glyphicon-arrow-right"></i></a>' :
                    '<a href="teacher.php?action=add" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add </a>';
                ?>

            </div>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <?php
                if (isset($_GET['action']) && @$_GET['action'] == "add"){
                    echo '<li class="breadcrumb-item"><a href="teacher.php">School Staff</a></li>';
                    echo '<li class="breadcrumb-item active">Add</li>';
                }
                else{
                    echo '<li class="breadcrumb-item">School Staff</li>';
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
                                <?php echo "Add Staff" ?>
                            </div>
                            <form action="teacher.php" method="post" id="signupForm1" class="form-horizontal" enctype="multipart/form-data">
                            <?php
                                if (@$_GET['action'] == "edit") {
                                    $teacher_id = $_GET['edit'];
                                    $sql = "SELECT * FROM teacher WHERE `id` = '$teacher_id'";
                                    $result = mysqli_query($connection, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                       $name = $row['name'];
                                       $contact = $row['contact'];
                                       $email = $row['email'];
                                       $gender = $row['gender'];
                                       $dob = $row['dob'];
                                       $doj = $row['doj'];
                                       $address = $row['address'];
                                       $refrence = $row['refrence'];
                                       $qualification = $row['qualification'];
                                       $year = $row['year'];
                                       $course = $row['course'];
                                       $salary = $row['salary'];
                                       $post = $row['post'];
                                       $allowance = $row['allowance'];
                                       $fhname = $row['fhname'];
                                       $cnic = $row['cnic'];
                                       $experince = $row['experience'];
                                    }
                                    echo '<input type="hidden" name="edit_teacher" value="' . $teacher_id . '">';
                                }
                                ?>
                                <div class="panel-body">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Personal Information:</legend>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Name* </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="sname" name="name"  value="<?php echo (@$_GET['action'] == 'edit') ? $name : ''  ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Father/Husb. Name* </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="fhname" name="fhname"  value="<?php echo (@$_GET['action'] == 'edit') ? $fhname : ''  ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Contact* </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="contact" name="contact" maxlength="12" value="<?php echo (@$_GET['action'] == 'edit') ? $contact : ''  ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">CNIC* </label>
                                            <div class="col-sm-10">
                                                <input type="TEXT" class="form-control" id="cnic" name="cnic" value="<?php echo (@$_GET['action'] == 'edit') ? $cnic : ''  ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Email Id </label>
                                            <div class="col-sm-10">

                                                <input type="email" class="form-control" id="emailid" name="email" value="<?php echo (@$_GET['action'] == 'edit') ? $email : ''  ?>" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="gender">Gender* </label>
                                            <div class="col-sm-10">
                                                <select id="inputState" class="form-control" name="gender" required>

                                                    <option >Select...</option>
                                                    <option  <?php echo (@$_GET['action'] == "edit" && $gender == "Male") ? "selected" : ""  ?>>Male</option>
                                                    <option  <?php echo (@$_GET['action'] == "edit" && $gender == "Female") ? "selected" : ""  ?>>Female</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">DOJ* </label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="joindate" name="doj" style="background-color: #fff;" value="<?php echo (@$_GET['action'] == "edit") ? "$doj" : date("yy-m-d")  ?>" placeholder="dd/mm/yy" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">DOB* </label>
                                            <div class="col-sm-10">
                                                <input type="date" class="js-date form-control" style="background-color: #fff;" maxlength="10" placeholder="dd/mm/year" name="dob"  value="<?php echo (@$_GET['action'] == "edit") ? "$dob" : ""  ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="name">Address* </label>
                                            <div class="col-sm-10">
                                                <textarea cols="30" rows="2" class="form-control" id="name" name="address"><?php echo (@$_GET['action'] == "edit") ? $address : '' ?></textarea>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Reference </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="ref" name="ref_tech" value="<?php echo (@$_GET['action'] == "edit") ? $refrence : '' ?>" />
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
                                        <legend class="scheduler-border">Qualification:</legend>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Last Degree* </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="deg" name="degree" value="<?php echo (@$_GET['action'] == "edit") ? $qualification : '' ?>" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Passing year* </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="fees" name="passing_year" value="<?php echo (@$_GET['action'] == "edit") ? $year : '' ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Course Applied For* </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="fees" name="for_course" value="<?php echo (@$_GET['action'] == "edit") ? $course : '' ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Experience* </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="experience" name="experience" value="<?php echo (@$_GET['action'] == "edit") ? $experince : '' ?>" />
                                            </div>
                                        </div>
                                        

                                    </fieldset>

                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border"> Salary Information:</legend>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Password">Designation*  </label>
                                            <div class="col-sm-10">
                                               <!-- <input type="text" class="form-control" id="about" name="post" value=""/> -->
                                               <select class="form-control" id="about" name="post">
                                                   <option value="select">Select...</option>
                                                   <option value="teacher" <?php echo (@$_GET['action'] == "edit" && $post=="teacher") ? "selected" : '' ?>>Teacher</option>
                                                   <option value="management" <?php echo (@$_GET['action'] == "edit" && $post=="management") ? "selected" : '' ?>>Management</option>
                                                   <option value="peon" <?php echo (@$_GET['action'] == "edit" && $post=="peon") ? "selected" : '' ?>>Peon</option>
                                               </select>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Password">Basic Salary*  </label>
                                            <div class="col-sm-10">
                                               <input type="text" class="form-control" id="about" name="salary" value="<?php echo (@$_GET['action'] == "edit") ? $salary : '' ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Password">Allowance*  </label>
                                            <div class="col-sm-10">
                                               <input type="text" class="form-control" id="allowance" name="allowance" value="<?php echo (@$_GET['action'] == "edit") ? $allowance : '' ?>"/>
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
                        Staff Data
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">S.no</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Post</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Salary</th>
                                        <th scope="col">DOJ</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `teacher`";
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


                                            <td><?php echo $row['post'] ?></td>
                                            <td><?php echo $row['gender'] ?></td>
                                            <td><?php echo $row['salary'] ?></td>
                                            <td><?php echo $row['doj'] ?></td>

                                        <td>
                                        <!-- <button type='button' class='updateButton btn btn-primary' onclick='handleSubmit' >Update</button> 
                                        <button type='button' class='View btn btn-danger'>View</button></td> -->
                                        <a href="teacher.php?action=edit&edit=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm pull-right">Edit </a>
                                        <button class="del btn btn-primary" id="d<?php echo $row['id'] ?>">Delete</button>
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