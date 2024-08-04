<?php
require_once './renderer.php';

/**
 * @var array<array{
 * id: int,
 * name: string
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
  echo renderTextInput('employerSuffix', 'employerSuffix', 'Suffix', false, '', '', 4, 12);
  echo renderSelect('employerRegion', 'employerRegion', 'Region', true, 3, 12);
  echo renderSelect('employerProvince', 'employerProvince', 'Province', true, 3, 12);
  echo renderSelect('employerMunicipality', 'employerMunicipality', 'Municipality', true, 3, 12);
  echo renderSelect('employerBarangay', 'employerBarangay', 'Barangay', true, 3, 12);
  echo renderTextInput('employerStAdd', 'employerStAdd', 'Street Address', true, '', '', 12, 12);
  echo insertAttribute(renderTextInput('employerCPNumber', 'employerCPNumber', 'Contact Number', true, '', '', 6, 12), "input", "maxlength='11'");
  echo renderDateInput('employerBDate', 'employerBDate', 'Birth Date', true, '', '', 6, 12);
  ?>
  <div class="col-md-6 col-sm-12" id="">
    <label for="employerSex" class="form-label">Sex</label>
    <select class="form-select" id="employerSex" name="employerSex" required>
      <option value="1">Male</option>
      <option value="2">Female</option>
    </select>
  </div>
  <div class="col-md-6 col-sm-12" id="employerCompanyDiv">
    <label for="employerCompany" class="form-label">Company Name</label>
    <select class="form-select" id="employerCompany" name="employerCompany">
      <?php
      foreach ($companies as $company) { ?>
        <option value="<?php echo $company['id'] ?>"><?php echo $company['name'] ?></option>
      <?php
      }
      ?>
      <option value="0">Other</option>
    </select>
  </div>
  <div class="col-md-4 col-sm-12" style="display:none" id="companySTRdiv">
    <label for="employerCompanySTR" class="form-label">Add Company Name</label>
    <input id="employerCompanySTR" class="form-control" type="text" name="employerCompanySTR" value="" />
  </div>
  <?php
  echo renderTextInput('employerID', 'employerID', 'Employer ID', true, '', '', 6, 12);
  echo renderTextInput('employerPosition', 'employerPosition', 'Company Position', true, '', '', 6, 12);
  echo '<hr>';
  echo renderPasswordInput('employerPass', 'employerPass', 'Temporary Password', true, '', '', 6, 12);
  echo renderPasswordInput('employerConfPass', 'employerConfPass', 'Confirm Temporary Password', true, '', '', 6, 12);
  ?>
  <div class=" col-sm-12 container m-0 my-2">
    <button type="submit" class="btn btn-success" name="register" value="employer">Register Account</button>
  </div>
</form>
