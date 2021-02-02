<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="page_header">
                <h1 class="mt-4">Student Fee Manager</h1>
                <!-- <a href="#" class="btn btn-primary btn-sm pull-right">Generate Fees Vaucher <i class="glyphicon glyphicon-arrow-right"></i></a> -->

            </div>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="fees_collection.php">Fees</a></li>
                <li class="breadcrumb-item active">Generate Fee Vaucher</li>
            </ol>
            <div class="card mb-4">
                <div class="row">
                    <?php
                    $std_id = $_GET['edit'];

                    ?>
                    <div class="panel-body">
                        <table class="add">
                            <thead>
                                <th>Roll no</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Month</th>
                                <th>Fees</th>
                                <th>Delete</th>
                            </thead>
                            <?php

                            $sql_rows = "SELECT * FROM `balance` INNER JOIN students ON id=std_id WHERE std_id='$std_id'";
                            $result_rows = mysqli_query($connection, $sql_rows);
                            $sno = 0;
                            while ($row_rows = mysqli_fetch_assoc($result_rows)) {
                                $count = 0;
                            ?>
                                <form action="edit_fees_recipt.php?edit=<?php echo $std_id ?>" method="post" id="signupForm1" class="form-horizontal text-center" enctype="multipart/form-data">



                                    <tr>
                                        <td><input type="text" class="form-control" name="roll_no" id="roll_no" value="100<?php echo $row_rows['std_id'] ?>" readonly></td>
                                        <td><input type="text" class="form-control" name="std_name" id="std_name" value="<?php echo $row_rows['name'] ?>" readonly>
                                            <?php
                                            // $sql = "SELECT * FROM `students` ORDER BY `name` ASC ";
                                            // $result = mysqli_query($connection, $sql);
                                            // while ($row = mysqli_fetch_assoc($result)) {
                                            //     echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                                            // }
                                            ?>
                                        </td>
                                        <td><input type="text" class="form-control" name="std_name" id="std_name" value="<?php echo $row_rows['class'] ?>" readonly>
                                            <?php
                                            // $sql = "SELECT * FROM `classes` ORDER BY `class_name` ASC ";
                                            // $result = mysqli_query($connection, $sql);
                                            // while ($row = mysqli_fetch_assoc($result)) {
                                            //     echo '<option value="' . $row["id"] . '">' . $row["class_name"] . '</option>';
                                            // }
                                            ?></td>

                                        <?php
                                        if ($row_rows['invoice_type'] == 'monthly') {
                                        ?>
                                            <!-- <input type="hidden" name="update_id[]"> -->
                                            <td><select name="month" class="form-control" id="month">
                                                    <option value="january" <?php echo ($row_rows['months'] == 'january') ? 'selected' : '' ?>>January</option>
                                                    <option value="february" <?php echo ($row_rows['months'] == 'february') ? 'selected' : '' ?>>February</option>
                                                    <option value="march" <?php echo ($row_rows['months'] == 'march') ? 'selected' : '' ?>>March</option>
                                                    <option value="april" <?php echo ($row_rows['months'] == 'april') ? 'selected' : '' ?>>April</option>
                                                    <option value="may" <?php echo ($row_rows['months'] == 'may') ? 'selected' : '' ?>>May</option>
                                                    <option value="june" <?php echo ($row_rows['months'] == 'june') ? 'selected' : '' ?>>June</option>
                                                    <option value="july" <?php echo ($row_rows['months'] == 'july') ? 'selected' : '' ?>>July</option>
                                                    <option value="august" <?php echo ($row_rows['months'] == 'august') ? 'selected' : '' ?>>August</option>
                                                    <option value="september" <?php echo ($row_rows['months'] == 'september') ? 'selected' : '' ?>>September</option>
                                                    <option value="november" <?php echo ($row_rows['months'] == 'november') ? 'selected' : '' ?>>November</option>
                                                    <option value="december" <?php echo ($row_rows['months'] == 'december') ? 'selected' : '' ?>>December</option>
                                                </select></td>
                                        <?php
                                        } else {
                                        ?>
                                            <td> <select name="other" id="other_<?php echo $row_rows['std_id'] ?>" class="form-control" onchange="other_fees(this.id)">
                                                    <option value="">Select...</option>
                                                    <option value="lab_charges<?php echo $row_rows['id_bal'] ?>" <?php echo ($row_rows['invoice_type'] == 'lab_charges') ? 'selected' : '' ?>>Lab Charges</option>
                                                    <option value="annualCharg<?php echo $row_rows['id_bal'] ?>" <?php echo ($row_rows['invoice_type'] == 'annualCharg') ? 'selected' : '' ?>>Annual Charges</option>
                                                    <!-- <option value="advance" <?php echo ($row_rows['invoice_type'] == 'advance') ? 'selected' : '' ?>>Advance</option> -->
                                                </select></td>
                                        <?php
                                        }
                                        ?>
                                        <td><input type="text" class="form-control" name="fees" id="fees_<?php echo $row_rows['id_bal'] ?>" value="<?php echo $row_rows['amount'] ?>" readonly></td>

                                        <!-- <td> <input type="" name="del[]" id="del" value=""></td> -->
                                        <td>
                                            <button type="submit" class="form-control btn-primary" name="save" id="save" value="<?php echo $row_rows['id_bal'] ?>">Save</button>
                                            <button type="submit" class="form-control btn-primary" name="del" id="del" value="<?php echo $row_rows['id_bal'] ?>">Delete</button>
                                            <!-- <a href="fees_recipt.php?update=<?php echo $row_rows['id_bal'] ?>">save</a> -->
                                        </td>

                                    </tr>
                                </form>

                            <?php
                                $count = $count + 1;
                            }
                            ?>
                        </table>
                    </div>
                    <!-- <input type="submit" value="Save" id="submit" class="form-control btn-primary"> -->

                </div>
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