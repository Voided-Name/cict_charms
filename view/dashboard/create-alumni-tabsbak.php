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
 *     campusID: int,
 *     campusName: string
 * }> $campuses
 */
/**
 * @var array<array{
 *     courseID: int,
 *     courseName: string
 * }> $courses
 */

?>
<form method="POST" class="row">
  <div class="col-md-4 col-sm-12" id="">
    <label for="alumniEmail" class="form-label">Email</label>
    <input type="email" class="form-control" id="alumniEmail" name="alumniEmail" value="" required>
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="alumniUsername" class="form-label">Username</label>
    <input type="text" class="form-control" id="alumniUsername" name="alumniUsername" value="" required>
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="alumniFName" class="form-label">First Name</label>
    <input type="text" class="form-control" id="alumniFName" name="alumniFName" value="" placeholder="" required>
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="alumniMName" class="form-label">Middle Name</label>
    <input type="text" class="form-control" id="alumniMName" name="alumniMName" value="">
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="alumniLName" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="alumniLName" name="alumniLName" value="" placeholder="" required>
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="alumniSuffix" class="form-label">Suffix</label>
    <input type="text" class="form-control" id="alumniSuffix" name="alumniSuffix" value="" placeholder="">
  </div>
  <div class="col-md-3 col-sm-12" id="">
    <label for="alumniRegion" class="form-label">Region</label>
    <select class="form-select" id="alumniRegion" name="alumniRegion">
    </select>
  </div>
  <div class="col-md-3 col-sm-12" id="">
    <label for="alumniProvince" class="form-label">Province</label>
    <select class="form-select" id="alumniProvince" name="alumniProvince">
    </select>
  </div>
  <div class="col-md-3 col-sm-12" id="">
    <label for="alumniMunicipality" class="form-label">City</label>
    <select class="form-select" id="alumniMunicipality" name="alumniMunicipality">
    </select>
  </div>
  <div class="col-md-3 col-sm-12" id="">
    <label for="alumniBarangay" class="form-label">Barangay</label>
    <select class="form-select" id="alumniBarangay" name="alumniBarangay">
    </select>
  </div>
  <div class="col-12">
    <label for="alumniStAdd" class="form-label">Street Address</label>
    <input type="text" class="form-control" id="alumniStAdd" name="alumniStAdd" value="">
  </div>
  <div class="col-md-6 col-sm-12" id="">
    <label for="alumniCPNumber" class="form-label">Contact Number</label>
    <input type="text" class="form-control" id="alumniCPNumber" name="alumniCPNumber" placeholder="" value="" maxlength="11" required>
  </div>
  <div class="col-md-6 col-sm-12" id="">
    <label for="alumniBDate" class="form-label">Birth Date</label>
    <input class="form-control" type="date" id="alumniBDate" name="alumniBDate" value="" required />
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="alumniStudId" class="form-label">Alumni ID</label>
    <input type="text" class="form-control" id="alumniStudId" name="alumniStudId" value="" required>
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="alumniCourse" class="form-label">Course</label>
    <select class="form-select" id="alumniCourse" name="alumniCourse">
      <?php
      foreach ($courses as $course) {
      ?>
        <option <?php if ($course['courseID'] == $alumniData[0]['course_id']) {
                  echo "selected ";
                } ?>value="<?php echo $course['courseID'] ?>"><?php echo $course['courseName'] ?></option>
      <?php
      }
      ?>
    </select>
  </div>
  <div class="col-md-4 col-sm-12" id="">
    <label for="alumniMajor" class="form-label">Major</label>
    <select class="form-select" id="alumniMajor" name="alumniMajor">
      <option value="N/A">N/A</option>
    </select>
  </div>
  <div class="col-md-4 col-sm-12">
    <label for="alumniCampus" class="form-label">Campus</label>
    <select class="form-select" id="alumniCampus" name="alumniCampus">
      <?php
      foreach ($campuses as $campus) {
      ?>

        <option <?php
                if ($campus['campusID'] == $alumniData[0]['campus']) {
                  echo "selected ";
                }
                ?> value="<?php echo $campus['campusID'] ?>"><?php echo $campus['campusName'] ?></option>
      <?php
      }
      ?>
    </select>
  </div>

  <div class="col-md-4 col-sm-12">
    <label for="alumniGraduated" class="form-label">Year Graduated</label>
    <input type="number" class="form-control" id="alumniGraduated" name="alumniGraduated" aria-describedby="" required>
  </div>
  <div class="col-md-4 col-sm-12">
    <label for="alumniEnrolled" class="form-label">Year Enrolled (Initially)</label>
    <input type="number" class="form-control" id="alumniEnrolled" name="alumniEnrolled" aria-describedby="" required>
  </div>
  <hr>
  <div class="col-md-6 col-sm-12">
    <label for="alumniPass" class="form-label">Temporary Password</label>
    <input type="password" class="form-control" id="alumniPass" name="alumniPass" required>
  </div>
  <div class="col-md-6 col-sm-12">
    <label for="alumniConfPass" class="form-label">Confirm Temporary Password</label>
    <input type="password" class="form-control" id="alumniConfPass" name="alumniConfPass" required>
  </div>
  <hr>
  <div class="col-md-4 col-sm-12 container m-0 my-2">
    <button type="submit" class="btn btn-success" name="alumniRegister" value="hello">Register Account</button>
  </div>
</form>
