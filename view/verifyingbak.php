<?php
session_start();
include 'src/init.php';

function cleanAlphaNumString($string)
{
  return preg_replace("/[^a-zA-Z0-9]/", "", $string);
}

if (isset($_POST['saveBtn'])) {
  if ($_SESSION['role'] == 1) {
    $email = $strip->strip($_POST['alumniEmail']);
    $username = $strip->strip($_POST['alumniUsername']);
    $firstName = $strip->strip($_POST['alumniFName']);
    $middleName = $strip->strip($_POST['alumniMName']);
    $lastName = $strip->strip($_POST['alumniLName']);
    $suffix = $strip->strip($_POST['alumniSuffix']);
    $region = $strip->strip($_POST['alumniRegion']);
    $province = $strip->strip($_POST['alumniProvince']);
    $municipality = $strip->strip($_POST['alumniMunicipality']);
    $barangay = $strip->strip($_POST['alumniBarangay']);
    $contactNumber = $strip->strip($_POST['alumniCPNumber']);
    $birthDate = $strip->strip($_POST['alumniBDate']);
    $studentId = $strip->strip($_POST['alumniStudId']);
    $course = $strip->strip($_POST['alumniCourse']);
    $major = $strip->strip($_POST['alumniMajor']);
    $campus = $strip->strip($_POST['alumniCampus']);
    $yearGraduated = $strip->strip($_POST['alumniGraduated']);
    $yearEnrolled = $strip->strip($_POST['alumniEnrolled']);

    $updateDetails1 = $func->update('userdetails', 'user_id', $_SESSION['userid'], array(
      'email_address' => $email,
      'contact_number' => $contactNumber,
      'first_name' => $firstName,
      'middle_name' => $middleName,
      'last_name' => $lastName,
      'birth_date' => $birthDate,
      'region' => $region,
      'province' => $province,
      'city' => $municipality,
      'barangay' => $barangay,
      'suffix' => $suffix
    ));

    $majors = $func->selectall('coursesmajor');
    $mapMajors = array_combine(array_column($majors, 'majorName'), array_column($majors, 'id'));

    $updateDetails2 = $func->update('users', 'id', $_SESSION['userid'], array('username' => $username));

    $updateDetails3 = $func->update('alumni_graduated_course', 'user_id', $_SESSION['userid'], array(
      'course_id' => $course,
      'campus' => $campus,
      'alumniNum' => $studentId,
      'major_id' => $mapMajors[$major],
      'year_started' => $yearEnrolled,
      'year_graduated' => $yearGraduated
    ));
  } else if ($_SESSION['role'] == 2) {
    $email = $strip->strip($_POST['employerEmail']);
    $username = $strip->strip($_POST['employerUsername']);
    $firstName = $strip->strip($_POST['employerFName']);
    $middleName = $strip->strip($_POST['employerMName']);
    $lastName = $strip->strip($_POST['employerLName']);
    $suffix = $strip->strip($_POST['employerSuffix']);
    $region = $strip->strip($_POST['employerRegion']);
    $province = $strip->strip($_POST['employerProvince']);
    $municipality = $strip->strip($_POST['employerMunicipality']);
    $barangay = $strip->strip($_POST['employerBarangay']);
    $contactNumber = $strip->strip($_POST['employerCPNumber']);
    $birthDate = $strip->strip($_POST['employerBDate']);
    $companyName = $strip->strip($_POST['employerCompany']);

    if ($companyName == "0") {
      $companyName2 = $strip->strip($_POST['employerCompanySTR']);
    }

    $position = $strip->strip($_POST['employerPosition']);

    $updateDetails1 = $func->update('userdetails', 'user_id', $_SESSION['userid'], array(
      'email_address' => $email,
      'contact_number' => $contactNumber,
      'first_name' => $firstName,
      'middle_name' => $middleName,
      'last_name' => $lastName,
      'birth_date' => $birthDate,
      'region' => $region,
      'province' => $province,
      'city' => $municipality,
      'barangay' => $barangay,
      'suffix' => $suffix
    ));

    $updateDetails2 = $func->update('users', 'id', $_SESSION['userid'], array('username' => $username));

    if ($companyName2) {
      $updateDetails3 = $func->update('employer_users', 'user_id', $_SESSION['userid'], array(
        'company_unvalidated' => $companyName2,
        'company_id' => 0,
        'company_position' => $position,
      ));
    } else {
      $updateDetails3 = $func->update('employer_users', 'user_id', $_SESSION['userid'], array(
        'company_id' => $companyName,
        'company_position' => $position,
      ));
    }
  }
}

$regions = $func->selectall('regions');
$provinces = $func->selectall('provinces');
$municipalities = $func->selectall('municipalities');
$barangays = $func->selectall('barangays');
$companies = $func->selectall('companies');

if ($_SESSION['role'] == 1) {
  $alumniData = $func->selectjoin3_where('users', 'userdetails', 'alumni_graduated_course', 'id', 'user_id', 'user_id', 'user_id', 'users', array('id', '=', $_SESSION['userid']));

  $courses = $func->selectall('courses');
  $campuses = $func->selectall('campuses');
  if (!$majors) {
    $majors = $func->selectall('coursesmajor');
    $mapMajors = array_combine(array_column($majors, 'majorName'), array_column($majors, 'id'));
  }
} else if ($_SESSION['role'] == 2) {
  $employerData = $func->selectjoin3_where('users', 'userdetails', 'employer_users', 'id', 'user_id', 'user_id', 'user_id', 'users', array('id', '=', $_SESSION['userid']));
}
?>
<!doctype html>

<html lang="en" data-bs-theme="light">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CHARMS</title>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../node_modules/animate.css/animate.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      background-image: url("../img/floorplan.jpg");
      background-size: cover;
    }

    #main-content {
      display: none;
    }

    .maintenance {
      max-height: 300px;
    }
  </style>
  <script type="module">
    import '../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
  </script>
  <script type="text/javascript">
  </script>
</head>

<body class="d-flex row align-items-center justify-content-center">
  <div class="text-center" id="loading-screen">
    <div class="spinner-grow" style="width: 40%; padding-top: 40%;" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
  </div>
  <div id="main-content">
    <div class="container-fluid d-flex flex-column bg-dark shadow p-3" style="--bs-bg-opacity: 70%">
      <div class="container ">
        <img src="../img/verifying.png" class="rounded mx-auto d-block maintenance col" alt="Verifiying Account">
      </div>
      <h1 class="text-light m-auto fw-bold">Verification Pending</h1>
      <button type="button" class="btn btn-primary m-auto my-3" data-bs-toggle="modal" data-bs-target="#verifying<?php
                                                                                                                  if ($_SESSION['role'] == 1) {
                                                                                                                    echo "Alumni";
                                                                                                                  } else if ($_SESSION['role'] == 2) {
                                                                                                                    echo "Employer";
                                                                                                                  } else if ($_SESSION['role'] == 3) {
                                                                                                                    echo "Faculty";
                                                                                                                  }
                                                                                                                  ?>Modal">Complete User Profile</button>
    </div>
  </div>
  <?php
  if ($_SESSION['role'] == 2) {
  ?>
    <!-- Employer Modal -->
    <div class="modal fade p-0" id="verifyingEmployerModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <img src="../img/job_programmer.png" width="50px">
            <h1 class="modal-title fs-5 text-primary fw-bold ms-3" id="exampleModalLabel">User Settings</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" class="row">
              <div class="col-md-4 col-sm-12" id="">
                <label for="employerEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="employerEmail" required value="<?php echo $employerData[0]['email_address'] ?>" name="employerEmail">
              </div>
              <div class="col-4 col-sm-16" id="">
                <label for="employerUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="employerUsername" required value="<?php echo $employerData[0]['username'] ?>" name="employerUsername">
              </div>
              <div class="col-4 col-sm-16" id="">
                <label for="employerFName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="" placeholder="Mark" required value="<?php echo $employerData[0]['first_name'] ?>" name="employerFName">
              </div>
              <div class="col-4" id="">
                <label for="employerMName" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="employerMName" placeholder="Santos" value="<?php echo $employerData[0]['middle_name'] ?>" name="employerMName">
              </div>
              <div class="col-4" id="">
                <label for="employerLName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="employerLName" placeholder="Santos" required value="<?php echo $employerData[0]['last_name'] ?>" name="employerLName">
              </div>
              <div class="col-4" id="">
                <label for="employerSuffix" class="form-label">Suffix</label>
                <input type="text" class="form-control" id="employerSuffix" placeholder="Santos" value="<?php echo $employerData[0]['suffix'] ?>" name="employerSuffix">
              </div>
              <div class="col-md-3 col-sm-12" id="">
                <label for="employerRegion" class="form-label">Region</label>
                <select class="form-select" id="employerRegion" name="employerRegion">
                  <?php
                  foreach ($regions as $region) {
                  ?>
                    <option value="<?php echo $region['region_id'] ?>" <?php
                                                                        if ($employerData[0]['region'] == $region['region_id']) {
                                                                          echo "selected";
                                                                        }
                                                                        ?>><?php echo $region['region_description'] ?></option>
                  <?php
                  }
                  ?>
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
              <div class="col-6" id="">
                <label for="employerCPNumber" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="employerCPNumber" placeholder="09XXXXXXXXX" maxlength="11" required value="<?php echo $employerData[0]['contact_number'] ?>" name="employerCPNumber">
              </div>
              <div class="col-6" id="">
                <label for="employerBDate" class="form-label">Birth Date</label>
                <input id="employerBDate" class="form-control" type="date" required value="<?php echo $employerData[0]['birth_date'] ?>" name="employerBDate" />
              </div>
              <div class="col-6" id="">
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
                    <option value="0">N/A</option>
                  <?php
                  } else {
                  ?>
                    <option value="0" selected>N/A</option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="col-6" style="display:none" id="companySTRdiv">
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
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="" name="saveBtn">Save Changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>


  <!-- Alumni Modal -->
  <?php
  if ($_SESSION['role'] == 1) {
  ?>
    <div class="modal fade p-0" id="verifyingAlumniModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <img src="../img/job_programmer.png" width="50px">
            <h1 class="modal-title fs-5 text-primary fw-bold ms-3" id="exampleModalLabel">User Settings</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" class="row">
              <div class="col-md-4 col-sm-12" id="">
                <label for="alumniEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="alumniEmail" name="alumniEmail" value="<?php echo $alumniData[0]['email_address'] ?>" required>
              </div>
              <div class="col-md-4 col-sm-12" id="">
                <label for="alumniUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="alumniUsername" name="alumniUsername" value="<?php echo $alumniData[0]['username'] ?>" required>
              </div>
              <div class="col-md-4 col-sm-12" id="">
                <label for="alumniFName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="alumniFName" name="alumniFName" value="<?php echo $alumniData[0]['first_name'] ?>" placeholder="Mark" required>
              </div>
              <div class="col-md-4 col-sm-12" id="">
                <label for="alumniMName" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="alumniMName" name="alumniMName" value="<?php echo $alumniData[0]['middle_name'] ?>" placeholder="Santos">
              </div>
              <div class="col-md-4 col-sm-12" id="">
                <label for="alumniLName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="alumniLName" name="alumniLName" value="<?php echo $alumniData[0]['last_name'] ?>" placeholder="Santos" required>
              </div>
              <div class="col-md-4 col-sm-12" id="">
                <label for="alumniSuffix" class="form-label">Suffix</label>
                <input type="text" class="form-control" id="alumniSuffix" name="alumniSuffix" value="<?php echo $alumniData[0]['suffix'] ?>" placeholder="">
              </div>
              <div class="col-md-3 col-sm-12" id="">
                <label for="alumniRegion" class="form-label">Region</label>
                <select class="form-select" id="alumniRegion" name="alumniRegion">
                  <?php
                  foreach ($regions as $region) {
                  ?>
                    <option value="<?php echo $region['region_id'] ?>" <?php
                                                                        if ($alumniData[0]['region'] == $region['region_id']) {
                                                                          echo "selected";
                                                                        }
                                                                        ?>><?php echo $region['region_description'] ?></option>
                  <?php
                  }
                  ?>
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
              <div class="col-md-6 col-sm-12" id="">
                <label for="alumniCPNumber" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="alumniCPNumber" name="alumniCPNumber" placeholder="" value="<?php echo $alumniData[0]['contact_number'] ?>" maxlength="11" required>
              </div>
              <div class="col-md-6 col-sm-12" id="">
                <label for="alumniBDate" class="form-label">Birth Date</label>
                <input id="" class="form-control" type="date" id="alumniBDate" name="alumniBDate" value="<?php echo $alumniData[0]['birth_date'] ?>" required />
              </div>
              <div class="col-md-4 col-sm-12" id="">
                <label for="alumniStudId" class="form-label">Alumni ID</label>
                <input type="text" class="form-control" id="alumniStudId" name="alumniStudId" value="<?php echo $alumniData[0]['alumniNum'] ?>" required>
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
                <input type="number" class="form-control" id="alumniGraduated" name="alumniGraduated" value=<?php echo $alumniData[0]['year_graduated'] ?> aria-describedby="" required>
              </div>
              <div class="col-md-4 col-sm-12">
                <label for="alumniEnrolled" class="form-label">Year Enrolled (Initially)</label>
                <input type="number" class="form-control" id="alumniEnrolled" name="alumniEnrolled" value=<?php echo $alumniData[0]['year_started'] ?> aria-describedby="" required>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="saveBtn">Save Changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <!-- Faculty Modal -->
  <div class="modal fade p-0" id="verifyingFacultyModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <img src="../img/job_programmer.png" width="50px">
          <h1 class="modal-title fs-5 text-primary fw-bold ms-3" id="exampleModalLabel">User Settings</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row">
            <div class="col-4" id="">
              <label for="" class="form-label">Email</label>
              <input type="email" class="form-control" id="" required>
            </div>
            <div class="col-4" id="">
              <label for="" class="form-label">Username</label>
              <input type="text" class="form-control" id="" required>
            </div>

            <div class="col-4" id="">
              <label for="" class="form-label">First Name</label>
              <input type="text" class="form-control" id="" placeholder="Mark" required>
            </div>
            <div class="col-4" id="">
              <label for="" class="form-label">Middle Name</label>
              <input type="text" class="form-control" id="" placeholder="Santos" required>
            </div>
            <div class="col-4" id="">
              <label for="" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="" placeholder="Santos" required>
            </div>
            <div class="col-4" id="">
              <label for="" class="form-label">Suffix</label>
              <input type="text" class="form-control" id="" placeholder="Santos" required>
            </div>
            <div class="col-12" id="">
              <label for="" class="form-label">Address</label>
              <input type="text" class="form-control" id="" placeholder="1234 Main St" required>
            </div>
            <div class="col-6" id="">
              <label for="" class="form-label">Contact Number</label>
              <input type="text" class="form-control" id="" placeholder="09XXXXXXXXX" maxlength="11" required>
            </div>
            <div class="col-6" id="">
              <label for="" class="form-label">Birth Date</label>
              <input id="" class="form-control" type="date" required />
            </div>
            <div class="col-4 ">
              <label for="alumniCampus" class="form-label">Campus</label>
              <select class="form-select" id="alumniCampus">
                <option>General Tinio Street</option>
                <option>Sumacab</option>
                <option>San Isidro</option>
                <option>Gabaldon</option>
                <option>Atate</option>
                <option>Fort Magsaysay</option>
                <option>Talavera</option>
                <option>General Tinio Papaya</option>
                <option>San Leonardo</option>
                <option>San Antonio</option>
                <option>Peñaranda</option>
                <option>Carranglan</option>
              </select>
            </div>
            <div class="col-4" id="">
              <label for="inputCompanyName" class="form-label">Faculty ID</label>
              <input type="text" class="form-control" id="inputCompanyName">
            </div>
            <div class="col-4" id="">
              <label for="inputCompanyName" class="form-label">Academic Rank</label>
              <input type="text" class="form-control" id="">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    let regionOptions, provinceOptions, municipalityOptions;
    if (<?php echo $_SESSION['role'] ?> == 1) {

      regionOptions = document.getElementById('alumniRegion');
      regionOptions.addEventListener("change", updateProvinceOptions);

      provinceOptions = document.getElementById('alumniProvince');
      provinceOptions.addEventListener("change", updateMunicipalityOptions);

      municipalityOptions = document.getElementById('alumniMunicipality');
      municipalityOptions.addEventListener("change", updateBarangayOptions);
    } else if (<?php echo $_SESSION['role'] == 2 ?>) {
      regionOptions = document.getElementById('employerRegion');
      regionOptions.addEventListener("change", updateProvinceOptions);

      provinceOptions = document.getElementById('employerProvince');
      provinceOptions.addEventListener("change", updateMunicipalityOptions);

      municipalityOptions = document.getElementById('employerMunicipality');
      municipalityOptions.addEventListener("change", updateBarangayOptions);
    }
    <?php if ($_SESSION['role'] == 2) { ?>
      updateCompanyName();
    <?php } ?>
    <?php if ($_SESSION['role'] == 1) { ?>
      const courseOptions = document.getElementById('alumniCourse');
      courseOptions.addEventListener("change", alumniMajorOptions);


      const BSElemEduc = ["N/A"];
      const BSIndusTech = [
        "Apparel and Fashion Technology",
        "Automotive Technology",
        "Drafting Technology",
        "Electrical Technology",
        "Electronics Technology",
        "Food Technology",
        "Heating, Ventilating and Air-Conditioning Technology",
        "Mechanical Technology"
      ];;

      const BPhyEduc = ["N/A"];
      const BPubAd = ["N/A"];
      const BSAgri = ["Animal Science", "Crop Science", "Agricultural Extension", "Agro-forestry", ];
      const BSArchi = ["N/A"];
      const BSBio = ["N/A"];
      const BSBA = ["Financial Management", "Human Resource Development Management", "Marketing Management"];
      const BSChem = ["N/A"];
      const BSCivilEng = ["N/A"];
      const BSCrim = ["N/A"];
      const BSElecEng = ["N/A"];
      const BSEnSci = ["N/A"];
      const BSFoodTech = ["N/A"];
      const BSHM = ["N/A"];
      const BSHRM = ["N/A"];
      const BSInEduc = ["N/A"];
      const BSIT = ["Database Systems Technology", "Network Systems Technology", "Web Systems Technology"];
      const BSMechEng = ["N/A"];
      const BSNursing = ["N/A"];
      const BSPhyEduc = ["N/A"];
      const BSPsych = ["N/A"];
      const BSTM = ["N/A"];
      const BSEduc = ["Science Education", "Mathematics Education", "Physics Education", "English Education", "Filipino Education", "Social Studies Education"];
      const BSNE = ["N/A"];
      const BSEntrep = ["N/A"];
      const BSTLE = ["N/A"];
      const ECET = ["N/A"];


      const mapCourseToMajors = new Map();
      mapCourseToMajors.set('1', BSElemEduc);
      mapCourseToMajors.set('2', BSIndusTech);
      mapCourseToMajors.set('3', BPhyEduc);
      mapCourseToMajors.set('4', BPubAd);
      mapCourseToMajors.set('5', BSAgri);
      mapCourseToMajors.set('6', BSArchi);
      mapCourseToMajors.set('7', BSBio);
      mapCourseToMajors.set('8', BSBA);
      mapCourseToMajors.set('9', BSChem);
      mapCourseToMajors.set('10', BSCivilEng);
      mapCourseToMajors.set('11', BSCrim);
      mapCourseToMajors.set('12', BSElecEng);
      mapCourseToMajors.set('13', BSEnSci);
      mapCourseToMajors.set('14', BSFoodTech);
      mapCourseToMajors.set('15', BSHM);
      mapCourseToMajors.set('16', BSHRM);
      mapCourseToMajors.set('17', BSInEduc);
      mapCourseToMajors.set('18', BSIT);
      mapCourseToMajors.set('19', BSMechEng);
      mapCourseToMajors.set('20', BSNursing);
      mapCourseToMajors.set('21', BSPhyEduc);
      mapCourseToMajors.set('22', BSPsych);
      mapCourseToMajors.set('23', BSTM);
      mapCourseToMajors.set('24', BSEduc);
      mapCourseToMajors.set('25', BSNE);
      mapCourseToMajors.set('26', BSEntrep);
      mapCourseToMajors.set('27', BSTLE);
      mapCourseToMajors.set('28', ECET);


      function alumniMajorOptions() {
        const majorOptions = document.getElementById('alumniMajor');
        removeOptions(majorOptions);
        courseOptionsSpec = mapCourseToMajors.get(courseOptions.value);
        for (x = 0; x < courseOptionsSpec.length; x++) {
          let el = document.createElement("option");
          el.textContent = courseOptionsSpec[x];
          if (courseOptionsSpec[x] == "<?php echo  array_search($alumniData[0]["major_id"], $mapMajors) ?>") {
            el.selected = true;
          }
          el.value = courseOptionsSpec[x];
          majorOptions.appendChild(el);
        }
      }



    <?php } ?>

    <?php
    foreach ($regions as $region) {
      $tick = false;
      $provincesImplode = [];

      echo "const " . cleanAlphaNumString($region['region_name']) . "region = " . "[";

      foreach ($provinces as $province) {
        if ($region['region_id'] == $province['region_id']) {
          $tick = true;
          $provincesImplode[] = '"' . $province['province_name'] . '"';
        } else {
          if ($tick == true) {
            break;
          }
        }
      }

      echo implode(', ', $provincesImplode);

      echo "];\n\t\t";
    }
    ?>

    const mapRegionToProvinces = new Map();

    <?php
    foreach ($regions as $region) {
      echo "mapRegionToProvinces.set('";
      echo $region['region_id'];
      echo "', ";
      echo cleanAlphaNumString($region['region_name']) . "region";
      echo "); ";
      echo "\n\t\t";
    }
    ?>

    <?php
    foreach ($provinces as $province) {
      $tick = false;
      $municipalityImplode = [];

      echo "const " . cleanAlphaNumString($province['province_name']) . "province = " . "[";

      foreach ($municipalities as $municipality) {
        if ($province['province_id'] == $municipality['province_id']) {
          $tick = true;
          $municipalityImplode[] = '"' . $municipality['municipality_name'] . '"';
        } else {
          if ($tick == true) {
            break;
          }
        }
      }

      echo implode(', ', $municipalityImplode);

      echo "];\n\t\t";
    }
    ?>

    const mapProvincesToMunicipalities = new Map();

    <?php
    foreach ($provinces as $province) {
      echo "mapProvincesToMunicipalities.set('";
      echo $province['province_name'];
      echo "', ";
      echo cleanAlphaNumString($province['province_name']) . "province";
      echo "); ";
      echo "\n\t\t";
    }
    ?>

    <?php
    foreach ($municipalities as $municipality) {
      $tick = false;
      $barangayImplode = [];

      echo "const " . cleanAlphaNumString($municipality['municipality_name']) . $municipality['municipality_id'] . " = " . "[";

      foreach ($barangays as $barangay) {
        if ($municipality['municipality_id'] == $barangay['municipality_id']) {
          $tick = true;
          $barangayImplode[] = '"' . $barangay['barangay_name'] . '"';
        } else {
          if ($tick == true) {
            break;
          }
        }
      }

      echo implode(', ', $barangayImplode);

      echo "];\n\t\t";
    }
    ?>

    const mapMunicipalitiesToBarangays = new Map();

    <?php
    foreach ($municipalities as $municipality) {
      echo 'mapMunicipalitiesToBarangays.set("';
      echo $municipality['municipality_name'];
      echo '", ';
      echo cleanAlphaNumString($municipality['municipality_name']) . $municipality['municipality_id'];
      echo "); ";
      echo "\n\t\t";
    }
    ?>

    function removeOptions(selectElement) {
      var i, L = selectElement.options.length - 1;
      for (i = L; i >= 0; i--) {
        selectElement.remove(i);
      }
    }

    function updateProvinceOptions() {
      let provinceOptions;
      if (<?php echo $_SESSION['role'] ?> == 1) {
        provinceOptions = document.getElementById('alumniProvince');
      } else if (<?php echo $_SESSION['role'] ?> == 2) {
        provinceOptions = document.getElementById('employerProvince');
      }
      removeOptions(provinceOptions);
      regionOptionsSpec = mapRegionToProvinces.get(regionOptions.value);
      for (x = 0; x < regionOptionsSpec.length; x++) {
        let el = document.createElement("option");
        el.textContent = regionOptionsSpec[x];
        if (regionOptionsSpec[x] == "<?php echo $alumniData[0]['province'] ?>") {
          el.selected = true;
        }
        el.value = regionOptionsSpec[x];
        provinceOptions.appendChild(el);
      }
      updateMunicipalityOptions();
      updateBarangayOptions();
    }

    function updateMunicipalityOptions() {
      let municipalityOptions;
      if (<?php echo $_SESSION['role'] ?> == 1) {
        municipalityOptions = document.getElementById('alumniMunicipality');
      } else if (<?php echo $_SESSION['role'] ?> == 2) {
        municipalityOptions = document.getElementById('employerMunicipality');
      }
      removeOptions(municipalityOptions);
      provinceOptionsSpec = mapProvincesToMunicipalities.get(provinceOptions.value);
      for (x = 0; x < provinceOptionsSpec.length; x++) {
        let el = document.createElement("option");
        el.textContent = provinceOptionsSpec[x];
        if (provinceOptionsSpec[x] == "<?php echo $alumniData[0]['city'] ?>") {
          el.selected = true;
        }
        el.value = provinceOptionsSpec[x];
        municipalityOptions.appendChild(el);
      }
      updateBarangayOptions();
    }

    function updateBarangayOptions() {
      let barangayOptions;
      if (<?php echo $_SESSION['role'] ?> == 1) {
        barangayOptions = document.getElementById('alumniBarangay');
      } else if (<?php echo $_SESSION['role'] ?> == 2) {
        barangayOptions = document.getElementById('employerBarangay');
      }
      removeOptions(barangayOptions);
      municipalityOptionsSpec = mapMunicipalitiesToBarangays.get(municipalityOptions.value);
      for (x = 0; x < municipalityOptionsSpec.length; x++) {
        let el = document.createElement("option");
        el.textContent = municipalityOptionsSpec[x];
        if (municipalityOptionsSpec[x] == "<?php echo $alumniData[0]['barangay'] ?>") {
          el.selected = true;
        }
        el.value = municipalityOptionsSpec[x];
        barangayOptions.appendChild(el);
      }
    }

    updateProvinceOptions();
    updateMunicipalityOptions()
    updateBarangayOptions();


    companyNameSel = document.getElementById("employerCompany");
    companyNameSel.addEventListener("change", updateCompanyName);

    function updateCompanyName() {
      let input1 = document.getElementById("employerCompany");
      if (input1.value == "0") {
        document.getElementById("companySTRdiv").style.display = "block";
        document.getElementById("employerCompanySTR").required = true;
      } else {
        document.getElementById("companySTRdiv").style.display = "none";
        document.getElementById("employerCompanySTR").required = false;
      }
    }

    function sweetAlertSaveChanges() {
      Swal.fire({
        icon: "success",
        title: "Success",
        text: "Changed Saved!",
        heightAuto: false,
      });
    }


    window.addEventListener('load', function() {
      document.getElementById("loading-screen").style.display = "none";
      document.getElementById("main-content").style.display = "block";
      document.getElementById("main-content").classList.add("animate__animated");
      document.getElementById("main-content").classList.add("animate__zoomIn");
    })
  </script>
</body>

</html>
