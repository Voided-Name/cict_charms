<?php
session_start();
//function selectall_where_orderby($table, $where = array(), $ref, $sortorder)
$employer_job_vacancies = $func->selectall_where_orderby('employer_job_posts', array('author_id', '=', $_SESSION),);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../node_modules/animate.css/animate.css" rel="stylesheet">
  <style type="text/css">
    .table-responsive {
      max-height: 300px;
    }
  </style>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script type="module">
    import '../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
  </script>
  <script>
    async function refreshManageVacancies() {
      const table = document.getElementById("manageVacanciesTable");
      const tbody = document.getElementById("manageVacanciesTbody");
      let newTbody = document.createElement('tbody');

      employerRequest = {
        "context": "refreshManage",
      }

      await fetch("../controller/employerController.php", {
        "method": "POST",
        "headers": {
          "Content-Type": "application/json; charset=utf-8"
        },
        "body": JSON.stringify(employerRequest),
      }).then(function(response) {
        return response.json();
      }).then(function(data) {
        data.forEach(function(item, index) {
          const row = newTbody.insertRow();
          row.insertCell(0).textContent = index + 1; // Assuming # is an auto-incrementing index
          row.insertCell(1).textContent = item.position;
          row.insertCell(2).textContent = item.slotAmount;
          row.insertCell(3).textContent = item.jobType;
          row.insertCell(4).textContent = item.location;
          row.insertCell(5).textContent = item.workHours;
        })
      }).catch(error => {
        console.error("Err", error);
      })

      table.replaceChild(newTbody, tbody);
    }
  </script>
</head>

<body onload="">
  <nav class="navbar navbar-expand-lg bg-body-tertiary py-2 px-4 m-auto">
    <div class="container-fluid row w-100 p-0">
      <a class="navbar-brand col-4" href="#">
        <img src="../img/logoCharms.png" width="30" height="30">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse col-8" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="vacancies.php">Job Vacancies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="announcements.php">Announcements</a>
          </li>
        </ul>
        <div class="dropdown">
          <img class="btn btn-secondary dropdown-toggle img-responsive" role="button" type="button" data-bs-toggle="dropdown" aria-expanded="false" alt="Profile">
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Account</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item text-danger" href="login.php">Log Out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="manage-vacancies-tab" data-bs-toggle="tab" data-bs-target="#manage-vacancies-pane" type="button" role="tab" aria-controls="manage-vacancies-pane" aria-selected="true">Manage</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="create-vacancies-tab" data-bs-toggle="tab" data-bs-target="#create-vacancies-pane" type="button" role="tab" aria-controls="create-vacancies-pane" aria-selected="false">Create</button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active bg-body-tertiary mt-0 pt-3" id="manage-vacancies-pane" role="tabpanel" aria-labelledby="manage-vacancies" tabindex="0">
      <div class="container row m-auto my-4 bg-light p-3 rounded-1 gap-3 shadow-lg">
        <div class="col bg-primary bg-gradient text-light rounded-3 text-center ">
          <h3>Total Vacancies</h3>
          <h2 class="fw-bold">5</h2>
        </div>
        <div class="col bg-success bg-gradient text-light rounded-3 text-center ">
          <h3>Applications Received</h3>
          <h2 class="fw-bold">5</h2>
        </div>
      </div>
      <hr>
      <div class="container  table-responsive">
        <table id="manageVacanciesTable" class="table table-hover table-striped table-responsive shadow rounded">
          <thead class="">
            <tr>
              <th scope=" col">#</th>
              <th scope="col">Position</th>
              <th scope="col">Slot</th>
              <th scope="col">Location</th>
              <th scope="col">Work Hours</th>
            </tr>
          </thead>
          <tbody id="manageVacanciesTbody">
            <tr class="bg-secondary">
              <td>1</td>
              <td>Front End Engineer</td>
              <td>0/3</td>
              <td>Cabanatuan</td>
              <td>40 hrs / week</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Back End Engineer</td>
              <td>0/3</td>
              <td>Cabanatuan</td>
              <td>40 hrs / week</td>
            </tr>
            <tr>
              <td>3</td>
              <td>System Analyst</td>
              <td>0/3</td>
              <td>Cabanatuan</td>
              <td>40 hrs / week</td>
            </tr>
            <tr>
              <td>4</td>
              <td>Project Manager</td>
              <td>0/1</td>
              <td>Cabanatuan</td>
              <td>40 hrs / week</td>
            </tr>
            <tr>
              <td>5</td>
              <td>Data Entry</td>
              <td>0/5</td>
              <td>Cabanatuan</td>
              <td>40 hrs / week</td>
            </tr>
            <tr>
              <td>6</td>
              <td>Data Entry</td>
              <td>0/5</td>
              <td>Cabanatuan</td>
              <td>40 hrs / week</td>
            </tr>
            <tr>
              <td>7</td>
              <td>Data Entry</td>
              <td>0/5</td>
              <td>Cabanatuan</td>
              <td>40 hrs / week</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="container row m-auto my-4 bg-light shadow-lg p-3 rounded-1 gap-3">
        <button type="button" class="col btn btn-dark" onclick="window.location.href='employerEdit.php'"">Edit</button>
        <button type=" button" class="col btn btn-dark">Delete</button>
        <button type="button" class="col btn btn-dark">View Applications</button>
      </div>
      <hr>
    </div>
    <div class="tab-pane fade bg-body-tertiary" id="create-vacancies-pane" role="tabpanel" aria-labelledby="create-vacancies" tabindex="0">
      <div class="container mt-2 bg-light shadow-lg p-4">
        <h1>Job Vacancy Form</h1>
        <hr class="border border-primary border-2">
        <form>
          <div class="row">
            <div class="col-3" id="">
              <label for="" class="form-label">Position</label>
              <input type="text" class="form-control" id="" required>
            </div>
            <div class="col-3" id="">
              <label for="" class="form-label">Slot Amount</label>
              <input type="number" class="form-control" id="" required>
            </div>
            <div class="col-3" id="">
              <label for="" class="form-label">Location</label>
              <input type="text" class="form-control" id="" required>
            </div>
            <div class="col-3" id="">
              <label for="" class="form-label">Work Hours (week)</label>
              <input type="number" class="form-control" id="" required>
            </div>
          </div>
          <hr class="border border-secondary border-1">
          <div class="">
            <div class="row" id="">
              <div class="col-1">
                <h2>Salary (Php)</h2>
              </div>
              <div class="col-3">
                <label for="" class="form-label">Min</label>
                <input type="number" class="form-control" id="" required>
              </div>
              <div class="col-3">
                <label for="" class="form-label">Max</label>
                <input type="number" class="form-control" id="" required>
              </div>
            </div>
          </div>
          <hr class="border border-secondary border-2">
          <div class="container p-0 ">
            <span class="input-group-text fw-bold">Details</span>
            <textarea class="form-control" rows="15"></textarea>
          </div>
          <div class="container p-0 mt-2">
            <button class="btn btn-primary" type="submit">Submit form</button>
          </div>
      </div>
      </form>
    </div>
    <script>
      $("#manageVacanciesTable tbody tr").click(function() {
        $(this).addClass('table-primary').siblings().removeClass('table-primary');
      });
    </script>
</body>

</html>
