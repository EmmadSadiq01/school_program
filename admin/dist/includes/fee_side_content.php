<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="page_header">
                <h1 class="mt-4">FEES COLLECTION</h1>
                <a href="fees_recipt.php" class="btn btn-primary btn-sm pull-right">Generate Fees Vaucher <i class="glyphicon glyphicon-arrow-right"></i></a>

            </div>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Fees</li>
            </ol>
            <?php
            if (isset($_GET['take'])) {
                $std_id=$_GET['take'];
                $sql="SELECT * FROM `students` where id='$std_id'";
                $result = mysqli_query($connection,$sql);
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <form id="contact" action="fees_collection.php" method="post">
                    <h3>Collect Fees</h3>
                    <!-- <h4>Collect Student fees!</h4> -->
                    <fieldset>
                        <input placeholder="Your name" type="text" tabindex="1" value="<?php echo $row['name'] ?> " name="std_name" readonly>
                    </fieldset>
                    <fieldset>
                        <input placeholder="Roll No" type="text" tabindex="1" value="100<?php echo $row['id'] ?> " name="std_id" readonly>
                    </fieldset>
                    <fieldset>
                        <input placeholder="Contact no." type="email" tabindex="2"  value="<?php echo $row['contact'] ?> " readonly>
                    </fieldset>
                    <fieldset>
                        <input placeholder="balance" type="text" tabindex="3" value="3000" readonly>
                    </fieldset>
                    <fieldset>
                    <label for="months">Select Months *</label>
                    <br>
                    <small>Hold crtl key for multiple select:</small>
                    <select class="form-control" id="months" name="months[]" size="5" multiple="multiple" >
                                                    <?php
                                                     $sql_balance1 = "SELECT * FROM balance where std_id='$std_id'";
                                                     $result_balance1 = mysqli_query($connection, $sql_balance1);
                                                     while ($row_balance1 = mysqli_fetch_array($result_balance1)) {
                                                        echo '<option value="' . $row_balance1['months'] . '"  > ' . $row_balance1['months'] . '</option>';
                                                    }
                                                    ?>

                                                </select>
                    </fieldset>
                    <fieldset>
                        <input placeholder="Paid Amount" type="text" name="paid">
                    </fieldset>
                    
                    <fieldset>
                        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
                    </fieldset>
                </form>
            <?php
                }
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

                                        <th>Roll No.</th>
                                        <th>Student Name</th>
                                        <th>Class</th>
                                        <th>Fees</th>
                                        <th>Balance</th>
                                        <th>Months</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Roll No.</th>
                                        <th>Student Name</th>
                                        <th>Class</th>
                                        <th>Fees</th>
                                        <th>Balance</th>
                                        <th>Months</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    $sql = "SELECT * FROM `classes` inner join `students` on classes.class_name=students.class";
                                    $result = mysqli_query($connection, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td>100<?php echo $row['id'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['class'] ?></td>
                                            <td> <?php echo $row['monthly_fees'];
                                                    $std_id = $row['id'];
                                                    ?></td>
                                            <?php
                                            $sql_balance = "SELECT * FROM balance where std_id='$std_id'";
                                            $result_balance = mysqli_query($connection, $sql_balance);
                                            $total_ammount = 0;
                                            while ($row_balance = mysqli_fetch_assoc($result_balance)) {
                                                $total_ammount += $row_balance['amount'];
                                            }
                                            ?>
                                            <td><?php echo $total_ammount ?></td>
                                            <td>
                                                <?php
                                                $sql_balance1 = "SELECT * FROM balance where std_id='$std_id'";
                                                $result_balance1 = mysqli_query($connection, $sql_balance1);
                                                while ($row_balance1 = mysqli_fetch_array($result_balance1)) {
                                                    echo $row_balance1['months'] . " | ";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <!-- <button type="button" class="take btn btn-primary" id=<?php echo $row['id'] ?>>Take Fees</button> -->
                                                <a href="fees_collection.php?take=<?php echo $row['id'] ?>">Take fees</a>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>




                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            <?php
            }
            ?>
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
</script>