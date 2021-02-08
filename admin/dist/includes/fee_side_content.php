<style>
    #adv_months {
        /* display: none; */
        border: 1px solid black;
        padding: 15px 15px;
        border-radius: 20px;
        background-color: #343a40;
        color: #fff8ec;
    }
</style>
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
                $std_id = $_GET['take'];
                $sql = "SELECT * FROM `students` where id='$std_id'";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <form id="contact" action="fees_collection.php" method="post">
                        <h3>Collect Fees</h3>
                        <fieldset>
                            <small>Student G.R Number :</small>
                            <input placeholder="G.R Number" type="text" value="<?php echo $row['gr_no'] ?>" name="gr_no" readonly>
                        </fieldset>
                        <fieldset>
                            <small>Student Roll Number :</small>
                            <input placeholder="Roll No" type="text" value="100<?php echo $row['id'] ?>" name="std_id" readonly>
                        </fieldset>
                        <fieldset>
                            <small>Student Name :</small>
                            <input placeholder="Student Name" type="text" value="<?php echo $row['name'] ?> " name="std_name" readonly>
                        </fieldset>

                        <fieldset>
                            <small>Monthly Fees :</small>
                            <input placeholder="Monthly Fees" type="text" id="tutionfee" value="<?php echo $row['tutionFee'] ?> " name="tutionfee" readonly>
                        </fieldset>
                        <fieldset>
                        <?php
                          $sql_balance1 = "SELECT * FROM balance where std_id='$std_id'";
                          $result_balance1 = mysqli_query($connection, $sql_balance1);
                          $pre_balance = 0;
                          while ($row_balance1 = mysqli_fetch_array($result_balance1)) {
                              $pre_balance = $pre_balance + $row_balance1['amount'];
                          }?>
                            <small>Previous Balance :</small>
                            <input placeholder="balance" type="text" tabindex="3" value="<?php echo $pre_balance ?>" name="balance" readonly>
                        </fieldset>
                        <!-- <fieldset>
                            <label for="months">Select Months *</label>
                            <br>
                            <small>Hold crtl key for multiple select:</small>
                            <select class="form-control" id="months" name="months[]" size="5" multiple="multiple" onchange="selectmonths()">
                              

                            </select>
                        </fieldset> -->

                        <fieldset>
                            <!-- <label for="advance">Advance Payment : </label> -->

                            <!-- <input id="advance" name="advance" type="checkbox" value="advance" onclick="advance_fees()"> -->
                            <div id="adv_months">
                                <!-- <label for="advance" class="show">Number of months:</label>
                        
                           
                                <input id="no_of_months" class="show" name="no_of_months" type="number" placeholder="no of months"> -->
                                <div class="row">
                                <?php
                                $sql_balance1 = "SELECT * FROM balance where std_id='$std_id'";
                                $result_balance1 = mysqli_query($connection, $sql_balance1);
                                while ($row_balance1 = mysqli_fetch_array($result_balance1)) {
                                    // echo '<option value="' . $row_balance1['months'] . '"  > ' . $row_balance1['months'] . '</option>';
                                if( $row_balance1['invoice_type'] == "monthly" ){
                                ?>
                                    <div class="month_name col-3">
                                        <input type="checkbox" name="adv_month[]" value="<?php echo $row_balance1['id_bal'] ?>" id="<?php echo $row_balance1['id_bal'].'_'.$row_balance1['amount'] ?>" class="paid_months" onchange="paid_months(this.id)">
                                        <label for="month"><?php echo $row_balance1['months'] ?></label>
                                    </div>

                                    <?php
                                }
                                else{
                                    ?>
                                     <div class="month_name col-3">
                                        <input type="checkbox" name="adv_month[]" value="<?php echo $row_balance1['id_bal'] ?>" id="<?php echo $row_balance1['id_bal'].'_'.$row_balance1['amount'] ?>" class="paid_charges"  onchange="paid_months(this.id)">
                                        <label for="month"><?php echo $row_balance1['months'] ?></label>
                                    </div>
                                    <?php

                                }
                                    }
                                    ?>                                 

                                </div>

                            </div>

                        </fieldset>

                        <fieldset>
                            <small>Amount :</small>
                            <input placeholder="Amount" id="amount" name="amount" type="text" tabindex="3" value="select months amount" readonly>
                        </fieldset>
                        <fieldset>
                            <small>Discount:</small>
                            <input placeholder="Discount" type="number" id="discount" name="discount" onchange="discount_val()" value="0" style="width: 100%;" required>
                        </fieldset>
                        <fieldset>
                            <small>Gross :</small>
                            <input placeholder="Gross" type="text" name="gross" id="gross" readonly>
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
                        Students Dues Collection
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
                                    $sql = "SELECT * FROM `students`";
                                    $result = mysqli_query($connection, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $std_id = $row['id'];
                                        $sql_balance = "SELECT * FROM balance where std_id='$std_id'";
                                        $result_balance = mysqli_query($connection, $sql_balance);
                                        $total_ammount = 0;
                                        while ($row_balance = mysqli_fetch_assoc($result_balance)) {
                                            $total_ammount += $row_balance['amount'];
                                        }
                                        if ($total_ammount != 0) {
                                    ?>
                                            <tr>
                                                <td>100<?php echo $row['id'] ?></td>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['class'] ?></td>
                                                <td> <?php echo $row['tutionFee'];
                                                        // $std_id = $row['id'];
                                                        ?></td>
                                                <?php
                                                // $sql_balance = "SELECT * FROM balance where std_id='$std_id'";
                                                // $result_balance = mysqli_query($connection, $sql_balance);
                                                // $total_ammount = 0;
                                                // while ($row_balance = mysqli_fetch_assoc($result_balance)) {
                                                //     $total_ammount += $row_balance['amount'];
                                                // }
                                                ?>
                                                <td><?php echo $total_ammount ?></td>
                                                <td>
                                                    <?php
                                                    $sql_balance1 = "SELECT * FROM balance where std_id='$std_id'";
                                                    $result_balance1 = mysqli_query($connection, $sql_balance1);
                                                    while ($row_balance1 = mysqli_fetch_array($result_balance1)) {
                                                        echo $row_balance1['months'] . " ";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <!-- <button type="button" class="take btn btn-primary" id=<?php echo $row['id'] ?>>Take Fees</button> -->
                                                    <a href="fees_collection.php?take=<?php echo $row['id'] ?>">Take fees</a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
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
<script>
    function selectmonths() {
        let selected_month = $("#months :selected").length;
        let fees = $("#tutionfee").val();
        console.log(fees)
        let selectedfees = fees * selected_month
        $("#amount").val(selectedfees)
        let discount = $("#discount").val()
        $("#gross").val(selectedfees-discount)
    }
let total_paid_charges=0;
    function paid_months(id) {
        if($("#"+id).prop("checked") ==true){
            total_paid_charges = total_paid_charges + parseInt(id.split("_")[1]);
            console.log(id.split("_")[1])
            console.log("total amount",total_paid_charges)
            $("#amount").val(total_paid_charges)
            discount_val()

        }
        else{
            total_paid_charges = total_paid_charges - parseInt(id.split("_")[1]);
            console.log("total less amount",total_paid_charges)
            $("#amount").val(total_paid_charges)
            discount_val()
        }
        // console.log(id)
        // console.log($('#'+id).val())

    }
    // function paid_charges(value){
       
    // }

    function discount_val() {
        let amount = $("#amount").val();
        let discount = $("#discount").val()
        // $("#dis_val").val(discount)
        $("#gross").val(amount - discount)
    }

    function advance_fees() {
        var checkBox = document.getElementById("advance");
        let show = document.getElementById("adv_months")
        if (checkBox.checked == true) {
            show.style.display = "block";
        } else {
            show.style.display = "none"
        }
    }
</script>