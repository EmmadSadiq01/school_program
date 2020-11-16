<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="page_header">
                <h1 class="mt-4">FEES COLLECTION</h1>
                <a href="fees_recipt.php" class="btn btn-primary btn-sm pull-right">Generate Fees Vaucher <i class="glyphicon glyphicon-arrow-right"></i></a>

            </div>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Student</li>
            </ol>

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
                                        <td><button type="button" class="take btn btn-primary" data-toggle="modal" data-target="#myModal" id=<?php echo $row['id'] ?>>Take Fees</button></td>
                                    </tr>
                                <?php
                                } ?>




                            </tbody>
                        </table>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Take Fee</h4>
                                </div>
                                <div class="modal-body" id="formcontent">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
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
<script>
    take = document.getElementsByClassName("take");
    Array.from(take).forEach((element) => {
        element.addEventListener("click", (e) => {
            // console.log("edits ",);
            tr = e.target.parentNode.parentNode;
            title = tr.getElementsByTagName("td")[0].innerText;
            description = tr.getElementsByTagName("td")[1].innerText;
            console.log(title, description);
            noteTitleEdit.value = title;
            noteDescriptionEdit.value = description;
            $('#editmodal').modal('toggle');
            snoEdit.value = e.target.id;
            console.log(e.target.id);


        })

    })

    function GetFeeForm(sid) {

        $.ajax({
            type: 'post',
            url: 'getfeeform.php',
            data: {
                student: sid,
                req: '1'
            },
            success: function(data) {
                $('#formcontent').html(data);
                $("#myModal").modal({
                    backdrop: "static"
                });
            }
        });


    }
</script>