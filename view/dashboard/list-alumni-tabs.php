<?php
// TODO currently mock data, to update to match how the back end retrieves data

/**
 * 
 * @var strip $strip
 */
/**
 * 
 * @var res $func
 */

$alumniVerified = $func->selectjoin3_where2_orderby('users', 'userdetails', 'alumni_graduated_course', 'id', 'user_id', 'user_id', 'user_id', 'users', 'users', array('is_verified', '=', 1), 'AND', array('role', '=', 1), 'users', 'created_at', 'ASC');

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
];

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
        foreach ($alumniVerified as $alumniInstance) {
          $first_name = $alumniInstance['first_name'];
          $middle_name = $alumniInstance['middle_name'];
          $last_name = $alumniInstance['last_name'];
          $name = implode(" ", array($first_name, $middle_name, $last_name));
          $contact = $alumniInstance['contact_number'];
          $email_address = $alumniInstance['email_address'];
          $campus = $func->select_one('campuses', array('campusID', '=', $alumniInstance['campus']));
          $camp0 = $campus[0]['campusName'];
          $yearGrad = $alumniInstance['year_graduated'];
          $yearEnrolled = $alumniInstance['year_started'];
          $course = $func->select_one('courses', array('courseID', '=', $alumniInstance['course_id']));
          $course0 = $course[0]['courseName'];
          $course1 = $course[0]['courseAcronym'];
          $major = $func->select_one('coursesmajor', array('id', '=', $alumniInstance['major_id']));
          $major0 = $major[0]['majorName'];
          $alumniNum = $alumniInstance['alumniNum'];
          echo "<tr>";
          echo "  <td>" . $name  . "</td>";
          echo "  <td>" . $contact . "</td>";
          echo "  <td>" . $email_address . "</td>";
          echo "  <td>" . $camp0 . "</td>"; // TODO change to how the back end retrieves the data 
          echo "  <td>" .  $yearGrad . "</td>";
          echo "  <td>" .  $course1 . "</td>"; // TODO change to how the back end retrieves the data
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
                      <div class="col-md-8"><?php echo $first_name; ?></div>
                      <div class="col-md-4"><strong>Middle Name:</strong></div>
                      <div class="col-md-8"><?php echo $middle_name; ?></div>
                      <div class="col-md-4"><strong>Last Name:</strong></div>
                      <div class="col-md-8"><?php echo $last_name; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Year Graduated:</strong></div>
                      <div class="col-md-8"><?php echo $yearGrad; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Year Enrolled:</strong></div>
                      <div class="col-md-8"><?php echo $yearEnrolled; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Campus:</strong></div>
                      <div class="col-md-8"><?php echo $camp0; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Course:</strong></div>
                      <div class="col-md-8"><?php echo $course0; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Major:</strong></div>
                      <div class="col-md-8"><?php echo $major0; ?></div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-4"><strong>Alumni Number:</strong></div>
                      <div class="col-md-8"><?php echo $alumniNum; ?></div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Email:</strong></div>
                      <div class="col-md-8"><?php echo $email_address; ?></div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
