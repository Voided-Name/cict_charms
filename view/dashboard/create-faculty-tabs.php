<form method="POST" class="row">
  <?php
  echo renderTextInput('facultyEmail', 'facultyEmail', 'Email', true, '', '', 4, 12);
  echo renderTextInput('facultyUsername', 'facultyUsername', 'Username', true, '', '', 4, 12);
  echo renderTextInput('facultyFName', 'facultyFName', 'First Name', true, '', '', 4, 12);
  echo renderTextInput('facultyLName', 'facultyLName', 'Last Name', true, '', '', 4, 12);
  echo renderTextInput('facultyMName', 'facultyMName', 'Middle Name', true, '', '', 4, 12);
  echo renderTextInput('facultySuffix', 'facultySuffix', 'Suffix', true, '', '', 4, 12);
  echo renderSelect('facultyRegion', 'facultyRegion', 'Region', true, 3, 12);
  echo renderSelect('facultyProvince', 'facultyProvince', 'Province', true, 3, 12);
  echo renderSelect('facultyMunicipality', 'facultyMunicipality', 'Municipality', true, 3, 12);
  echo renderSelect('facultyBarangay', 'facultyBarangay', 'Barangay', true, 3, 12);
  echo renderTextInput('facultyStAdd', 'facultyStAdd', 'Street Address', true, '', '', 12, 12);
  echo insertAttribute(renderTextInput('facultyCPNumber', 'facultyCPNumber', 'Contact Number', true, '', '', 6, 12), "input", "maxlength='11'");
  echo renderDateInput('facultyBDate', 'facultyBDate', 'Birth Date', true, '', '', 6, 12);
  echo renderSelectWithOptions('facultyCampus', 'facultyCampus', 'Campus', array_map(fn($campus) => ['value' => $campus['campusID'], 'name' => $campus['campusName']], $campuses), $facultyData[0]['campus']);
  echo renderTextInput('facultyID', 'facultyID', 'Faculty ID', true, '', '', 4, 12);
  echo renderSelectWithOptions('facultyRank', 'facultyRank', 'Academic Rank', array_map(fn($acadRank) => ['value' => $acadRank['id'], 'name' => $acadRank['description']], $acadRanks), $facultyData[0]['acadrank_id']);
  echo renderPasswordInput('facultyPass', 'facultyPass', 'Temporary Password', true, '', '', 6, 12);
  echo renderPasswordInput('facultyConfPass', 'facultyConfPass', 'Confirm Temporary Password', true, '', '', 6, 12);
  ?>
  <div class=" col-sm-12 container m-0 my-2">
    <button type="submit" class="btn btn-success" name="register" value="faculty">Register Account</button>
  </div>
</form>
