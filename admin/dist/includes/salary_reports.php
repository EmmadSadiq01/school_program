<style>
    @import url('https://fonts.googleapis.com/css2?family=Cabin:wght@700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Cabin:wght@700&family=Texturina:ital,wght@1,100&display=swap');

    .add {
        margin: auto;
        width: 75%;

    }


    .add th {
        width: 6rem;
        padding: 7px 0px;
    }

    .add textarea {
        margin-top: 3px;
    }

    .add .btn.btn-primary {
        width: 100%;
        margin-top: 11px;
    }

    .panel-heading {
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-left-radius: 3px;
        color: #fff;
        background-color: #428bca;
        border-color: #428bca;
        border-top-right-radius: 3px;
    }

    .panel-body {
        padding: 15px;
    }

    .panel {
        margin-bottom: 20px;
        background-color: #fff;
        border: 1px solid transparent;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .panel-primary {
        border-color: #428bca;
        /* margin-left: 14%; */
        width: 100%;
        padding-bottom: 13px;
    }


    h3.heading {
        text-align: center;
        font-size: 38px;
        font-family: 'Cabin', sans-serif;
        text-decoration: underline;
        text-transform: uppercase;
    }

    .period {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .period .to {
        margin-left: 18px;
    }

    .period p {
        font-size: 24px;
        font-weight: 700;
    }

    .period .from p span {
        color: #198a19;
        font-family: 'Texturina', serif;
    }

    .period .to p span {
        color: #ff1b1b;
        font-family: 'Texturina', serif;
    }
</style>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <?php if (isset($_POST['from'])) {
            ?>
                <div class="toolbar hidden-print mt-4">
                    <div class="text-center">
                        <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
                    </div>
                    <hr>
                </div>

                <div class="ledger">
                    <h3 class="heading">Dar Ul Islah</h3>
                    <h3 class="heading">Fees Collection Report</h3>


                    <div class="period">
                        <div class="from">
                            <p>FROM : <span><?php echo $from ?></span></p>
                        </div>
                        <div class="to">
                            <p>TO : <span><?php echo $to ?></span></p>
                        </div>
                    </div>

                    <div class="container">
                        <table class="table table-bordered" id="item_table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Month</th>
                                    <th>Basic Salary</th>
                                    <th>Absent</th>
                                    <th>Deduction</th>
                                    <th>Allowance</th>
                                    <th>Total</th>
                                </tr>

                            </thead>
                            <?php
                            $sql = "SELECT * FROM `staff_salary` WHERE `date` BETWEEN '$from' AND  '$to' ORDER BY `date`";
                            $result = mysqli_query($connection,$sql);
                            // to increase speed of this this program add this details in to collectiona table
                            while($row = mysqli_fetch_assoc($result)){
                                $staff_id = $row['name'];
                                $sql_id= "SELECT * FROM `teacher` WHERE id='$staff_id'";
                                $result_id = mysqli_query($connection,$sql_id);
                                $name="";
                                $post = "";
                                while($row_id=mysqli_fetch_assoc($result_id)){
                                    $name = $row_id['name'];
                                    $post = $row_id['post'];
                                }
                            ?>

                            <tr>
                                <td><?php echo date('d-m-Y', strtotime($row['date']))  ?></td>
                                <td>100<?php echo $staff_id ?> </td>
                                <td><?php echo $name ?></td>
                                <td><?php echo $row['month'] ?></td>
                                <td><?php echo $row['basic_salary'] ?></td>
                                <td><?php echo $row['absent'] ?></td>
                                <td><?php echo $row['deduction'] ?></td>
                                <td><?php echo $row['allowance'] ?></td>
                                <td class="total"><?php echo $row['net salary'] ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                            <tfoot>
                                <tr>
                                    <th colspan="8" class="text-center">TOTAL</th>
                                    <th id="total_salary"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>

            <?php
            } else {
            ?>

                <div class="page_header">
                    <h1 class="mt-4">Salary Distibution Report</h1>

                </div>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Fees</li>
                </ol>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Fees Collection Report
                    </div>
                    <div class="container mt-1">
                        <form action="salary_reports.php" method="post">

                            <table class="add">
                                <tbody>
                                    <tr>
                                        <th> <label for="from">From</label></th>
                                        <td><input type="date" class="form-control" id="from" name="from" placeholder="dd/mm/yy" required></td>
                                    </tr>
                                    <tr>
                                        <th> <label for="to">To</label></th>
                                        <td><input type="date" class="form-control" id="to" name="to" value="<?php echo date('Y-m-d');?>" required></td>

                                    </tr>
                                    <tr>
                                        <td colspan="2"><input type="submit" value="Submit" class="btn btn-primary"></td>
                                    </tr>



                                </tbody>
                            </table>
                        </form>
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
