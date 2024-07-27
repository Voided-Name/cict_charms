<?php
$employer = array(
  array("L-Tech", "09215218528", "ltech@gmail.com", "Cabanatuan City", "Position"),
  array("Techno-G", "09070691580", "techno@gmail.com", "Cabanatuan City", "Position"),
  array("TeknoGuild", "09215218666", "guild@gmail.com", "Cabanatuan City", "Position"),
);
?>

<div class="card-header d-flex justify-content-between">
  <div class="header-title">
    <h4 class="card-title">Employer List</h4>
  </div>
</div>
<div class="card-body px-0">
  <div class="table-responsive">
    <table id="user-list-table" class="table table-striped" role="grid" data-bs-toggle="data-table">
      <thead>
        <tr class="light">
          <th>Company Name</th>
          <th>Contact</th>
          <th>Email</th>
          <th>Position</th>
          <th style="min-width: 100px">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($x = 0; $x < sizeof($employer); $x++) {
          echo "<tr>";
          echo "  <td>" . $employer[$x][0] .  "</td>";
          echo "  <td>" . $employer[$x][1] . "</td>";
          echo "  <td>" . $employer[$x][2] . "</td>";
          echo "  <td>" . $employer[$x][4] . "</td>";
          echo "  <td>";
          echo "    <div class='flex align-items-center list-user-action'>";
          echo "      <button type='button' class='btn btn-success btn-sm' data-bs-toggle='modal' data-bs-target='#employer$x'>View</button>";
          echo "    </div>";
          echo "  </td>";
          echo "</tr>";
        ?>
          <!-- Modal -->
          <div class="modal fade" id="employer<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $x; ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel<?php echo $x; ?>">Employer List</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-size: 20px; color:black">
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Company Name:</strong></div>
                    <div class="col-md-8"><?php echo $employer[$x][0]; ?></div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Address:</strong></div>
                    <div class="col-md-8"><?php echo $employer[$x][3]; ?></div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Contact No. :</strong></div>
                    <div class="col-md-8"><?php echo $employer[$x][1]; ?></div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Email:</strong></div>
                    <div class="col-md-8"><?php echo $employer[$x][2]; ?></div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Position:</strong></div>
                    <div class="col-md-8"><?php echo $employer[$x][4]; ?></div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="deleteModal<?php echo $x ?>employer" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Decline <?php echo $employer[$x][2] ?>'s Registration</h1>
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
                  <button class="btn btn-primary" data-bs-target="#employer<?php echo $x; ?>" data-bs-toggle="modal">Back to Details</button>
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
