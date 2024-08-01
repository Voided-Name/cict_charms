<?php

/**
 * 
 * @var strip $strip
 */
/**
 * 
 * @var res $func
 */
/**
 * @var array<array{
 *     id: int,
 *     name: string
 * }> $companies
 */

?>
<form method="POST" class="row">
  <div class="col-md-4 col-sm-12" id="">
    <label for="employerEmail" class="form-label">Email</label>
    <input type="email" class="form-control" id="employerEmail" required value="<?php echo $employerData[0]['email_address'] ?>" name="employerEmail">
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="employerUsername" class="form-label">Username</label>
    <input type="text" class="form-control" id="employerUsername" required value="<?php echo $employerData[0]['username'] ?>" name="employerUsername">
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="employerFName" class="form-label">First Name</label>
    <input type="text" class="form-control" id="" placeholder="Mark" required value="<?php echo $employerData[0]['first_name'] ?>" name="employerFName">
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="employerMName" class="form-label">Middle Name</label>
    <input type="text" class="form-control" id="employerMName" placeholder="Santos" value="<?php echo $employerData[0]['middle_name'] ?>" name="employerMName">
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="employerLName" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="employerLName" placeholder="Santos" required value="<?php echo $employerData[0]['last_name'] ?>" name="employerLName">
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="employerSuffix" class="form-label">Suffix</label>
    <input type="text" class="form-control" id="employerSuffix" placeholder="Santos" value="<?php echo $employerData[0]['suffix'] ?>" name="employerSuffix">
  </div>
  <div class="col-md-3 col-sm-12" id="">
    <label for="employerRegion" class="form-label">Region</label>
    <select class="form-select" id="employerRegion" name="employerRegion">
    </select>
  </div>
  <div class="col-md-3 col-sm-12" id="">
    <label for="employerProvince" class="form-label">Province</label>
    <select class="form-select" id="employerProvince" name="employerProvince">
    </select>
  </div>
  <div class="col-md-3 col-sm-12" id="">
    <label for="employerMunicipality" class="form-label">City</label>
    <select class="form-select" id="employerMunicipality" name="employerMunicipality">
    </select>
  </div>
  <div class="col-md-3 col-sm-12" id="">
    <label for="employerBarangay" class="form-label">Barangay</label>
    <select class="form-select" id="employerBarangay" name="employerBarangay">
    </select>
  </div>
  <div class="col-12">
    <label for="employerStAdd" class="form-label">Street Address</label>
    <input type="text" class="form-control" id="employerStAdd" name="employerStAdd" value="<?php echo $employerData[0]['street_add'] ?>">
  </div>
  <div class="col-md-6 col-sm-12" id="">
    <label for="employerCPNumber" class="form-label">Contact Number</label>
    <input type="text" class="form-control" id="employerCPNumber" placeholder="09XXXXXXXXX" maxlength="11" required value="<?php echo $employerData[0]['contact_number'] ?>" name="employerCPNumber">
  </div>
  <div class="col-md-6 col-sm-12" id="">
    <label for="employerBDate" class="form-label">Birth Date</label>
    <input id="employerBDate" class="form-control" type="date" required value="<?php echo $employerData[0]['birth_date'] ?>" name="employerBDate" />
  </div>
  <div class="col-md-6 col-sm-12" id="employerCompanyDiv">
    <label for="employerCompany" class="form-label">Company Name</label>
    <select class="form-select" id="employerCompany" name="employerCompany">
      <?php
      $tick = false;
      foreach ($companies as $company) {
      ?>
        <option value="<?php echo $company['id'] ?>" <?php
                                                      if ($employerData[0]['company_id'] == $company['id']) {
                                                        $tick = true;
                                                        echo "selected";
                                                      }
                                                      ?>><?php echo $company['name'] ?></option>
      <?php
      }
      if ($tick) {
      ?>
        <option value="0">Other</option>
      <?php
      } else {
      ?>
        <option value="0" selected>Other</option>
      <?php
      }
      ?>
    </select>
  </div>
  <div class="col-md-10 col-sm-12" style="display:none" id="companySTRdiv">
    <label for="employerCompanySTR" class="form-label">Add Company Name</label>
    <input id="employerCompanySTR" class="form-control" type="text" name="employerCompanySTR" value="<?php
                                                                                                      if ($employerData[0]['company_id'] == 0) {
                                                                                                        echo $employerData[0]['company_unvalidated'];
                                                                                                      }
                                                                                                      ?>" />
  </div>
  <div class="col-6" id="">
    <label for="employerPosition" class="form-label">Company Position</label>
    <input type="text" class="form-control" id="employerPosition" value="<?php echo $employerData[0]['company_position'] ?>" name="employerPosition">
  </div>
