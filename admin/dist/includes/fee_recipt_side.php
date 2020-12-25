  <style>
    #adv_months,#adv_months_a {
      border: 1px solid black;
      padding: 10px 10px;
      border-radius: 20px;
      background-color: #343a40;
      color: #fff8ec;
    }

    #show {
      display: none;


    }
    #show_a{
      display: none;
    }
  </style>
  </style>
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
          <a href="fees_recipt.php?action=student" class="btn btn-outline-primary" data-toggle="modal" data-target="#studentModal">Student Vise</a>
          <a href="fees_recipt.php?action=class" class="btn btn-outline-success" data-toggle="modal" data-target="#classModal">Class Vise</a>

        </div>
        <div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Student Fees Vouchers
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>

                    <th>Roll No.</th>
                    <th style="width: 350px !important;">Student Name</th>
                    <th>Class</th>
                    <th>Fees</th>
                    <th>Invoice Title</th>
                    <th style="width: 285px !important;">Months</th>
                    <th>Amount</th>
                    <th>Discount</th>
                    <th>Gross</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Roll No.</th>
                    <th style="width: 350px !important;">Student Name</th>
                    <th>Class</th>
                    <th>Fees</th>
                    <th>Invoice Title</th>
                    <th style="width: 285px !important;">Months</th>
                    <th>Amount</th>
                    <th>Discount</th>
                    <th>Gross</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>

                  <?php
                  $sql = "SELECT * FROM `fees` INNER JOIN `students` ON `fees`.`std_roll`= `students`.`id`";
                  $result = mysqli_query($connection, $sql);
                  while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <td>100<?php echo $row['std_roll'] ?></td>

                      <td style="width: 350px;"><?php echo $row['name'] ?></td>
                      <td><?php echo $row['class'] ?></td>
                      <td> <?php echo $row['tutionFee'] ?></td>
                      <td style="width: 285px !important;"> <?php echo $row['month'] ?></td>
                      <td> <?php echo $row['invoice_type'] ?></td>
                      <td> <?php echo $row['amount'] ?></td>
                      <td> <?php echo $row['discount'] ?></td>
                      <td> <?php echo $row['gross'] ?></td>
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

      </div>

      <!-- Modal -->
      <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="studentModalLabel">Add Single Invoice</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="fees_recipt.php" method="post">
              <div class="modal-body">
                <div class="student_vise">
                  <input type="hidden" name="std_vise" id="std_vise" value="student wise">

                  <div class="form-group">
                    <label for="class">Class:</label>
                    <select class="form-control" id="class" name="class" onchange="student_class(this.value)">
                      <option value="">select...</option>
                      <?php
                      $sql = "SELECT * FROM `classes`";
                      $result = mysqli_query($connection, $sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['class_name'] . '">' . $row['class_name'] . '</option>';
                      }

                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="student">Student:</label>
                    <select class="form-control" id="students_list" name="std_id" onchange="tutionFees(this.value)">
                      <option value="">select..</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="invoice">Fees:</label>
                    <input type="text" class="form-control" placeholder="Fees" id="fees" value="0" name="fees" readonly>
                  </div>
                  <div class="form-group">
                    <label for="invoice">Invoice Title:</label>
                    <select name="invoice_title" id="invoice_title" class="form-control" name="invoice_title" onchange="invoice_type1(this.value)">
                      <option value="">Select...</option>
                      <option value="monthly">Monthly Fee</option>
                      <option value="lab">Lab Charges</option>
                      <option value="annual">Annual Charges</option>
                      <option value="advance">Advance</option>
                    </select>
                  </div>
                  <input type="hidden" name="invoice_type" id="invoice_type">
                  <div class="form-group" id="show">
                    <label for="invoice">Invoice Month:</label>
                    <div id="adv_months">
                      <div class="row">
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="january" class="advance_months" onchange="cal_advance()">
                          <label for="month">jan</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="february" class="advance_months" onchange="cal_advance()">
                          <label for="month">Feb</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="march" class="advance_months" onchange="cal_advance()">
                          <label for="month">Mar</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="April" class="advance_months" onchange="cal_advance()">
                          <label for="month">Apr</label>
                        </div>

                      </div>
                      <div class="row">
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="may" class="advance_months" onchange="cal_advance()">
                          <label for="month">May</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="june" class="advance_months" onchange="cal_advance()">
                          <label for="month">June</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="july" class="advance_months" onchange="cal_advance()">
                          <label for="month">July</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="august" class="advance_months" onchange="cal_advance()">
                          <label for="month">Aug</label>
                        </div>

                      </div>
                      <div class="row">
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="september" class="advance_months" onchange="cal_advance()">
                          <label for="month">Sept</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="october" class="advance_months" onchange="cal_advance()">
                          <label for="month">Oct</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="november" class="advance_months" onchange="cal_advance()">
                          <label for="month">Nov</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="december" class="advance_months" onchange="cal_advance()">
                          <label for="month">Dec</label>
                        </div>

                      </div>

                    </div>
                  </div>

                  <div class="form-group">
                    <label for="invoice">Amount:</label>
                    <input type="text" class="form-control" name="amount" placeholder="Amount" id="amount">
                  </div>
                  <div class="form-group">
                    <label for="invoice">Discount:</label>
                    <input type="number" class="form-control" placeholder="discount" name="discount" id="discount" value="0" onchange="discount_val()">
                  </div>
                  <div class="form-group">
                    <label for="gross">Gross:</label>
                    <input type="text" class="form-control" placeholder="Gross" name="gross" id="gross" value="0">
                  </div>

                </div>
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Submit">
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="classModal" tabindex="-1" aria-labelledby="classModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="classModalLabel">Class Vise</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="fees_recipt.php" method="post">
              <div class="modal-body">
                <div class="student_vise">
                  <input type="hidden" name="class_vise" id="class_vise" value="class wise">
                  <div class="form-group">

                    <label for="class">Class:</label>
                    <select class="form-control" id="class_a" name="class">
                      <option value="">select...</option>
                      <?php
                      $sql = "SELECT * FROM `classes`";
                      $result = mysqli_query($connection, $sql);
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['class_name'] . '">' . $row['class_name'] . '</option>';
                      }

                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="invoice">Invoice Title:</label>
                    <select name="invoice_title" id="invoice_title_a" class="form-control" name="invoice_title" onchange="invoice_type1_a(this.value)">
                      <option value="">Select...</option>
                      <option value="monthly">Monthly Fee</option>
                      <option value="lab">Lab Charges</option>
                      <option value="annual">Annual Charges</option>
                      <option value="advance">Advance</option>
                    </select>
                  </div>
                  <input type="hidden" name="invoice_type" id="invoice_type_a">
                  <div class="form-group" id="show_a">
                    <label for="invoice">Invoice Month:</label>
                    <div id="adv_months_a">
                      <div class="row">
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="january" class="advance_months">
                          <label for="month">jan</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="february" class="advance_months">
                          <label for="month">Feb</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="march" class="advance_months">
                          <label for="month">Mar</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="April" class="advance_months">
                          <label for="month">Apr</label>
                        </div>

                      </div>
                      <div class="row">
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="may" class="advance_months">
                          <label for="month">May</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="june" class="advance_months">
                          <label for="month">June</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="july" class="advance_months">
                          <label for="month">July</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="august" class="advance_months">
                          <label for="month">Aug</label>
                        </div>

                      </div>
                      <div class="row">
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="september" class="advance_months">
                          <label for="month">Sept</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="october" class="advance_months">
                          <label for="month">Oct</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="november" class="advance_months">
                          <label for="month">Nov</label>
                        </div>
                        <div class="month_name col-3">
                          <input type="checkbox" name="adv_month[]" value="december" class="advance_months">
                          <label for="month">Dec</label>
                        </div>

                      </div>

                    </div>
                  </div>

                </div>
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Submit">
              </div>
            </form>
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