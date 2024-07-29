<?php
$employer = array(
  array("L-Tech", "09215218528", "ltech@gmail.com", "Cabanatuan City", "Position"),
  array("Techno-G", "09070691580", "techno@gmail.com", "Cabanatuan City", "Position"),
  array("TeknoGuild", "09215218666", "guild@gmail.com", "Cabanatuan City", "Position"),
);

/**
 * 
 * @var strip $strip
 */
/**
 * 
 * @var res $func
 */

$employerVerified  = $func->selectjoin3_where2_orderby('users', 'userdetails', 'employer_users', 'id', 'user_id', 'user_id', 'user_id', 'users', 'users', array('is_verified', '=', 1), 'AND', array('role', '=', 2), 'users', 'created_at', 'ASC');

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
        <?php
        $x = 0;
        foreach ($employerVerified as $employerInstance) {
          $compName = $func->select_one('companies', array('id', '=', $employerInstance['company_id']));
          $compName0 = $compName[0]['name'];
          $employerContact = $employerInstance['contact_number'];
          $employerEmail = $employerInstance['email_address'];

          if ($compName[0]['contact_number']) {
            $contact = $compName[0]['contact_number'];
          } else {
            $contact = $employerContact;
          }
          if ($compName[0]['email_add']) {
            $email = $compName[0]['email_add'];
          } else {
            $email = $employerEmail;
          }

          $position = $employerInstance['company_position'];
          $first_name = $employerInstance['first_name'];
          $middle_name = $employerInstance['middle_name'];
          $last_name = $employerInstance['last_name'];
          $name = implode(" ", array($first_name, $middle_name, $last_name));
          $bDate = $employerInstance['birth_date'];
          $province = $employerInstance['province'];
          $city = $employerInstance['city'];
          $barangay = $employerInstance['barangay'];
          $streetAdd = $employerInstance['street_add'];
          $address = implode(", ", array($province, $city, $barangay, $streetAdd));
          echo "<tr>";
          echo "  <td>" . $compName0 .  "</td>";
          echo "  <td>" . $contact . "</td>";
          echo "  <td>" . $email . "</td>";
          echo "  <td>" . $position . "</td>";
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
                    <div class="col-md-8"><?php echo $compName0; ?></div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Employer Name:</strong></div>
                    <div class="col-md-8"><?php echo $name; ?></div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Address:</strong></div>
                    <div class="col-md-8"><?php echo $address; ?></div>
                  </div>
                  <?php
                  if ($compName[0]['contact_number']) {
                  ?>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Company Contact No. :</strong></div>
                      <div class="col-md-8"><?php echo $contact; ?></div>
                    </div>
                  <?php
                  }
                  if ($compName[0]['email_add']) {
                  ?>
                    <div class="row mb-2">
                      <div class="col-md-4"><strong>Company Email:</strong></div>
                      <div class="col-md-8"><?php echo $email; ?></div>
                    </div>
                  <?php
                  }                   ?>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Contact No. :</strong></div>
                    <div class="col-md-8"><?php echo $employerContact; ?></div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Email:</strong></div>
                    <div class="col-md-8"><?php echo $employerEmail; ?></div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-4"><strong>Position:</strong></div>
                    <div class="col-md-8"><?php echo $position; ?></div>
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
        <?php
          $x++;
        } ?>
      </tbody>
    </table>
  </div>
</div>
