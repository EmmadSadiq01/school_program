  <style>
    #adv_months {
      border: 1px solid black;
      padding: 10px 10px;
      border-radius: 20px;
      background-color: #343a40;
      color: #fff8ec;
    }

    #show {
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
          <?php

          if (isset($_GET['action']) && @$_GET['action'] == "student") {
          ?>

          <?php
          }
          ?>
          <?php
          if (isset($_GET['action']) && @$_GET['action'] == "class") {
          ?>

          <?php
          }
          ?>
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
            <div class="modal-body">
              <div class="student_vise">
                <form action="php/vaucher.php" method="post">
                  <div class="form-group">
                    <label for="class">Class:</label>
                    <select class="form-control" id="class" name="class" id="class" onchange="student_class(this.value)">
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
                    <select class="form-control" id="students_list" name="class" onchange="tutionFees(this.value)">
                      <option value="">select..</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="invoice">Fees:</label>
                    <input type="text" class="form-control" placeholder="Fees" id="fees" value="0" readonly>
                  </div>
                  <div class="form-group">
                    <label for="invoice">Invoice Title:</label>
                    <select name="invoice_title" id="invoice_title" class="form-control" onchange="invoice_type1(this.value)">
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
                    <input type="text" class="form-control" placeholder="Amount" id="amount">
                  </div>
                  <div class="form-group">
                    <label for="invoice">Discount:</label>
                    <input type="number" class="form-control" placeholder="discount" id="discount" value="0" onchange="discount_val()">
                  </div>
                  <div class="form-group">
                    <label for="gross">Gross:</label>
                    <input type="text" class="form-control" placeholder="Gross" id="gross" value="0">
                  </div>
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Print Invoice</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="classModal" tabindex="-1" aria-labelledby="classModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="classModalLabel">Class Vise</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="student_vise">
                <form action="php/classvise.php" method="post">

                  <input type="text" name="class" id="std_id" placeholder="Enter class name">
                  <input type="submit" value="Generate" class="btn btn-primary">
                </form>
              </div>
            </div>
            <div class="modal-footer">
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