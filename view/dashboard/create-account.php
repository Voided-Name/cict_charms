<?php
session_start();
include '../src/init.php';

/**
 * 
 * @var strip $strip
 */
/**
 * 
 * @var res $func
 */

if ($_SESSION['role'] != 4) {
  header("location: ../../");
  exit();
}

$_SESSION['adminPage'] = "createAccount";

$regionInformation = array();
$regionInformation['01'] = 'Region I';
$regionInformation['02'] = 'Region II';
$regionInformation['03'] = 'Region III';
$regionInformation['4A'] = 'Region IV-A';
$regionInformation['4B'] = 'Region IV-B';
$regionInformation['05'] = 'Region V';
$regionInformation['06'] = 'Region VI';
$regionInformation['07'] = 'Region VII';
$regionInformation['08'] = 'Region VII';
$regionInformation['09'] = 'Region XI';
$regionInformation['10'] = 'Region X';
$regionInformation['11'] = 'Region XI';
$regionInformation['12'] = 'Region XII';
$regionInformation['13'] = 'Region XIII';
$regionInformation['BARMM'] = 'BARMM';
$regionInformation['CAR'] = 'CAR';
$regionInformation['NCR'] = 'NCR';

$courses = $func->selectall('courses');
$campuses = $func->selectall('campuses');
$majors = $func->selectall('coursesmajor');
$mapMajors = array_combine(array_column($majors, 'majorName'), array_column($majors, 'id;'));
$acadRanks = $func->selectall('faculty_rankings');
$companies = $func->selectall('companies');
?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CICT CHARM</title>

  <link rel="shortcut icon" href="../../img/favicon.ico">
  <link rel="stylesheet" href="../../css/theme_1/core/libs.min.css">
  <link rel="stylesheet" href="../../css/theme_1/hope-ui.min.css">
  <link rel="stylesheet" href="../../css/theme_1/custom.css">
  <link rel="stylesheet" href="../../css/theme_1/dark.css">
  <link rel="stylesheet" href="../../css/theme_1/rtl.min.css">
  <link rel="stylesheet" href="../../css/theme_1/customizer.min.css">
  <script>
    if (!sessionStorage.getItem('userRole')) {
      sessionStorage.setItem('userRole', 'alumni');
    }
  </script>


</head>

<body class="  ">
  <div id="loading">
    <div class="loader simple-loader">
      <div class="loader-body"></div>
    </div>
  </div>
  <!-- Sidebar Menu Start -->
  <?php include 'adminSidebar.php' ?>
  </div>
  </div>
  <!-- Sidebar Menu End -->
  </aside>
  <main class="main-content">
    <div class="position-relative iq-banner">
      <!--Nav Start-->
      <?php include 'header.php' ?>
      <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
          <div class="row">
            <div class="col-md-12">
              <div class="flex-wrap d-flex justify-content-between align-items-center">
                <div>
                  <a href="" class="btn btn-link btn-soft-light">
                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z" fill="currentColor"></path>
                      <path opacity="0.4" d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z" fill="currentColor"></path>
                    </svg>
                    Announcements
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="iq-header-img">
          <img src="../../img/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
        </div>
      </div>
      <!--Nav End-->
    </div>
    <div class="conatiner-fluid content-inner mt-n5 py-0">
      <div>
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <ul class="nav nav-tabs p-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="alumni-tab" data-bs-toggle="tab" data-bs-target="#alumni" type="button" role="tab" aria-controls="alumni" aria-selected="true">Alumni</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="employer-tab" data-bs-toggle="tab" data-bs-target="#employer" type="button" role="tab" aria-controls="employer" aria-selected="false">Employer</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="faculty-tab" data-bs-toggle="tab" data-bs-target="#faculty" type="button" role="tab" aria-controls="faculty" aria-selected="false">Faculty</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="alumni" role="tabpanel" aria-labelledby="alumni-tab">
                  <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                      <h4 class="card-title">Create Account</h4>
                    </div>
                  </div>
                  <div class="card-body px-0">
                    <div class="container">
                      <?php include 'create-alumni-tabs.php' ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="employer" role="tabpanel" aria-labelledby="employer-tab">
                <div class="tab-pane fade show active" id="alumni" role="tabpanel" aria-labelledby="alumni-tab">
                  <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                      <h4 class="card-title">Create Account</h4>
                    </div>
                  </div>
                  <div class="card-body px-0">
                    <div class="container">
                      <?php include 'create-employer-tabs.php' ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="faculty" role="tabpanel" aria-labelledby="faculty-tab">
                <?php include 'create-faculty-tabs.php' ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../../js/core/libs.min.js"></script>
    <script src="../../js/core/external.min.js"></script>
    <script src="../../js/charts/widgetcharts.js"></script>
    <script src="../../js/charts/vectore-chart.js"></script>
    <script src="../../js/charts/dashboard.js"></script>
    <script src="../../js/plugins/fslightbox.js"></script>
    <script src="../../js/plugins/setting.js"></script>
    <script src="../../js/plugins/slider-tabs.js"></script>
    <script src="../../js/plugins/form-wizard.js"></script>
    <script src="../../js/hope-ui.js" defer></script>
    <script>
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

      function removeOptions(selectElement) {
        var i, L = selectElement.options.length - 1;
        for (i = L; i >= 0; i--) {
          selectElement.remove(i);
        }
      }

      $(document).ready(function() {
        <?php if ($_SESSION['role'] == 2) { ?>
          updateCompanyName(true);
        <?php
        } ?>
        $('#' + sessionStorage.getItem('userRole') + 'CPNumber').focusout(function() {
          var input = $(this).val();

          // Regular expression to check if input starts with 09 and has exactly 11 digits
          var regex = /^09\d{9}$/;

          if (!regex.test(input)) {
            Swal.fire({
              icon: 'error',
              title: 'Invalid Input',
              text: 'The input must be 11 digits, start with 09, and contain no alphabets or special characters.'
            }).then(() => {
              $('#' + sessionStorage.getItem('userRole') + 'CPNumber').focus();
            });
          }
        });

        $('#' + sessionStorage.getItem('userRole') + 'BDate').focusout(function() {
          var inputDate = new Date($(this).val());
          alert(inputDate);
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

        $.getJSON("../locations.json", function(result) {
          $.each(result, function(i, field) {
            $('#' + sessionStorage.getItem('userRole') + 'Region').append(`<option value="${i}">
                                       ${field.region_name}
                                  </option>`);
          });
          getProvinces($("#" + sessionStorage.getItem('userRole') + "Region").val());
          getMunicipality($("#" + sessionStorage.getItem('userRole') + "Region").val(), $("#" + sessionStorage.getItem('userRole') + "Province").val());
          getBarangay($("#" + sessionStorage.getItem('userRole') + "Region").val(), $("#" + sessionStorage.getItem('userRole') + "Province").val(), $("#" + sessionStorage.getItem('userRole') + "Municipality").val());
        });

        $("#" + sessionStorage.getItem('userRole') + "Region").change(function() {
          $('#' + sessionStorage.getItem('userRole') + 'Province').empty();
          $('#' + sessionStorage.getItem('userRole') + 'Municipality').empty();
          $('#' + sessionStorage.getItem('userRole') + 'Barangay').empty();
          getProvinces($("#" + sessionStorage.getItem('userRole') + "Region").val());
        });

        function getProvinces(region_name) {
          $.getJSON("../locations.json", function(result) {
            $.each(result[region_name].province_list, function(key, value) {
              $('#' + sessionStorage.getItem('userRole') + 'Province').append(`<option value="${key}">
                                       ${key}
                                  </option>`);
            });
            getMunicipality($("#" + sessionStorage.getItem('userRole') + "Region").val(), $("#" + sessionStorage.getItem('userRole') + "Province").val());
          });
        }

        $("#" + sessionStorage.getItem('userRole') + "Province").change(function() {
          $('#' + sessionStorage.getItem('userRole') + 'Municipality').empty();
          $('#' + sessionStorage.getItem('userRole') + 'Barangay').empty();
          getMunicipality($("#" + sessionStorage.getItem('userRole') + "Region").val(), $("#" + sessionStorage.getItem('userRole') + "Province").val());
        });

        function getMunicipality(region_name, province_name) {
          $.getJSON("../locations.json", function(result) {
            // console.log(result[region_name].province_list[province_name]);
            $.each(result[region_name].province_list[province_name].municipality_list, function(key, value) {
              // console.log(key);
              $('#' + sessionStorage.getItem('userRole') + 'Municipality').append(`<option value="${key}">
                                       ${key}
                                  </option>`);
            });
            getBarangay($("#" + sessionStorage.getItem('userRole') + "Region").val(), $("#" + sessionStorage.getItem('userRole') + "Province").val(), $("#" + sessionStorage.getItem('userRole') + "Municipality").val());
          });
        }

        $("#" + sessionStorage.getItem('userRole') + "Municipality").change(function() {

          $('#' + sessionStorage.getItem('userRole') + 'Barangay').empty();
          getBarangay($("#" + sessionStorage.getItem('userRole') + "Region").val(), $("#" + sessionStorage.getItem('userRole') + "Province").val(), $("#" + sessionStorage.getItem('userRole') + "Municipality").val());
        });

        function getBarangay(region_name, province_name, municipality_name) {
          $.getJSON("../locations.json", function(result) {
            // console.log(result[region_name].province_list[province_name].municipality_list[municipality_name].barangay_list);
            $.each(result[region_name].province_list[province_name].municipality_list[municipality_name].barangay_list, function(key, value) {
              // console.log(key);
              $('#' + sessionStorage.getItem('userRole') + 'Barangay').append(`<option value="${value}">
                                       ${value}
                                  </option>`);
            });
          });
        }

      });
    </script>
</body>

</html>
