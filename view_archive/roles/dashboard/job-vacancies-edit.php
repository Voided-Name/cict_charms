<div class="container">
  <form method="POST">
    <div class="mb-2">
      <a href="job-vacancies.php"><button type="button" class="btn btn-secondary">
          Back</button></a>
    </div>
    <div class="row mb-2">
      <div class="col">
        <label for="position">Position</label>
        <input type="text" class="form-control" placeholder="Position" id="position" name="position" required value="<?php echo $vacanciesData[$_POST['editBtnVal']]['position'] ?>">
      </div>
      <div class="col">
        <label for="numVacancies">Number of Vacancies</label>
        <input type="number" class="form-control" placeholder="Number of Vacancies" id="numVacancies" name="numVacancies" required value="<?php echo $vacanciesData[$_POST['editBtnVal']]['slot_available'] ?>">
      </div>
    </div>
    <hr class="border border-1 border-primary opacity-25">
    <div class="row mb-2">
      <div class="col-12">
        <legend>Location of Deployment</legend>
      </div>
      <div class="col-6">
        <ul class="list-group">
          <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="regionCheckVal" id="regionCheckbox" name="locationCheckboxes[]" <?php if ($vacanciesData[$_POST['editBtnVal']]['job_region']) {
                                                                                                                                          echo "checked";
                                                                                                                                        }
                                                                                                                                        ?>>
            <label class="form-check-label" for="regionCheckbox">Region</label>
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="provinceCheckVal" id="provinceCheckbox" name="locationCheckboxes[]" <?php if ($vacanciesData[$_POST['editBtnVal']]['job_province']) {
                                                                                                                                              echo "checked";
                                                                                                                                            }
                                                                                                                                            ?>>
            <label class="form-check-label" for="provinceCheckbox">Province</label>
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="municipalityCheckVal" id="municipalityCheckbox" name="locationCheckboxes[]" <?php if ($vacanciesData[$_POST['editBtnVal']]['job_municipality']) {
                                                                                                                                                      echo "checked";
                                                                                                                                                    }
                                                                                                                                                    ?>>
            <label class="form-check-label" for="municipalityCheckbox">Municipality</label>
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="barangayCheckVal" id="barangayCheckbox" name="locationCheckboxes[]" <?php if ($vacanciesData[$_POST['editBtnVal']]['job_barangay']) {
                                                                                                                                              echo "checked";
                                                                                                                                            }
                                                                                                                                            ?>>
            <label class="form-check-label" for="barangayCheckbox">Barangay</label>
          </li>
        </ul>
      </div>
      <div class="col-6">
        <select class="form-select " id="regions" disabled style="display:none" name="regions">
          <option selected="" disabled>Region</option>
        </select>
        <select class="form-select " id="provinces" disabled style="display:none" name="provinces">
          <option selected="" disabled>Province</option>
        </select>
        <select class="form-select " id="municipalities" disabled style="display:none" name="municipalities">
          <option selected="" disabled>Municipality</option>
        </select>
        <select class="form-select " id="barangays" disabled style="display:none" name="barangays">
          <option selected="" disabled>Barangay</option>
        </select>
      </div>
    </div>
    <hr class="border border-1 border-primary opacity-25">
    <div class="row mb-2">
      <div class="col-12">
        <legend>Job Type</legend>
      </div>
      <div class="col-6">
        <ul class="list-group">
          <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="fullTime" id="fullTimeBtn" name="jobTypeCheckboxes[]" <?php echo ($vacanciesData[$_POST['editBtnVal']]['job_type'][0] == '1') ? "checked" : ""; ?>>
            <label class="form-check-label" for="">Full-Time</label>
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="partTime" id="partTimeBtn" name="jobTypeCheckboxes[]" <?php echo ($vacanciesData[$_POST['editBtnVal']]['job_type'][1] == '1') ? "checked" : ""; ?>>
            <label class="form-check-label" for="">Part-Time</label>
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="contract" id="contractBtn" name="jobTypeCheckboxes[]" <?php echo ($vacanciesData[$_POST['editBtnVal']]['job_type'][2] == '1') ? "checked" : ""; ?>>
            <label class="form-check-label" for="">Contract</label>
          </li>
        </ul>
      </div>
      <div class="col-6">
        <ul class="list-group">
          <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="temporary" id="temporaryBtn" name="jobTypeCheckboxes[]" <?php echo ($vacanciesData[$_POST['editBtnVal']]['job_type'][3] == '1') ? "checked" : ""; ?>>
            <label class="form-check-label" for="">Temporary</label>
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="remote" id="remoteBtn" name="jobTypeCheckboxes[]" <?php echo ($vacanciesData[$_POST['editBtnVal']]['job_type'][4] == '1') ? "checked" : ""; ?>>
            <label class="form-check-label" for="">Remote</label>
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="freelance" id="freelanceBtn" name="jobTypeCheckboxes[]" <?php echo ($vacanciesData[$_POST['editBtnVal']]['job_type'][5] == '1') ? "checked" : ""; ?>>
            <label class="form-check-label" for="">Freelance</label>
          </li>
        </ul>
      </div>
    </div>
    <hr class="border border-1 border-primary opacity-25">
    <div class="row mb-2">
      <div class="col-12">
        <legend>Shift</legend>
      </div>
      <div class="col-6">
        <ul class="list-group">
          <li class="list-group-item">
            <input class="form-check-input me-1" type="radio" name="radioShift" value="1" id="morningRadio" <?php echo ($vacanciesData[$_POST['editBtnVal']]['job_shift'] == '1') ? "checked" : ""; ?>>
            <label class="form-check-label" for="">Morning</label>
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" type="radio" name="radioShift" value="2" id="eveningRadio" <?php echo ($vacanciesData[$_POST['editBtnVal']]['job_shift'] == '2') ? "checked" : ""; ?>>
            <label class="form-check-label" for="">Evening</label>
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" type="radio" name="radioShift" value="3" id="nightRadio" <?php echo ($vacanciesData[$_POST['editBtnVal']]['job_shift'] == '3') ? "checked" : ""; ?>>
            <label class="form-check-label" for="">Night</label>
          </li>
        </ul>
      </div>
      <div class="col-6">
        <ul class="list-group">
          <li class="list-group-item">
            <input class="form-check-input me-1" type="radio" name="radioShift" value="4" id="rotatingShift" <?php echo ($vacanciesData[$_POST['editBtnVal']]['job_shift'] == '4') ? "checked" : ""; ?>>
            <label class="form-check-label" for="">Rotating</label>
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" type="radio" name="radioShift" value="5" id="flexibleShit" <?php echo ($vacanciesData[$_POST['editBtnVal']]['job_shift'] == '5') ? "checked" : ""; ?>>
            <label class="form-check-label" for="">Flexible</label>
          </li>
        </ul>
      </div>
    </div>
    <hr class="border border-1 border-primary opacity-25">
    <div class="row mb-2">
      <div class="col-12">
        <legend>Education</legend>
      </div>
      <div class="col-6">
        <ul class="list-group">
          <li class="list-group-item">
            <input class="form-check-input me-1" type="radio" name="radioEducation" value="1" id="highSchoolRadio" <?php echo ($vacanciesData[$_POST['editBtnVal']]['education'] == '1') ? "checked" : ""; ?>>
            <label class="form-check-label" for="">High School Diploma</label>
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" type="radio" name="radioEducation" value="2" id="bachelorRadio" <?php echo ($vacanciesData[$_POST['editBtnVal']]['education'] == '2') ? "checked" : ""; ?>>
            <label class="form-check-label" for="">Bachelor's Degree</label>
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" type="radio" name="radioEducation" value="3" id="masterRadio" <?php echo ($vacanciesData[$_POST['editBtnVal']]['education'] == '3') ? "checked" : ""; ?>>
            <label class="form-check-label" for="">Master's Degree</label>
          </li>
          <li class="list-group-item">
            <input class="form-check-input me-1" type="radio" name="radioEducation" value="4" id="phdRadio" <?php echo ($vacanciesData[$_POST['editBtnVal']]['education'] == '4') ? "checked" : ""; ?>>
            <label class="form-check-label" for="">PhD</label>
          </li>
        </ul>
      </div>
    </div>
    <hr class="border border-1 border-primary opacity-25">
    <div class="row mb-2">
      <div class="col-12">
        <legend>Salary</legend>
      </div>
      <div class="col-6">
        <select class="form-select" id="salaryFormat" name="salaryFormat">
          <option value="range" <?php echo ($vacanciesData[$_POST['editBtnVal']]['salary_format'] == 'range') ? "selected" : ""; ?>>Range</option>
          <option value="hour" <?php echo ($vacanciesData[$_POST['editBtnVal']]['salary_format'] == 'hour') ? "selected" : ""; ?>>Hourly</option>
          <option value="commission" <?php echo ($vacanciesData[$_POST['editBtnVal']]['salary_format'] == 'commission') ? "selected" : ""; ?>>Commission-Based</option>
          <option value="negotiable" <?php echo ($vacanciesData[$_POST['editBtnVal']]['salary_format'] == 'negotiable') ? "selected" : ""; ?>>Negotiable</option>
        </select>
      </div>
      <div class="col-3" id="rangeMinDiv" style="display: none;">
        <input type="number" class="form-control" placeholder="Php Min" id="rangeMin" name="rangeMin" <?php
                                                                                                      if ($vacanciesData[$_POST['editBtnVal']]['salary_format'] == 'range') {
                                                                                                        echo "value = " . $vacanciesData[$_POST['editBtnVal']]['salary_min'];
                                                                                                      }
                                                                                                      ?>>
      </div>
      <div class="col-3" id="rangeMaxDiv" style="display: none;">
        <input type="number" class="form-control" placeholder="Php Max" id="rangeMax" name="rangeMax" <?php
                                                                                                      if ($vacanciesData[$_POST['editBtnVal']]['salary_format'] == 'range') {
                                                                                                        echo "value = " . $vacanciesData[$_POST['editBtnVal']]['salary_max'];
                                                                                                      }
                                                                                                      ?>>
      </div>
      <div class="col-3" id="phpHourDiv" style="display:none;">
        <input type="number" class="form-control" placeholder="Php / Hour" id="phpHour" name="phpHour" <?php
                                                                                                        if ($vacanciesData[$_POST['editBtnVal']]['salary_format'] == 'hour') {
                                                                                                          echo "value = " . $vacanciesData[$_POST['editBtnVal']]['salary_hour'];
                                                                                                        }
                                                                                                        ?>>
      </div>
    </div>
    <hr class="border border-1 border-primary opacity-25">
    <div class="">
      <textarea class="form-select form-select-lg mb-3" placeholder="Job Description" id="jobDescription" name="jobDescription" required><?php echo $vacanciesData[$_POST['editBtnVal']]['job_description'] ?></textarea>
    </div>
    <div class="bd-example">
      <button type="submit" class="btn btn-primary" onclick="" name="editSaveBtn" value="<?php echo $vacanciesData[$_POST['editBtnVal']]['post_id']; ?>">Save Changes</button>
    </div>
  </form>
</div>
