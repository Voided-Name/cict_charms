<?php

/**
 * 
 * @var strip $strip
 */
/**
 * 
 * @var res $func
 */

//$alumniUnverified  = $func->selectjoin3_where2_orderby('users', 'userdetails', 'alumni_graduated_course', 'id', 'user_id', 'user_id', 'user_id', 'users', 'users', array('is_verified', '=', 0), 'AND', array('role', '=', 1), 'users', 'created_at', 'ASC');
$alumniUnverified  = $func->selectLeftjoin3_where2_orderby('users', 'userdetails', 'alumni_graduated_course', 'id', 'user_id', 'user_id', 'user_id', 'users', 'users', array('is_verified', '=', 0), 'AND', array('role', '=', 1), 'users', 'created_at', 'ASC');

$camp0 = '';
$course0 = '';
$major0 = '';


//print_r($alumniUnverified);


// TODO currently mock data, to update to match how the back end retrieves data

//$alumniUnverified = $func->selectjoin_where2_orderby('users','userdetails','id','user_id','users','users',array('is_verified','<>',1),'AND',array('role','=',1),'users','created_at','ASC');

//print_r($alumniUnverified);


// $alumnis = array(
//   array("andre@gmail.com", "09215218528", "Nash Andre",  "ME.", "Berber", "Cabu", "mm/dd/yyyy", "SUM126-455", "Database Systems Technology", "BSIT", "2019", "Sumacab", "2015"),
//   array("yno@gmail.com", "09215218528", "Yno", "ME.", "Reyes", "Cabu", "mm/dd/yyyy", "SUM126-356", "Web Systems Technology", "BSIT", "2020", "Sumacab", "2016"),
//   array("leon@gmail.com", "09215218528", "Leon", "ME.", "Laborina", "Cabu", "mm/dd/yyyy", "SUM126-2556", "Networking Systems Technology", "BSIT", "2021", "Sumacab", "2017"),
// );

// $abbrev = [
//   "BSIT" => "Bachelor of Sciene in Information and Techonoloy",
//   "BSArch" => "Bachelor of Science in Architecture",
//   "BSCrim" => "Bachelor of Science in Criminology",
//   "BEE" => "Bachelor of Elementary Education",
//   "BPE" => "Bachelor of Physical Education",
//   "BSEduc" => "Bachelor of Secondary Education",
//   "BTLE" => "Bachelor of Technology and Livelihood Education",
//   "BSIE" => "Bachelor of Science in Industrial Education",
//   "BSPE" => "Bachelor of Science in Physical Education",
//   "BSCE" => "Bachelor of Science in Civil Engineering",
//   "BSEE" => "Bachelor of Science in Electrical Engineering",
//   "BSME" => "Bachelor of Science in Mechanical Engineering",
//   "BSBA" => "Bachelor of Science in Business Administration",
//   "BSEntrep" => "Bachelor of Science in Entreprenuership",
//   "BSHM" => "Bachelor of Science in Hospitality and Management",
//   "BSHRM" => "Bachelor of Science in Hotel and Restaurant Management",
//   "BSTM" => "Bachelor of Science in Tourism Management",
//   "BPA" => "Bachelor of Public Administration",
// ]
?>

<div class="card-header d-flex justify-content-between">
  <div class="header-title">
    <h4 class="card-title">Validate Alumni Account</h4>
    <p><?php //var_dump($alumniUnverified)
        ?></p>
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
          <!-- <th>Campus</th> -->
          <th>Year Graduated</th>
          <th>Course</th>
          <th style="min-width: 100px">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        for ($x = 0; $x < count($alumniUnverified); $x++) {
          echo "<tr>";
          echo "  <td>" . $alumniUnverified[$x]['first_name'] . " " . $alumniUnverified[$x]['middle_name']  . " " . $alumniUnverified[$x]['last_name']  . "</td>";
          echo "  <td>" . $alumniUnverified[$x]['contact_number'] . "</td>";
          echo "  <td>" . $alumniUnverified[$x]['email_address'] . "</td>"; // TODO change to how the back end retrieves the data 


          $campus = $func->select_one('campuses', array('campusID', '=', $alumniUnverified[$x]['campus']));
          $camp0 = $campus[0]['campusName'];
          // echo "  <td>" . $camp0  . "</td>";
          if ($alumniUnverified[$x]['year_graduated']) {
            echo "  <td>" .  $alumniUnverified[$x]['year_graduated'] . "</td>";
          } else {
            echo "<td>Not Filled Yet</td>";
          }

          $course = $func->select_one('courses', array('courseID', '=', $alumniUnverified[$x]['course_id']));
          $course0 = $course[0]['courseAcronym'];

          $major = $func->select_one('coursesmajor', array('id', '=', $alumniUnverified[$x]['major_id']));
          $major0 = $major[0]['majorName'];

          if ($course0) {
            echo "  <td>" .   $course0   . "</td>"; // TODO change to how the back end retrieves the data
          } else {
            echo "<td>Not Filled Yet</td>"; // TODO change to how the back end retrieves the data
          }
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
                      <div class="col-md-8"><?php echo $alumniUnverified[$x]['first_name']; ?></div>
                      <div class="col-md-4"><strong>Middle Name:</strong></div>
                      <div class="col-md-8"><?php echo $alumniUnverified[$x]['middle_name'];  ?></div>
                      <div class="col-md-4"><strong>Last Name:</strong></div>
                      <div class="col-md-8"><?php echo $alumniUnverified[$x]['last_name']; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Contact:</strong></div>
                      <div class="col-md-8"><?php echo  $alumniUnverified[$x]['contact_number']; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Email:</strong></div>
                      <div class="col-md-8"><?php echo  $alumniUnverified[$x]['email_address']; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Address:</strong></div>
                      <div class="col-md-8"><?php echo $alumniUnverified[$x]['street_add'] . ", " . $alumniUnverified[$x]['barangay'] . ", " . $alumniUnverified[$x]['city'] . ", " . $alumniUnverified[$x]['province']; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Year Started:</strong></div>
                      <div class="col-md-8">
                        <?php
                        if ($alumniUnverified[$x]['year_started']) {
                          echo $alumniUnverified[$x]['year_started'];
                        } else {
                          echo "Not Filled Yet";
                        }
                        ?>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Year Graduated:</strong></div>
                      <div class="col-md-8">
                        <?php
                        if ($alumniUnverified[$x]['year_graduated']) {
                          echo $alumniUnverified[$x]['year_graduated'];
                        } else {
                          echo "Not Filled Yet";
                        }
                        ?>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Campus:</strong></div>
                      <div class="col-md-8">
                        <?php
                        if ($camp0) {
                          echo $camp0;
                        } else {
                          echo "Not Filled Yet";
                        }
                        ?>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Course:</strong></div>
                      <div class="col-md-8">
                        <?php
                        if ($course0) {
                          echo $course0;
                        } else {
                          echo "Not Filled Yet";
                        }
                        ?>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Major:</strong></div>
                      <div class="col-md-8">
                        <?php
                        if ($major0 || $course0) {
                          echo $major0;
                        } else {
                          echo "Not Filled Yet";
                        }
                        ?>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-4"><strong>Alumni Number:</strong></div>
                      <div class="col-md-8"><?php echo $alumniUnverified[$x]['alumniNum']; ?></div>
                    </div>

                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-success accButton" data-id="<?php echo $alumniUnverified[$x]['user_id']; ?>" id="acceptButton">Approve</button>
                  <button type="button" class="btn btn-danger delButton" data-bs-dismiss="modal" data-id="<?php echo $alumniUnverified[$x]['user_id']; ?>">Decline</button>
                </div>
              </div>
            </div>
          </div>


        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
