<?php
session_start();
include 'src/init.php';

/**
 * 
 * @var strip $strip
 */
/**
 * 
 * @var res $func
 */

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../node_modules/animate.css/animate.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      background-image: url("../img/loginImageBlur.jpg");
      background-size: cover;
    }

    .signForm {
      max-width: 500px;
      padding: 1rem;
    }

    .signLogo {
      max-width: 500px;
    }

    .custom-shape-divider-top-1716877928 {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      overflow: hidden;
      line-height: 0;
      z-index: -1;
      transform: rotate(180deg);
    }

    .custom-shape-divider-top-1716877928 svg {
      position: relative;
      display: block;
      width: calc(159% + 1.3px);
      height: 148px;
    }

    .custom-shape-divider-top-1716877928 .shape-fill {
      fill: #5174db;
    }

    .animate__animated .animate__pulse {
      --animate-duration: 0.25;
    }
  </style>
  <script type="module">
    import '../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
  </script>
</head>

<body class="d-flex row align-items-center" onload="registerOnload()">
  <form id="signUpForm" method="post" onload="loadAnimate()" class="signForm m-auto row g-3 border border-3 bg-light border-primary-subtle rounded col shadow ">
    <div id="title1" class="col-12 text-center text-primary-emphasis">
      <h1>Register</h1>
    </div>
    <div id="title2" class="col-12 text-center text-primary-emphasis" style="display: none">
      <h1>Personal Information</h1>
    </div>
    <div id="title3" class="col-12 text-center text-primary-emphasis" style="display: none">
      <h1>Role</h1>
    </div>

    <div class="col-4" id="divInputEmail">
      <label for="inputEmail" class="form-label">Email</label>
      <input type="email" class="form-control" id="inputEmail" name="inputEmail" required>
    </div>

    <div class="col-4" id="divInputPassword">
      <label for="inputPassword" class="form-label">Password</label>
      <input type="password" class="form-control" id="inputPassword" name="inputPassword" required>
    </div>
    <div class="col-4" id="divInputCPassword">
      <label for="inputCPassword" class="form-label">Confirm Password</label>
      <input type="password" class="form-control" id="inputCPassword" name="inputCPassword" required>
    </div>

    <div class="col-4" id="divInputFName">
      <label for="inputFName" class="form-label">First Name</label>
      <input type="text" class="form-control" id="inputFName" name="inputFName" placeholder="Mark" required>
    </div>
    <div class="col-4" id="divInputMName">
      <label for="inputFName" class="form-label">Middle Name</label>
      <input type="text" class="form-control" id="inputMName" name="inputMName" placeholder="Gonzales">
    </div>

    <div class="col-4" id="divInputLName">
      <label for="inputLName" class="form-label">Last Name</label>
      <input type="text" class="form-control" id="inputLName" name="inputLName" placeholder="Santos" required>
    </div>
    <div class="col-12" id="divInputAddress">
      <label for="inputAddress" class="form-label">Address</label>
    </div>

    <div class="col-4" id="divInputRegion">
      <select class="form-select" name="region" id="region">
        <option disabled selected>Region..</option>
      </select>
    </div>
    <div class="col-4" id="divInputProvince">
      <select class="form-select" name="province" id="province">
        <option disabled selected>Province..</option>
      </select>
    </div>
    <div class="col-4" id="divInputMunicipality">
      <select class="form-select" name="municipality" id="municipality">
        <option disabled selected>City/Municipality</option>
      </select>
    </div>
    <div class="col-6" id="divInputBarangay">
      <select class="form-select" name="barangay" id="barangay">
        <option disabled selected>Barangay...</option>
      </select>
    </div>
    <div class="col-6" id="divInputStAdd">
      <input type="text" class="form-control" id="StreetAdd" name="StreetAdd" placeholder="St. Address" required>
    </div>



    <div class="col-6" id="divInputCPNumber">
      <label for="inputCPNum" class="form-label">Contact Number</label>
      <input type="text" class="form-control" id="inputCPNum" name="inputCPNum" placeholder="09XXXXXXXXX" maxlength="11" required>
    </div>
    <div class="col-6" id="divInputBDate">
      <label for="inputBDate" class="form-label">Birth Date</label>
      <input id="inputBDate" name="inputBDate" class="form-control" type="date" required />
    </div>

    <div class="col-6" id="divInputSex">
      <label for="inputSex" class="form-label">Sex</label>
      <select id="inputSex" name="inputSex" class="form-select">
        <option value="1">Male</option>
        <option value="2">Female</option>
      </select>
    </div>

    <div class="col-6" id="divInputRole">
      <label for="inputRole" class="form-label">Role</label>
      <select id="inputRole" name="inputRole" class="form-select">
        <option value="1">Alumni</option>
        <option value="2">Employer</option>
        <option value="3">Faculty</option>
      </select>
    </div>

    <div class="col-12" id="divInputSID">
      <label for="inputSID" class="form-label">Student ID</label>
      <input type="text" class="form-control" id="inputSID" name="inputSID">
    </div>
    <div class="col-6" id="divInputEID" style="display: none;">
      <label for="inputEID" class="form-label">Employer ID</label>
      <input type="text" class="form-control" id="inputEID" name="inputEID">
    </div>


    <?php $allcompany = $func->selectallorderby('companies', 'name', 'ASC'); ?>


    <div class="col-6" id="divInputCompanyName" style="display: none;">
      <label for="inputCompanyName" class="form-label">Company Name</label>
      <select id="inputCompanyName" name="inputCompanyName" class="form-select">
        <?php for ($allc = 0; $allc < count($allcompany); $allc++) { ?>
          <option value="<?php echo $allcompany[$allc]['id'] ?>"><?php echo $allcompany[$allc]['name'] ?></option>

        <?php } ?>
        <option value="0">Other</option>
      </select>
      <input type="text" id="inputOtherCompany" name="inputOtherCompany" class="form-control" placeholder="Please specify" style="display:none; margin-top: 10px;">


    </div>

    <div class="col-12" id="divInputFID" name="divInputFID" style="display: none;">
      <label for="inputFID" class="form-label">Faculty ID</label>
      <input type="text" class="form-control" id="inputFID" name="inputFID">
    </div>

    <div class="col-12" id="termsNCondition" style="display: none;">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck">
        <label class="form-check-label" for="gridCheck">
          Terms and Conditions
        </label>
      </div>
    </div>
    <div id="signUpAlert" class="alert alert-danger alert-dismissible d-none" role="alert">
    </div>
    <div class="col-6" style="display:none" id="divBackBtn1">
      <button type="button" id="backBtn1" class="btn btn-primary" disabled>Back</button>
    </div>
    <div class="col-6 " style=" display:none" text-end" id="divNextBtn1">
      <button type="button" id="nextBtn1" class="btn btn-primary" onclick="next1()">Next</button>
    </div>
    <div class="col-6" style="display: none;" id="divBackBtn2">
      <button type="button" id="backBtn2" class="btn btn-primary" onclick="back2()">Back</button>
    </div>
    <div class="col-6 text-end" style="display: none;" id="divNextBtn2">
      <button type="button" id="nextBtn2" class="btn btn-primary" onclick="next2()">Next</button>
    </div>
    <div class="col-6" style="display: none;" id="divBackBtn3">
      <button type="button" id="backBtn3" class="btn btn-primary" onclick="back3()">Back</button>
    </div>
    <div class="col-6 text-end" style="display: none;" id="divNextBtn3">
      <button type="button" id="nextBtn3" class="btn btn-primary" disabled>Next</button>
    </div>
    <div class="text-center col-12">
      <div id="registerLoading" class="spinner-border text-secondary text-center m-auto" role="status" style="display: none">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
    <div class="col-12 text-center" id="divSignUpBtn">
      <button type="submit" id="signUpBtn" name="signUpBtn" class="btn btn-primary">Sign Up</button>
    </div>
    <a href="login.php" class="link-secondary link-underline-opacity-10 link-underline-opacity-50-hover text-center">Login Instead</a>
  </form>

  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="registerModalTitle">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="registerModalBody" class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script defer src="../app.js"></script>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

  <script>
    //location finder
    // $(document).ready(function() {
    //
    //   let brg = document.getElementById("brgy");
    //
    //   $.getJSON('locations.json', function(jd) {
    //
    //     console.log(jd.province_list);
    //     Object.keys(jd).forEach(function(key) {
    //
    //       let option = document.createElement("option");
    //       option.value = key;
    //       option.text = key;
    //
    //       option.id = key;
    //       brg.add(option);
    //     });
    //   });
    //
    // });



    // address dynamic

    $(document).ready(function() {
      $.getJSON("locations.json", function(result) {
        $.each(result, function(i, field) {
          $('#region').append(`<option value="${i}">
                                       ${field.region_name}
                                  </option>`);
        });
      });

      $("#region").change(function() {
        $('#province').empty();
        $('#municipality').empty();
        $('#barangay').empty();
        getProvinces($("#region").val());
      });

      function getProvinces(region_name) {
        $.getJSON("locations.json", function(result) {
          $.each(result[region_name].province_list, function(key, value) {
            $('#province').append(`<option value="${key}">
                                       ${key}
                                  </option>`);
          });
          getMunicipality($("#region").val(), $("#province").val());
        });
      }

      $("#province").change(function() {
        $('#municipality').empty();
        $('#barangay').empty();
        getMunicipality($("#region").val(), $("#province").val());
      });

      function getMunicipality(region_name, province_name) {
        $.getJSON("locations.json", function(result) {
          // console.log(result[region_name].province_list[province_name]);
          $.each(result[region_name].province_list[province_name].municipality_list, function(key, value) {
            // console.log(key);
            $('#municipality').append(`<option value="${key}">
                                       ${key}
                                  </option>`);
          });
          getBarangay($("#region").val(), $("#province").val(), $("#municipality").val());
        });
      }

      $("#municipality").change(function() {

        $('#barangay').empty();
        getBarangay($("#region").val(), $("#province").val(), $("#municipality").val());
      });

      function getBarangay(region_name, province_name, municipality_name) {
        $.getJSON("locations.json", function(result) {
          // console.log(result[region_name].province_list[province_name].municipality_list[municipality_name].barangay_list);
          $.each(result[region_name].province_list[province_name].municipality_list[municipality_name].barangay_list, function(key, value) {
            // console.log(key);
            $('#barangay').append(`<option value="${value}">
                                       ${value}
                                  </option>`);
          });
        });
      }

      $("#showmylocation").click(function() {
        $("#mycompletelocation").text(" Region : " + $("#myregion").val() + " Province of : " + $("#myprovince").val() + " Municipality of : " + $("#mymunicipality").val() + " Barangay : " + $("#mybarangay").val());
      });




      //CPnumber format validation
      $('#inputCPNum').focusout(function() {
        var input = $(this).val();

        // Regular expression to check if input starts with 09 and has exactly 11 digits
        var regex = /^09\d{9}$/;

        if (!regex.test(input)) {
          Swal.fire({
            icon: 'error',
            title: 'Invalid Input',
            text: 'The input must be 11 digits, start with 09, and contain no alphabets or special characters.'
          }).then(() => {
            $('#inputCPNum').focus();
          });
        }
      });


      //bday input validation
      $('#inputBDate').focusout(function() {
        var inputDate = new Date($(this).val());
        var today = new Date();

        // Calculate age
        var age = today.getFullYear() - inputDate.getFullYear();
        var monthDifference = today.getMonth() - inputDate.getMonth();
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < inputDate.getDate())) {
          age--;
        }

        // Check if age is less than 18
        if (age < 18) {
          Swal.fire({
            icon: 'error',
            title: 'Invalid Age',
            text: 'You must be 18 years or older.'
          }).then(() => {
            $('#inputBDate').focus();
          });
        }
      });

      //add new role
      $('#inputCompanyName').change(function() {
        if ($(this).val() === '0') {
          $('#inputOtherCompany').show().attr('required', true);
        } else {
          $('#inputOtherCompany').hide().val('').attr('required', false);
        }
      });


      // password verification

      $('#inputCPassword').focusout(function() {
        var password = $('#inputPassword').val();
        var confirmPassword = $(this).val();

        if (confirmPassword && password !== confirmPassword) {
          Swal.fire({
            icon: 'error',
            title: 'Password Mismatch',
            text: 'The passwords do not match. Where would you like to set focus?',
            showCancelButton: true,
            confirmButtonText: 'Password',
            cancelButtonText: 'Confirm Password'
          }).then((result) => {
            if (result.isConfirmed) {
              $('#inputPassword').focus();
            } else {
              $('#inputCPassword').focus();
            }
          });
        }
      });

      $('#inputPassword').focusout(function() {
        var password = $(this).val();
        var confirmPassword = $('#inputCPassword').val();

        if (confirmPassword && password !== confirmPassword) {
          Swal.fire({
            icon: 'error',
            title: 'Password Mismatch',
            text: 'The passwords do not match. Where would you like to set focus?',
            showCancelButton: true,
            confirmButtonText: 'Password',
            cancelButtonText: 'Confirm Password'
          }).then((result) => {
            if (result.isConfirmed) {
              $('#inputPassword').focus();
            } else {
              $('#inputCPassword').focus();
            }
          });
        }
      });



    });
  </script>


</body>

</html>




<?php
if (isset($_POST['signUpBtn'])) {


  $regEmail = $strip->strip($_POST['inputEmail']);
  $regPass = $strip->strip($_POST['inputPassword']);
  $regFname = $strip->strip($_POST['inputFName']);
  $regMname = $strip->strip($_POST['inputMName']);
  $regLname = $strip->strip($_POST['inputLName']);
  $regRegion = $strip->strip($_POST['region']);
  $regProvince = $strip->strip($_POST['province']);
  $regMunicipality = $strip->strip($_POST['municipality']);
  $regBarangay = $strip->strip($_POST['barangay']);
  $regStreetAdd = $strip->strip($_POST['StreetAdd']);
  $regCPNum = $strip->strip($_POST['inputCPNum']);
  $regBDate = $strip->strip($_POST['inputBDate']);
  $regSex = $strip->strip($_POST['inputSex']);
  $regRole = $strip->strip($_POST['inputRole']);
  $regSID = $strip->strip($_POST['inputSID']);
  $regEID = $strip->strip($_POST['inputEID']);
  $regCompanyName = $strip->strip($_POST['inputCompanyName']);
  $regOtherCompany = $strip->strip($_POST['inputOtherCompany']);
  $regFID = $strip->strip($_POST['inputFID']);


  //  echo '<script>alert("'.$regEmail.'");</script>';

  // echo '<script>alert("'.$regPass.'");</script>';


  $passhash = md5($regPass);
  $userID = "";
  $registered = false;

  $selectUser = $func->select_one('users', array('username', '=', $regEmail));

  if ($selectUser) {
?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Registration failed!',
        text: 'email address already registered'
      })
    </script>
    <?php

  } else {
    //insert data
    $profix = null;

    if ($regSex == 1) {
      $profix = 'images/profilepix/man_gen.jpg';
    } else {
      $profix = 'images/profilepix/lady_def.jpg';
    }

    $UserInsert = $func->insert('users', array(
      'username' => $regEmail,
      'passAlias' => $regPass,
      'password' => $passhash,
      'role' => $regRole
    ));

    if ($UserInsert) {

      $userID = mysqli_insert_id($con);

      $personInsert = $func->insert('userdetails', array(
        'user_id' => $userID,
        'profile_pic_url' => $profix,
        'email_address' => $regEmail,
        'contact_number' => $regCPNum,
        'first_name' => $regFname,
        'middle_name' => $regMname,
        'last_name' => $regLname,
        'birth_date' => $regBDate,
        'sex' => $regSex,
        'region' => $regRegion,
        'province' => $regProvince,
        'city' => $regMunicipality,
        'barangay' => $regBarangay,
        'street_add' => $regStreetAdd
      ));

      if ($regRole == 1) {
        $runs = true;
        $AlumniInsert = $func->insert('alumni_graduated_course', array(
          'user_id' => $userID,
          'alumniNum' => $regSID
        ));
      } else if ($regRole == 2) {

        $compID = 0;

        if ($regCompanyName == 0) {

          $CompanyInsert = $func->insert('users', array(
            'name' => $regOtherCompany
          ));

          if ($CompanyInsert) {

            $compID = mysqli_insert_id($con);
          }
        } else {
          $compID = $regCompanyName;
        }


        $employer_usersInsert = $func->insert('employer_users', array(
          'user_id' => $userID,
          'company_id' => $compID,
          'employer_num' => $regEID

        ));
      } else if ($regRole == 3) {

        $facultyInsert = $func->insert('faculty', array(
          'user_id' => $userID,
          'employee_num' => $regFID

        ));
      }


      $registered = True;
    }

    if ($runs) {
    ?>
      <script>
        alert("runs\n" + "<?php echo $userID ?>" + "\n" + "<?php echo $regSID ?>");
      </script>
    <?php
    }
    if ($registered) {
    ?>
      <script>
        document.getElementById("signUpForm").style.display = "none";
        swal.fire({
          title: "New Account Created Successfully!",
          text: "Click ok to refresh the page.",
          type: "success",
          heightAuto: "false",
        }).then(function() {
          window.location = "login.php";
        });
      </script>
    <?php
    } else {
    ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Registration Failed'
        })
      </script>
<?php
    }
  }
}
?>
