<?php
session_start();
include '../../src/init.php';

$_SESSION['employerPage'] = "jobVacancies";

if (!$_SESSION['userid']) {
    session_destroy();
    header('location:../../login.php');
}
if (isset($_POST['editBtnVal'])) {
    $edit = true;
}
if (isset($_POST['deleteVacancyBtn'])) {
    $delete = true;

    $deleteVacancySql = $func->delete('employer_job_posts', array('id', '=', $_POST['deleteVacancyBtn']));
}

if (isset($_POST['editSaveBtn'])) {
    $editSave = true;

    $position = $strip->strip($_POST['position']);
    $slots = $strip->strip($_POST['numVacancies']);

    $locationCheckboxes = $_POST['locationCheckboxes'];

    if (in_array("regionCheckVal", $locationCheckboxes)) {
        $region = $strip->strip($_POST['regions']);
    }
    if (in_array("provinceCheckVal", $locationCheckboxes)) {
        $province = $strip->strip($_POST['provinces']);
    }
    if (in_array("municipalityCheckVal", $locationCheckboxes)) {
        $municipality = $strip->strip($_POST['municipalities']);
    }
    if (in_array("barangayCheckVal", $locationCheckboxes)) {
        $barangay = $strip->strip($_POST['barangays']);
    }

    $jobTypeCheckboxes = $_POST['jobTypeCheckboxes'];
    $jobType = "000000";

    if (in_array("fullTime", $jobTypeCheckboxes)) {
        $isFullTime = true;
        $jobType[0] = '1';
    }
    if (in_array("partTime", $jobTypeCheckboxes)) {
        $isPartTime = true;
        $jobType[1] = '1';
    }
    if (in_array("contract", $jobTypeCheckboxes)) {
        $isContract = true;
        $jobType[2] = '1';
    }
    if (in_array("temporary", $jobTypeCheckboxes)) {
        $isTemporary = true;
        $jobType[3] = '1';
    }
    if (in_array("remote", $jobTypeCheckboxes)) {
        $isRemote = true;
        $jobType[4] = '1';
    }
    if (in_array("freelance", $jobTypeCheckboxes)) {
        $isFreelance = true;
        $jobType[5] = '1';
    }


    $shift = $strip->strip($_POST['radioShift']);

    $education = $strip->strip($_POST['radioEducation']);

    $salaryFormat = $strip->strip($_POST['salaryFormat']);

    if ($salaryFormat == "range") {
        $rangeSalaryMin = $strip->strip($_POST['rangeMin']);
        $rangeSalaryMax = $strip->strip($_POST['rangeMax']);
    } else if ($salaryFormat == "hour") {
        $hourlySalary = $strip->strip($_POST['phpHour']);
    }

    $description = $strip->strip($_POST['jobDescription']);

    if (!$job_shift) {
        $job_shift = "0";
    }

    if ($salaryFormat == "range") {
        $hourlySalary = "0";
    } else if ($salaryFormat == "hour") {
        $rangeSalaryMax = "0";
        $rangeSalaryMin = "0";
    } else {
        $rangeSalaryMax = "0";
        $rangeSalaryMin = "0";
        $hourlySalary = "0";
    }

    function deZero($var)
    {
        if (!$var) {
            return "0";
        } else {
            return $var;
        }
    }

    $region = deZero($region);
    $province = deZero($province);
    $municipality = deZero($municipality);
    $barangay = deZero($barangay);

    $input = array(
        'author_id' => $_SESSION['userid'],
        'education' => $education,
        'position' => $position,
        'slot_available' => $slots,
        'job_type' => $jobType,
        'job_shift' => $shift,
        'salary_format' => $salaryFormat,
        'salary_min' => $rangeSalaryMin,
        'salary_max' => $rangeSalaryMax,
        'salary_hour' => $hourlySalary,
        'job_description' => $description,
        'job_region' => $region,
        'job_province' => $province,
        'job_municipality' => $municipality,
        'job_barangay' => $barangay,
        'is_draft' => 0,
        'created_at' => date('Y-m-d'),
    );


    $saveEditSql = $func->update('employer_job_posts', 'id', $_POST['editSaveBtn'], $input);

    /* sample update procedure
			$userUpdate = $func->update('users','userid',3, array(
					'password' => 'newpassword', 
					 'name' => 'Dale Garret'
				));

				
			if ($userUpdate){
				echo "record updated";
			} else {
				echo "failed";
			}
		*/
}

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

$vacanciesData = $func->selectall_where('employer_job_posts', array('author_id', '=', $_SESSION['userid']));
?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CICT CHARM</title>


    <link rel="shortcut icon" href="../assets/images/favicon.ico">
    <link rel="stylesheet" href="../assets/css/core/libs.min.css">
    <link rel="stylesheet" href="../assets/css/hope-ui.min.css?v=4.0.0">
    <!-- <link rel="stylesheet" href="../../assets/css/custom.min.css?v=4.0.0">
    <link rel="stylesheet" href="../../assets/css/dark.min.css">
    <link rel="stylesheet" href="../../assets/css/customizer.min.css"> -->
    <link rel="stylesheet" href="../assets/css/rtl.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</head>

<body class="  ">

    <!-- Sidebar Menu Start -->
    <?php include 'employerSidebar.php' ?>
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
                                    <h1>Welcome Back!</h1>
                                </div>
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
                    <img src="../assets/images/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                </div>
            </div>
            <!--Nav End-->
        </div>
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Manage Jobs</h4>
                                </div>
                            </div>
                            <div class="card-body px-0">
                                <?php if (!$edit) { ?>
                                    <div class="table-responsive">
                                        <table id="user-list-table" class="table table-striped" role="grid" data-bs-toggle="data-table">
                                            <thead>
                                                <tr class="ligth">
                                                    <th>Position</th>
                                                    <th>Number of Vacancy</th>
                                                    <th style="min-width: 90px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($edit) {
                                                } else {
                                                    include 'job-vacancies-data.php';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php } else {
                                    include 'job-vacancies-edit.php';
                                ?>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                <?php if ($deleteVacancySql) {
                    echo "showDeleteAlert();";
                } ?>

                function showDeleteAlert() {
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'The job is successfully deleted.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                }

                function showEditAlert() {
                    Swal.fire({
                        title: 'Edited!',
                        text: 'The job is successfully edited.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                }

                let regionCheckbox = document.getElementById("regionCheckbox");
                let provinceCheckbox = document.getElementById("provinceCheckbox");
                let municipalityCheckbox = document.getElementById("municipalityCheckbox");
                let barangayCheckbox = document.getElementById("barangayCheckbox");

                let fullTimeBtn = document.getElementById("fullTimeBtn");
                let partTimeBtn = document.getElementById("partTimeBtn");
                let contractBtn = document.getElementById("contractBtn");
                let temporaryBtn = document.getElementById("temporaryBtn");
                let remoteBtn = document.getElementById("remoteBtn");
                let freelanceBtn = document.getElementById("freelanceBtn");

                let salaryFormat = document.getElementById("salaryFormat");

                regionCheckbox.addEventListener('change', function() {
                    if (regionCheckbox.checked) {
                        document.getElementById('regions').disabled = false;

                        document.getElementById('regions').style.display = "block";

                    } else {
                        document.getElementById('regions').disabled = true;
                        document.getElementById('provinces').disabled = true;
                        document.getElementById('municipalities').disabled = true;
                        document.getElementById('barangays').disabled = true;

                        document.getElementById('regions').style.display = "none";
                        document.getElementById('provinces').style.display = "none";
                        document.getElementById('municipalities').style.display = "none";
                        document.getElementById('barangays').style.display = "none";

                        document.getElementById('provinceCheckbox').checked = false;
                        document.getElementById('municipalityCheckbox').checked = false;
                        document.getElementById('barangayCheckbox').checked = false;
                    }
                })

                provinceCheckbox.addEventListener('change', function() {
                    if (provinceCheckbox.checked) {
                        document.getElementById('provinces').disabled = false;
                        document.getElementById('regions').disabled = false;

                        document.getElementById('provinces').style.display = "block";
                        document.getElementById('regions').style.display = "block";

                        document.getElementById('regionCheckbox').checked = true;
                    } else {
                        document.getElementById('provinces').disabled = true;
                        document.getElementById('municipalities').disabled = true;
                        document.getElementById('barangays').disabled = true;

                        document.getElementById('provinces').style.display = "none";
                        document.getElementById('municipalities').style.display = "none";
                        document.getElementById('barangays').style.display = "none";

                        document.getElementById('municipalityCheckbox').checked = false;
                        document.getElementById('barangayCheckbox').checked = false;
                    }
                })

                municipalityCheckbox.addEventListener('change', function() {
                    if (municipalityCheckbox.checked) {
                        document.getElementById('provinces').disabled = false;
                        document.getElementById('regions').disabled = false;
                        document.getElementById('municipalities').disabled = false;

                        document.getElementById('provinces').style.display = "block";
                        document.getElementById('regions').style.display = "block";
                        document.getElementById('municipalities').style.display = "block";

                        document.getElementById('regionCheckbox').checked = true;
                        document.getElementById('provinceCheckbox').checked = true;
                    } else {
                        document.getElementById('municipalities').disabled = true;
                        document.getElementById('barangays').disabled = true;

                        document.getElementById('municipalities').style.display = "none";
                        document.getElementById('barangays').style.display = "none";

                        document.getElementById('barangayCheckbox').checked = false;
                    }
                })

                barangayCheckbox.addEventListener('change', function() {
                    if (barangayCheckbox.checked) {
                        document.getElementById('provinces').disabled = false;
                        document.getElementById('regions').disabled = false;
                        document.getElementById('municipalities').disabled = false;
                        document.getElementById('barangays').disabled = false;

                        document.getElementById('provinces').style.display = "block";
                        document.getElementById('regions').style.display = "block";
                        document.getElementById('municipalities').style.display = "block";
                        document.getElementById('barangays').style.display = "block";

                        document.getElementById('regionCheckbox').checked = true;
                        document.getElementById('provinceCheckbox').checked = true;
                        document.getElementById('municipalityCheckbox').checked = true;
                    } else {
                        document.getElementById('barangays').style.display = "none";

                        document.getElementById('barangays').disabled = true;
                    }
                })

                fullTimeBtn.addEventListener('change', fullTimeBtnFunc());

                function fullTimeBtnFunc() {
                    if (fullTimeBtn.checked) {
                        partTimeBtn.disabled = true;
                        freelanceBtn.disabled = true;
                        temporaryBtn.disabled = true;
                        contractBtn.disabled = true;
                    } else {
                        partTimeBtn.disabled = false;
                        freelanceBtn.disabled = false;
                        temporaryBtn.disabled = false;
                        contractBtn.disabled = false;
                    }
                }

                partTimeBtn.addEventListener('change', partTimeBtnFunc());

                function partTimeBtnFunc() {
                    if (partTimeBtn.checked) {
                        fullTimeBtn.disabled = true;
                        freelanceBtn.disabled = true;
                        temporaryBtn.disabled = true;
                        contractBtn.disabled = true;
                    } else {
                        fullTimeBtn.disabled = false;
                        freelanceBtn.disabled = false;
                        temporaryBtn.disabled = false;
                        contractBtn.disabled = false;
                    }
                }


                contractBtn.addEventListener('change', contractBtnFunc())


                function contractBtnFunc() {
                    if (contractBtn.checked) {
                        fullTimeBtn.disabled = true;
                        partTimeBtn.disabled = true;
                    } else {
                        if (!temporaryBtn.checked && !freelanceBtn.checked) {
                            fullTimeBtn.disabled = false;
                            partTimeBtn.disabled = false;
                        }
                    }
                }

                temporaryBtn.addEventListener('change', temporaryBtnFunc())

                function temporaryBtnFunc() {
                    if (temporaryBtn.checked) {
                        fullTimeBtn.disabled = true;
                        partTimeBtn.disabled = true;
                    } else {
                        if (!contractBtn.checked && !freelanceBtn.checked) {
                            fullTimeBtn.disabled = false;
                            partTimeBtn.disabled = false;
                        }
                    }
                }

                freelanceBtn.addEventListener('change', freelanceBtnFunc());

                function freelanceBtnFunc() {
                    if (freelanceBtn.checked) {
                        fullTimeBtn.disabled = true;
                        partTimeBtn.disabled = true;
                    } else {
                        if (!contractBtn.checked && !temporaryBtn.checked) {
                            fullTimeBtn.disabled = false;
                            partTimeBtn.disabled = false;
                        }
                    }
                }

                freelanceBtnFunc();
                temporaryBtnFunc();
                contractBtnFunc();
                partTimeBtnFunc();
                fullTimeBtnFunc();

                salaryFormat.addEventListener('change', function() {
                    if (salaryFormat.value == "range") {
                        document.getElementById("rangeMaxDiv").style.display = "block";
                        document.getElementById("rangeMinDiv").style.display = "block";

                        document.getElementById("phpHourDiv").style.display = "none";
                    } else if (salaryFormat.value == "hour") {
                        document.getElementById("rangeMaxDiv").style.display = "none";
                        document.getElementById("rangeMinDiv").style.display = "none";

                        document.getElementById("phpHourDiv").style.display = "block";
                    } else if (salaryFormat.value == "commission") {
                        document.getElementById("rangeMaxDiv").style.display = "none";
                        document.getElementById("rangeMinDiv").style.display = "none";


                        document.getElementById("phpHourDiv").style.display = "none";
                    } else if (salaryFormat.value == "negotiable") {
                        document.getElementById("rangeMaxDiv").style.display = "none";
                        document.getElementById("rangeMinDiv").style.display = "none";

                        document.getElementById("phpHourDiv").style.display = "none";
                    }
                })

                if (salaryFormat.value == "range") {
                    document.getElementById("rangeMaxDiv").style.display = "block";
                    document.getElementById("rangeMinDiv").style.display = "block";

                    document.getElementById("phpHourDiv").style.display = "none";
                } else if (salaryFormat.value == "hour") {
                    document.getElementById("rangeMaxDiv").style.display = "none";
                    document.getElementById("rangeMinDiv").style.display = "none";

                    document.getElementById("phpHourDiv").style.display = "block";
                } else if (salaryFormat.value == "commission") {
                    document.getElementById("rangeMaxDiv").style.display = "none";
                    document.getElementById("rangeMinDiv").style.display = "none";


                    document.getElementById("phpHourDiv").style.display = "none";
                } else if (salaryFormat.value == "negotiable") {
                    document.getElementById("rangeMaxDiv").style.display = "none";
                    document.getElementById("rangeMinDiv").style.display = "none";

                    document.getElementById("phpHourDiv").style.display = "none";
                }


                $(document).ready(function() {
                    $.getJSON("../../locations.json", function(result) {
                        $.each(result, function(i, field) {
                            $('#regions').append(`<option value="${i}">
                                       ${field.region_name}
                                  </option>`);
                        });
                        if (regionCheckbox.checked) {
                            $('#regions').prop('disabled', false).show();
                            $('#regions').val("<?php echo $vacanciesData[$_POST['editBtnVal']]['job_region'] ?>");
                            getProvinces($("#regions").val());
                        }
                        if (provinceCheckbox.checked) {
                            $('#provinces').prop('disabled', false).show();
                            $('#provinces').val("<?php echo $vacanciesData[$_POST['editBtnVal']]['job_region'] ?>");
                            getMunicipality($("#regions").val(), $("provinces").val());
                        }
                        if (municipalityCheckbox.checked) {
                            $('#municipalities').prop('disabled', false).show();
                            $('#municipalities').val("<?php echo $vacanciesData[$_POST['editBtnVal']]['job_region'] ?>");
                            getBarangay($("#regions").val(), $("#provinces").val(), $("#municipalities").val());
                        }
                        if (barangayCheckbox.checked) {
                            $('#barangays').prop('disabled', false).show();
                            $('#barangays').val("<?php echo $vacanciesData[$_POST['editBtnVal']]['job_region'] ?>");
                        }
                    });

                    $("#regions").change(function() {
                        $('#provinces').empty();
                        $('#municipalities').empty();
                        $('#barangays').empty();
                        getProvinces($("#regions").val());
                    });

                    function getProvinces(region_name) {
                        $.getJSON("../../locations.json", function(result) {
                            console.log("Result: ", result);
                            console.log("Region name: ", region_name);
                            if (region_name) {
                                $.each(result[region_name].province_list, function(key, value) {
                                    $('#provinces').append(`<option value="${key}">
                                       ${key}
                                  </option>`);
                                });
                                getMunicipality($("#regions").val(), $("#provinces").val());
                            }
                        });
                    }

                    $("#provinces").change(function() {
                        $('#municipalities').empty();
                        $('#barangays').empty();
                        getMunicipality($("#regions").val(), $("#provinces").val());
                    });

                    function getMunicipality(region_name, province_name) {
                        $.getJSON("../../locations.json", function(result) {
                            // console.log(result[region_name].province_list[province_name]);
                            if (region_name && province_name) {
                                $.each(result[region_name].province_list[province_name].municipality_list, function(key, value) {
                                    // console.log(key);
                                    $('#municipalities').append(`<option value="${key}">
                                       ${key}
                                  </option>`);
                                });
                                getBarangay($("#regions").val(), $("#provinces").val(), $("#municipalities").val());
                            }
                        });
                    }

                    $("#municipalities").change(function() {
                        $('#barangays').empty();
                        getBarangay($("#regions").val(), $("#provinces").val(), $("#municipalities").val());
                    });

                    function getBarangay(region_name, province_name, municipality_name) {
                        $.getJSON("../../locations.json", function(result) {
                            // console.log(result[region_name].province_list[province_name].municipality_list[municipality_name].barangay_list);
                            if (region_name && province_name && municipality_name) {
                                $.each(result[region_name].province_list[province_name].municipality_list[municipality_name].barangay_list, function(key, value) {
                                    // console.log(key);
                                    $('#barangays').append(`<option value="${value}">
                                       ${value}
                                  </option>`);
                                });
                            }
                        });
                    }

                });
            </script>

            <script src="../assets/js/core/libs.min.js"></script>
            <script src="../assets/js/core/external.min.js"></script>
            <script src="../assets/js/charts/widgetcharts.js"></script>
            <script src="../assets/js/charts/vectore-chart.js"></script>
            <script src="../assets/js/charts/dashboard.js"></script>
            <script src="../assets/js/plugins/fslightbox.js"></script>
            <script src="../assets/js/plugins/setting.js"></script>
            <script src="../assets/js/plugins/slider-tabs.js"></script>
            <script src="../assets/js/plugins/form-wizard.js"></script>
            <script src="../assets/js/hope-ui.js" defer></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.js"></script>
</body>

</html>
