<?php

/**
 * @var array<array{
 *     id: int,
 *     name: string
 * }> $companies
 */

?>
<form method="POST" class="row">
  <?php
  echo renderTextInput('employerEmail', 'employerEmail', 'Email', true, '', '', 4, 12);
  echo renderTextInput('employerUsername', 'employerUsername', 'Username', true, '', '', 4, 12);
  echo renderTextInput('employerFName', 'employerFName', 'First Name', true, '', '', 4, 12);
  echo renderTextInput('employerLName', 'employerLName', 'Last Name', true, '', '', 4, 12);
  echo renderTextInput('employerMName', 'employerMName', 'Middle Name', true, '', '', 4, 12);
  echo renderTextInput('employerSuffix', 'employerSuffix', 'Suffix', true, '', '', 4, 12);
  echo renderSelect('employerRegion', 'employerRegion', 'Region', true, 3, 12);
  echo renderSelect('employerProvince', 'employerProvince', 'Province', true, 3, 12);
  echo renderSelect('employerMunicipality', 'employerMunicipality', 'Municipality', true, 3, 12);
  echo renderSelect('employerBarangay', 'employerBarangay', 'Barangay', true, 3, 12);
  echo renderTextInput('employerStAdd', 'employerStAdd', 'Street Address', true, '', '', 12, 12);
  echo insertAttribute(renderTextInput('employerCPNumber', 'employerCPNumber', 'Contact Number', true, '', '', 6, 12), "input", "maxlength='11'");
  ?>
  <div class="col-md-3 col-sm-12" id="">
    <label for="employerSex" class="form-label">Sex</label>
    <select class="form-select" id="employerSex" name="employerSex" required>
      <option value="1">Male</option>
      <option value="2">Female</option>
    </select>
  </div>
  <?php
  echo renderDateInput('employerBDate', 'employerBDate', 'Birth Date', true, '', '', 6, 12);
  ?>
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
  <?php
  echo renderTextInput('employerPosition', 'employerPosition', 'Company Position', true, '', '', 6, 12);
  echo '<hr>';
  echo renderPasswordInput('employerPass', 'employerPass', 'Temporary Password', true, '', '', 6, 12);
  echo renderPasswordInput('employerConfPass', 'employerConfPass', 'Confirm Temporary Password', true, '', '', 6, 12);
  ?>
  <div class=" col-sm-12 container m-0 my-2">
    <button type="submit" class="btn btn-success" name="employerRegister" value="hello">Register Account</button>
  </div>
</form>
<?php
