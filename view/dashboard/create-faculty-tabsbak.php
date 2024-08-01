<form method="POST" class="row">
  <div class="col-md-4 col-sm-12" id="">
    <label for="facultyEmail" class="form-label">Email</label>
    <input type="email" class="form-control" id="facultyEmail" name="facultyEmail" value="<?php echo $facultyData[0]['email_address'] ?>" required>
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="facultyUsername" class="form-label">Username</label>
    <input type="text" class="form-control" id="facultyUsername" name="facultyUsername" value="<?php echo $facultyData[0]['username'] ?>" required>
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="facultyFName" class="form-label">First Name</label>
    <input type="text" class="form-control" id="facultyFName" name="facultyFName" value="<?php echo $facultyData[0]['first_name'] ?>" placeholder="Mark" required>
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="facultyMName" class="form-label">Middle Name</label>
    <input type="text" class="form-control" id="facultyMName" name="facultyMName" value="<?php echo $facultyData[0]['middle_name'] ?>" placeholder="Santos">
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="facultyLName" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="facultyLName" name="facultyLName" value="<?php echo $facultyData[0]['last_name'] ?>" placeholder="Santos" required>
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="facultySuffix" class="form-label">Suffix</label>
    <input type="text" class="form-control" id="facultySuffix" name="facultySuffix" value="<?php echo $facultyData[0]['suffix'] ?>" placeholder="">
  </div>
  <div class="col-md-3 col-sm-12" id="">
    <label for="facultyRegion" class="form-label">Region</label>
    <select class="form-select" id="facultyRegion" name="facultyRegion">
    </select>
  </div>
  <div class="col-md-3 col-sm-12" id="">
    <label for="facultyProvince" class="form-label">Province</label>
    <select class="form-select" id="facultyProvince" name="facultyProvince">
    </select>
  </div>
  <div class="col-md-3 col-sm-12" id="">
    <label for="facultyMunicipality" class="form-label">City</label>
    <select class="form-select" id="facultyMunicipality" name="facultyMunicipality">
    </select>
  </div>
  <div class="col-md-3 col-sm-12" id="">
    <label for="facultyBarangay" class="form-label">Barangay</label>
    <select class="form-select" id="facultyBarangay" name="facultyBarangay">
    </select>
  </div>
  <div class="col-12">
    <label for="facultyStAdd" class="form-label">Street Address</label>
    <input type="text" class="form-control" id="facultyStAdd" name="facultyStAdd" value="<?php echo $facultyData[0]['street_add'] ?>">
  </div>
  <div class="col-md-6 col-sm-12" id="">
    <label for="facultyCPNumber" class="form-label">Contact Number</label>
    <input type="text" class="form-control" id="facultyCPNumber" name="facultyCPNumber" placeholder="" value="<?php echo $facultyData[0]['contact_number'] ?>" maxlength="11" required>
  </div>
  <div class="col-md-6 col-sm-12" id="">
    <label for="facultyBDate" class="form-label">Birth Date</label>
    <input class="form-control" type="date" id="facultyBDate" name="facultyBDate" value="<?php echo $facultyData[0]['birth_date'] ?>" required />
  </div>
  <div class="col-md-4 col-sm-12">
    <label for="facultyCampus" class="form-label">Campus</label>
    <select class="form-select" id="facultyCampus" name="facultyCampus">
      <?php
      foreach ($campuses as $campus) {
      ?>

        <option <?php
                if ($campus['campusID'] == $facultyData[0]['campus']) {
                  echo "selected ";
                }
                ?> value="<?php echo $campus['campusID'] ?>"><?php echo $campus['campusName'] ?></option>
      <?php
      }
      ?>
    </select>
  </div>
  <div class="col-4" id="">
    <label for="facultyID" class="form-label">Faculty ID</label>
    <input type="text" class="form-control" id="facultyID" name="facultyID" value="<?php echo $facultyData['employee_num'] ?>">
  </div>
  <div class="col-4" id="">
    <label for="facultyRank" class="form-label">Academic Rank</label>
    <select type="text" class="form-control" id="facultyRank" name="facultyRank">
      <?php
      foreach ($acadRanks as $acadRank) {
      ?>

        <option <?php
                if ($acadRank['id'] == $facultyData[0]['acadrank_id']) {
                  echo "selected ";
                }
                ?> value="<?php echo $acadRank['id'] ?>"><?php echo $acadRank['description'] ?></option>
      <?php
      }
      ?>
    </select>
  </div>
</form>
>>
