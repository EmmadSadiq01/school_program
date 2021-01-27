<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="page_header">
                <h1 class="mt-4">Classes</h1>
                <?php
                echo (isset($_GET['action']) && @$_GET['action'] == "add" || @$_GET['action'] == "edit") ?
                    '<a href="class.php" class="btn btn-primary btn-sm pull-right">Back <i class="glyphicon glyphicon-arrow-right"></i></a>' :
                    '<a href="class.php?action=add" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add Class </a>';
                ?>
            </div>
            <ol class="breadcrumb mb-4">

                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <?php
                if (!isset($_GET['action'])) {
                ?>
                    <li class="breadcrumb-item active">Classes</li>
                <?php
                } else {

                    echo '<li class="breadcrumb-item"><a href="class.php">Classes</a></li>';
                    echo '<li class="breadcrumb-item active">Add Classes</li>';
                }
                ?>
            </ol>
            <div class="card mb-4">



                <div class="row">

                    <div class="col-sm-12 col-sm-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <?php echo ($action == "add") ? "Add Class" : "Edit Class"; ?>
                            </div>
                            <form action="class.php" method="post" id="signupForm1" class="form-horizontal" enctype="multipart/form-data">
                                <div class="panel-body">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Class Information:</legend>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Class Name* </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="cname" name="cname" />
                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                                <label class="col-sm-2 control-label" for="Old">Class Teacher* </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="tname" name="tname" />
                                                </div>
                                            </div> -->

                                    </fieldset>

                                    <!-- <fieldset class="scheduler-border">
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

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="Old">Annual Charges* </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="annual_fees" name="annual_charges" />
                                                </div>
                                            </div>



                                        </fieldset> -->
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


                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Classes Data
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <!-- <th>S.#</th> -->
                                    <th>Class</th>
                                    <th>Students</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <!-- <th>S.#</th> -->
                                    <th>total</th>
                                    <th id="total_std"></th>
                                    
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM classes";
                                $result = mysqli_query($connection, $sql);
                                $sno = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $sno = $sno + 1; ?>
                                    <tr>
                                        <!-- <td><?php echo $sno  ?></th> -->
                                        <td><?php echo $row['class_name']  ?></td>
                                        <td class="std_count"><?php
                                        $std_class = $row['id'] ;
                                        $std_sql = "SELECT * FROM students Where class='$std_class'";
                                        $std_result = mysqli_query($connection,$std_sql);
                                        $count_std = mysqli_num_rows($std_result);
                                        echo $count_std;
                                        ?></td>
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