<?php
$rejectedApps = array(
  array("andre@gmail.com", "09215218528", "Nash Andre", "Berber", "Cabu", "mm/dd/yyyy", "SUM126-455", "Database Systems Technology", "Bachelor of Science in Information Technology", "2019", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nec tristique justo, vel fringilla tellus. Mauris vestibulum, ante eget pretium faucibus, quam est egestas urna, vel ultrices nulla est a libero."),
  array("yno@gmail.com", "09215218528", "Yno", "Reyes", "Cabu", "mm/dd/yyyy", "SUM126-356", "Web Systems Technology", "Bachelor of Science in Information Technology", "2020",  "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nec tristique justo, vel fringilla tellus. Mauris vestibulum, ante eget pretium faucibus, quam est egestas urna, vel ultrices nulla est a libero."),
  array("leon@gmail.com", "09215218528", "Leon", "Laborina", "Cabu", "mm/dd/yyyy", "SUM126-2556", "Networking Systems Technology,", "Bachelor of Science in Information Technology", "2021",  "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nec tristique justo, vel fringilla tellus. Mauris vestibulum, ante eget pretium faucibus, quam est egestas urna, vel ultrices nulla est a libero."),
);
?>

<div class="card-header d-flex justify-content-between">
  <div class="header-title">
    <h4 class="card-title">Validate Alumni Account</h4>
  </div>
</div>
<div class="card-body px-0">
  <div class="table-responsive">
    <table id="user-list-table" class="table table-striped" role="grid" data-bs-toggle="data-table">
      <thead>
        <tr class="light">
          <th>Name</th>
          <th>Contact</th>
          <th>Email</th>
          <th style="min-width: 100px">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        for ($x = 0; $x < sizeof($rejectedApps); $x++) {
          echo "<tr>";
          echo "  <td>" . $rejectedApps[$x][2] . " " . $rejectedApps[$x][3]  . "</td>";
          echo "  <td>" . $rejectedApps[$x][1] . "</td>";
          echo "  <td>" . $rejectedApps[$x][0] . "</td>";
          echo "  <td>";
          echo "    <div class='flex align-items-center list-user-action'>";
          echo "      <!-- Edit Button -->";
          echo "      <a class='btn btn-sm btn-icon' data-bs-toggle='modal' data-bs-target='#myModal" . $x . "rejected' data-bs-placement='top' title='Add' href='#'>";
          echo "        <div class='bd-example'>";
          echo "          <button type='button' class='btn btn-success btn-sm'>View</button>";
          echo "        </div>";
          echo "      </a>";
          echo "    </div>";
          echo "  </td>";
          echo "</tr>";
        ?>
          <div class="modal fade" id="myModal<?php echo $x; ?>rejected" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Validate Alumni Account</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-size: 20px; color:black">
                  <div class="alumni-details">
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>First Name:</strong></div>
                      <div class="col-md-8"><?php echo $rejectedApps[$x][2]; ?></div>
                      <div class="col-md-4"><strong>Middle Name:</strong></div>
                      <div class="col-md-8"><?php echo $rejectedApps[$x][3]; ?></div>
                      <div class="col-md-4"><strong>Last Name:</strong></div>
                      <div class="col-md-8"><?php echo $rejectedApps[$x][3]; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Year Graduated:</strong></div>
                      <div class="col-md-8"><?php echo $rejectedApps[$x][9]; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Course:</strong></div>
                      <div class="col-md-8"><?php echo $rejectedApps[$x][8]; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Major:</strong></div>
                      <div class="col-md-8"><?php echo $rejectedApps[$x][7]; ?></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-4"><strong>Alumni Number:</strong></div>
                      <div class="col-md-8"><?php echo $rejectedApps[$x][6]; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Email:</strong></div>
                      <div class="col-md-8"><?php echo $rejectedApps[$x][0]; ?></div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-success accButton" id="acceptButton">Approve</button>
                  <button type="button" class="btn btn-primary" data-bs-target="#rejected<?php echo $x ?>" data-bs-toggle="modal">Reason for Declining</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="rejected<?php echo $x ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Reason for Declining</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="form-floating">
                    <textarea style="height: 100px" class="form-control text-secondary" id="floatingTextarea" disabled><?php echo $rejectedApps[$x][10]; ?></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-primary" data-bs-target="#myModal<?php echo $x; ?>rejected" data-bs-toggle="modal">Back to Details</button>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
