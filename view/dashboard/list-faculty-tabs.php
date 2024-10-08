<?php

/**
 * 
 * @var strip $strip
 */
/**
 * 
 * @var res $func
 */

$facultyVerified = $func->selectjoin3_where2_orderby('users', 'userdetails', 'FACULTY', 'id', 'user_id', 'user_id', 'user_id', 'users', 'users', array('is_verified', '=', 1), 'AND', array('role', '=', 3), 'users', 'created_at', 'ASC');

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
        <?php
        $x = 0;
        foreach ($facultyVerified as $facultyInstance) {
          $first_name = $facultyInstance['first_name'];
          $middle_name = $facultyInstance['middle_name'];
          $last_name = $facultyInstance['last_name'];
          $name = implode(" ", array($first_name, $middle_name, $last_name));
          $contact = $facultyInstance['contact_number'];
          $email = $facultyInstance['email_address'];
          $camp = $func->select_one('campuses', array('campusID', '=', $facultyInstance['campus_id']));
          $camp0 = $camp[0]['campusName'];
          $acadRank = $func->select_one('faculty_rankings', array('id', '=', $facultyInstance['acadrank_id']));
          $acadRank0 = $acadRank[0]['description'];
          $bDate = $facultyInstance['birth_date'];
          $address = implode(", ", array($facultyInstance['province'], $facultyInstance['city'], $facultyInstance['barangay'], $facultyInstance['street_add']));

          echo "<tr>";
          echo "  <td>" . $name . "</td>";
          echo "  <td>" . $contact . "</td>";
          echo "  <td>" . $email . "</td>";
          echo "  <td>" . $camp0 . "</td>";
          echo "  <td>" . $acadRank0 . "</td>";
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
                    <div class="col-md-8"><?php echo $name; ?></div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Address:</strong></div>
                    <div class="col-md-8"><?php echo $address; ?></div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Birth Date:</strong></div>
                    <div class="col-md-8"><?php echo $bDate; ?></div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Contact No. :</strong></div>
                    <div class="col-md-8"><?php echo $contact; ?></div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Email:</strong></div>
                    <div class="col-md-8"><?php echo $email; ?></div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Campus:</strong></div>
                    <div class="col-md-8"><?php echo $camp0; ?></div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Academic Rank:</strong></div>
                    <div class="col-md-8"><?php echo $acadRank0; ?></div>
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
        <?php $x++;
        } ?>
      </tbody>
    </table>
  </div>
</div>
