<?php
$faculty = array(
  array("Jodell R. Bulaclac", "09215218528", "bulaclac@gmail.com", "Cabanatuan City", "Sumacab", "Rank"),
  array("Nino Herera", "09070691580", "herera@gmail.com", "Cabanatuan City", "Sumacab", "Rank"),
  array("Gel Cunanan", "09215218666", "cunanan@gmail.com", "Cabanatuan City", "Sumacab", "Rank"),
);
?>

<div class="card-header d-flex justify-content-between">
  <div class="header-title">
    <h4 class="card-title">Faculty List</h4>
  </div>
</div>
<div class="card-body px-0">
  <div class="table-responsive">
    <table id="user-list-table" class="table table-striped" role="grid" data-bs-toggle="data-table">
      <thead>
        <tr class="light">
          <th>Faculty Name</th>
          <th>Contact</th>
          <th>Email</th>
          <th>Campus</th>
          <th>Academic Rank</th>
          <th style="min-width: 100px">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($x = 0; $x < sizeof($faculty); $x++) {
          echo "<tr>";
          echo "  <td>" . $faculty[$x][0] .  "</td>";
          echo "  <td>" . $faculty[$x][1] . "</td>";
          echo "  <td>" . $faculty[$x][2] . "</td>";
          echo "  <td>" . $faculty[$x][4] . "</td>";
          echo "  <td>" . $faculty[$x][5] . "</td>";
          echo "  <td>";
          echo "    <div class='flex align-items-center list-user-action'>";
          echo "      <button type='button' class='btn btn-success btn-sm' data-bs-toggle='modal' data-bs-target='#faculty$x'>View</button>";
          echo "    </div>";
          echo "  </td>";
          echo "</tr>";
        ?>
          <div class="modal fade" id="faculty<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $x; ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel<?php echo $x; ?>">Validate Faculty Account</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-size: 20px; color:black">
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Faculty Name:</strong></div>
                    <div class="col-md-8"><?php echo $faculty[$x][0]; ?></div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Address:</strong></div>
                    <div class="col-md-8"><?php echo $faculty[$x][3]; ?></div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Contact No. :</strong></div>
                    <div class="col-md-8"><?php echo $faculty[$x][1]; ?></div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Email:</strong></div>
                    <div class="col-md-8"><?php echo $faculty[$x][2]; ?></div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="deleteModal<?php echo $x ?>faculty" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Decline <?php echo $faculty[$x][2] ?>'s Registration</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="form-floating">
                    <h5 class="text-secondary m-2">Reason for Declining</h5>
                    <textarea style="height: 100px" class="form-control text-secondary" id="floatingTextarea"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button class="btn btn-primary" data-bs-target="#faculty<?php echo $x; ?>" data-bs-toggle="modal">Back to Details</button>
                  <button type="button" class="btn btn-danger delButton" id="" data-bs-dismiss="modal">Decline</button>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
