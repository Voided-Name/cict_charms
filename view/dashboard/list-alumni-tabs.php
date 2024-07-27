<?php
// TODO currently mock data, to update to match how the back end retrieves data
$alumnis = array(
  array("naeberber@gmail.com", "09123456789", "Nash Andre",  "E.", "Berber", "Cabu, Cabanatuan City", "06/25/2004", "123456789", "Database Systems Technology", "BSIT", "2019", "Sumacab", "2015"),
  //array("yno@gmail.com", "09215218528", "Yno", "ME.", "Reyes", "Cabu", "mm/dd/yyyy", "SUM126-356", "Web Systems Technology", "BSIT", "2020", "Sumacab", "2016"),
  //array("leon@gmail.com", "09215218528", "Leon", "ME.", "Laborina", "Cabu", "mm/dd/yyyy", "SUM126-2556", "Networking Systems Technology", "BSIT", "2021", "Sumacab", "2017"),
);

$abbrev = [
  "BSIT" => "Bachelor of Sciene in Information and Techonoloy",
  "BSArch" => "Bachelor of Science in Architecture",
  "BSCrim" => "Bachelor of Science in Criminology",
  "BEE" => "Bachelor of Elementary Education",
  "BPE" => "Bachelor of Physical Education",
  "BSEduc" => "Bachelor of Secondary Education",
  "BTLE" => "Bachelor of Technology and Livelihood Education",
  "BSIE" => "Bachelor of Science in Industrial Education",
  "BSPE" => "Bachelor of Science in Physical Education",
  "BSCE" => "Bachelor of Science in Civil Engineering",
  "BSEE" => "Bachelor of Science in Electrical Engineering",
  "BSME" => "Bachelor of Science in Mechanical Engineering",
  "BSBA" => "Bachelor of Science in Business Administration",
  "BSEntrep" => "Bachelor of Science in Entreprenuership",
  "BSHM" => "Bachelor of Science in Hospitality and Management",
  "BSHRM" => "Bachelor of Science in Hotel and Restaurant Management",
  "BSTM" => "Bachelor of Science in Tourism Management",
  "BPA" => "Bachelor of Public Administration",
]
?>

<div class="card-header d-flex justify-content-between">
  <div class="header-title">
    <h4 class="card-title">Alumni List</h4>
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
          <th>Campus</th>
          <th>Year Graduated</th>
          <th>Course</th>
          <th style="min-width: 100px">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        for ($x = 0; $x < sizeof($alumnis); $x++) {
          echo "<tr>";
          echo "  <td>" . $alumnis[$x][2] . " " . $alumnis[$x][4]  . "</td>";
          echo "  <td>" . $alumnis[$x][1] . "</td>";
          echo "  <td>" . $alumnis[$x][0] . "</td>";
          echo "  <td>" . "Sumacab" . "</td>"; // TODO change to how the back end retrieves the data 
          echo "  <td>" .  $alumnis[$x][10] . "</td>";
          echo "  <td>" .  "BSIT" . "</td>"; // TODO change to how the back end retrieves the data
          echo "  <td>";
          echo "    <div class='flex align-items-center list-user-action'>";
          echo "      <!-- Edit Button -->";
          echo "      <a class='btn btn-sm btn-icon' data-bs-toggle='modal' data-bs-target='#myModal$x' data-bs-placement='top' title='Add' href='#'>";
          echo "        <div class='bd-example'>";
          echo "          <button type='button' class='btn btn-success btn-sm'>View</button>";
          echo "        </div>";
          echo "      </a>";
          echo "    </div>";
          echo "  </td>";
          echo "</tr>";
        ?>
          <div class="modal fade" id="myModal<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
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
                      <div class="col-md-8"><?php echo $alumnis[$x][2]; ?></div>
                      <div class="col-md-4"><strong>Middle Name:</strong></div>
                      <div class="col-md-8"><?php echo $alumnis[$x][3]; ?></div>
                      <div class="col-md-4"><strong>Last Name:</strong></div>
                      <div class="col-md-8"><?php echo $alumnis[$x][4]; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Year Graduated:</strong></div>
                      <div class="col-md-8"><?php echo $alumnis[$x][10]; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Year Enrolled:</strong></div>
                      <div class="col-md-8"><?php echo $alumnis[$x][12]; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Campus:</strong></div>
                      <div class="col-md-8"><?php echo $alumnis[$x][11]; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Course:</strong></div>
                      <div class="col-md-8"><?php echo $abbrev[$alumnis[$x][9]]; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Major:</strong></div>
                      <div class="col-md-8"><?php echo $alumnis[$x][8]; ?></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-4"><strong>Alumni Number:</strong></div>
                      <div class="col-md-8"><?php echo $alumnis[$x][7]; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Email:</strong></div>
                      <div class="col-md-8"><?php echo $alumnis[$x][0]; ?></div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="deleteModal<?php echo $x ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Decline <?php echo $alumnis[$x][2] ?>'s Registration</h1>
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
                  <button class="btn btn-primary" data-bs-target="#myModal<?php echo $x; ?>" data-bs-toggle="modal">Back to Details</button>
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
