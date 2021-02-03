<style>
    .add td:nth-child(2) {
        width: 35%;
    }

    form#signupForm1 {
        margin: auto;
    }
</style>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="page_header">
                <h1 class="mt-4">Staff Salary</h1>
                <div class="header_button">


                    <?php
                    echo (isset($_GET['action']) && @$_GET['action'] == "add" || @$_GET['action'] == "edit" || @$_GET['action'] == "print") ?
                        '<a href="salary_distibute.php" class="btn btn-primary btn-sm pull-right">Back <i class="glyphicon glyphicon-arrow-right"></i></a>' :
                        '<a href="salary_distibute.php?action=print" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Go For Print </a>
                    <a href="salary_distibute.php?action=add" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add Salary </a>';
                    ?>
                </div>
            </div>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>

                <?php
                $today_date = date('y-m-d');

                if (!isset($_GET['action']) && @$_GET['action'] != "add") {
                    echo '<li class="breadcrumb-item active">Staff Salary</li>';
                } else {
                    echo '<li class="breadcrumb-item"><a href="salary_distibute.php">Staff salary</a></li>
                <li class="breadcrumb-item active">Add Salary</li>';
                }
                ?>
            </ol>
            <div class="card mb-4">
                <?php
                if (isset($_GET['action']) && @$_GET['action'] == "add") {
                ?>
                    <!-- <div class="card mb-4"> -->
                    <div class="row">

                        <!-- <div class="col-sm-10 col-sm-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <?php echo "Add Staff" ?>
                            </div>
                          

                        </div>
                    </div> -->

                        <form action="salary_distibute.php" method="post" id="signupForm1" class="form-horizontal text-center" enctype="multipart/form-data">
                            <div class="panel-body">
                                <!-- <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Details:</legend>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Name* </label>

                                            <div class="col-sm-10">
                                                <select class="form-control" id="sname" name="name">
                                                    <?php
                                                    // $sql = "SELECT * FROM `teacher` ";
                                                    // $result = mysqli_query($connection, $sql);
                                                    // while ($row = mysqli_fetch_assoc($result)) {
                                                    //     echo '<option value="' . $row["name"] . '">' . $row["name"] . '</option>';
                                                    // }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Absent Days* </label>

                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" style="width: 25%;">
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <input type="hidden" name="id">
                                                <input type="hidden" name="action">

                                                <button type="submit" name="save" class="btn btn-primary">Save </button>



                                            </div>
                                        </div>

                                    </fieldset> -->

                                <table class="add">
                                    <thead>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Month</th>
                                        <th>Salary</th>
                                        <th>Absent</th>
                                        <th>Deduction</th>
                                        <th>Allownce</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </thead>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="dd/mm/yy" name="date" value=" <?php echo date('Y-m-d') ?> "></td>
                                        <td><select class="form-control" id="name" name="name" onchange="staff_salary(this.value)">
                                                <option value="">Select...</option>
                                                <?php
                                                $sql = "SELECT * FROM `teacher` ORDER BY `name` ASC ";
                                                $result = mysqli_query($connection, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                                }
                                                ?>
                                            </select></td>
                                        <td><select name="month" class="form-control" id="month" style="width: 110px;">
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select></td>
                                        <td><input type="text" class="form-control" placeholder="Basic Salary" name="basic_salary" id="basic_salary" readonly></td>
                                        <td><input type="number" class="form-control" placeholder="Absent days" name="absent" id="absent" value="0" onchange="absent_days()"></td>
                                        <td><input type="number" class="form-control" placeholder="deduction" name="deduction" id="deduction" value="0" readonly></td>
                                        <td><input type="number" class="form-control" placeholder="Allowance" name="allw" id="allowance" value="0" onchange="cal_allowance()"></td>
                                        <td><input type="number" class="form-control" placeholder="Total " name="total" id="total" value="0" readonly></td>
                                        <!-- <input type="hidden" name="salary" id="salary" value="4000"> -->
                                        <!-- <td><input type="text" class="form-control"></td>
                                            <td><input type="text" class="form-control"></td> -->
                                        <td> <button type="submit" name="save" class="submit btn btn-primary">Submit </button></td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                <?php } else if (isset($_GET['action']) && @$_GET['action'] == "print") {
                ?>

                    <div class="container">

                        <table class="table table-bordered" id="item_table">
                            <thead>
                                <tr>
                                    <th>S.#</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Absents</th>
                                    <th>Deduction</th>
                                    <th>Allowance</th>
                                    <th>basic Salary</th>
                                    <th>Net Ammout</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM staff_salary WHERE  `date`>='$today_date'";
                                $result = mysqli_query($connection, $sql);
                                $sno = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $sno = $sno + 1; ?>
                                    <tr>
                                        <td><?php echo $sno  ?></th>
                                        <td><?php echo $row['date']  ?></td>
                                        <?php
                                        $staff_id = $row['name'];
                                        $sql1 = "SELECT * FROM teacher WHERE `id` = '$staff_id'";
                                        $result1 = mysqli_query($connection, $sql1);
                                        $salary = 0;
                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                            $name = $row1['name'];
                                        }
                                        $absent_ammount = ($salary / 30) * $row['absent'];

                                        ?>
                                        <td><?php echo $name  ?></td>
                                        <td><?php echo $row['absent']  ?></td>
                                        <td><?php echo "-" . $row['deduction'] ?></td>
                                        <td><?php echo $row['allowance']  ?></td>
                                        <td><?php echo $row['basic_salary']  ?></td>
                                        <td><?php echo $row['net salary']  ?></td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>

                <?php

                } else { ?>
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Staff Salary Data
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>S.#</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Absents</th>
                                        <th>Deduction</th>
                                        <th>Allowance</th>
                                        <th>basic Salary</th>
                                        <th>Net Ammout</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S.#</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Absents</th>
                                        <th>Deduction</th>
                                        <th>Allowance</th>
                                        <th>basic Salary</th>
                                        <th>Net Ammout</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM staff_salary WHERE `date`>='$today_date'";
                                    $result = mysqli_query($connection, $sql);
                                    $sno = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $sno = $sno + 1; ?>
                                        <tr>
                                            <td><?php echo $sno  ?></th>
                                            <td><?php echo $row['date']  ?></td>
                                            <?php
                                            $staff_id = $row['name'];
                                            $sql1 = "SELECT * FROM teacher WHERE `id` = '$staff_id'";
                                            $result1 = mysqli_query($connection, $sql1);
                                            $salary = 0;
                                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                                $name = $row1['name'];
                                            }
                                            $absent_ammount = ($salary / 30) * $row['absent'];

                                            ?>
                                            <td><?php echo $name  ?></td>
                                            <td><?php echo $row['absent']  ?></td>
                                            <td><?php echo "-" . $row['deduction'] ?></td>
                                            <td><?php echo $row['allowance']  ?></td>
                                            <td><?php echo $row['basic_salary']  ?></td>
                                            <td><?php echo $row['net salary']  ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                <?php } ?>

                <!-- </div> -->




            </div>
    </main>



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

<script>
    //     console.log("hello")
    //     console.log("hello")
    //     console.log("hello")
    //     function staff1(value){
    //         // var staff = $(this).val();
    //         console.log(value)
    //         staff_salary(value)
    //     }
    //     function stafF_salary(id) {
    //     $.ajax({
    //       url: "basic_salary_ajax.php",
    //       type: "POST",
    //       data: {
    //           staff = id
    //       },
    //       success: function(data) {
    //         $('#basic_salary').val(data)
    //       }
    //     })
    //   }
</script>